<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrimeRequest;
use App\Http\Requests\InvestigatorReportRequest;
use App\Http\Requests\ProsecutorReportRequest;
use App\Library\Auth\LocalRole;
use App\Library\Helper;
use App\Models\Citizen;
use App\Models\Court;
use App\Models\Crime;
use App\Models\Criminal;
use App\Models\Prison;
use App\Models\User;
use App\Traits\DataTransformer;
use App\Transformers\CitizenTransformer;
use App\Transformers\CourtTransformer;
use App\Transformers\CrimeTransformer;
use App\Transformers\CriminalTransformer;
use App\Transformers\PrisonTransformer;
use App\Transformers\UserTransformer;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\Permission\Models\Role;

class CrimeController extends Controller
{
    use DataTransformer;

    /**
     * @return Response
     */
    public function index() : Response
    {
        return Inertia::render('Crime/Index', $this->buildCollection(Crime::all(), new CrimeTransformer()));
    }

    /**
     * @param int $id
     *
     * @return Response
     */
    public function show(int $id): Response
    {
        return Inertia::render('Crime/Show', $this->buildItem(Crime::findOrFail($id), new CrimeTransformer()));
    }

    /**
     * @return Response
     */
    public function create(): Response
    {
        /**
         * @var User $users
        */
        $users = Role::findByName(LocalRole::ROLE_INVESTIGATOR)->users()->get();
        return Inertia::render('Crime/Create', [
            'citizens' => $this->buildCollection(Citizen::all(), new CitizenTransformer()),
            'criminals' => $this->buildCollection(Criminal::all(), new CriminalTransformer()),
            'investigators' => $this->buildCollection($users, new UserTransformer())
        ]);
    }

    /**
     * @param Crime $crime
     * @param CrimeRequest $request
     *
     * @return RedirectResponse
     */
    public function store(Crime $crime, CrimeRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            /** @var User $currentUser */
            $currentUser = Auth::user();
            $data = $this->sanitizePostToRequest($request->all(), $request);
            $crime->case_number = Helper::generateRefNumber();
            $crime->police_officer_id = $currentUser->id;
            $crime->police_station_id = $currentUser->station_id;
            $crime->fill($this->toSnakeKeys($data))->save();
            $crime->workflow_apply('to_investigation', $crime->getDefaultWorkflow());
            $crime->save();
            DB::commit();

            return redirect('/crimes');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
            return back()->withErrors('Something went wrong while saving record');
        }
    }

    /**
     * @param int $id
     *
     * @return RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        try {
            $crime = Crime::findOrFail($id);
            $crime->delete();
            return redirect('/crimes');
        } Catch(Exception $e) {
            Log::error($e);
            return back()->withErrors(['error' => 'Something went wrong while deleting record']);
        }
    }

    /**
     * @param int $id
     *
     * @return Response
     */
    public function addInvestigationReport(int $id): Response
    {
        /**
         * @var User $users
         */
        $users = Role::findByName(LocalRole::ROLE_PROSECUTOR)->users()->get();
        return Inertia::render('Crime/AddInvestigationReport', [
            'crime'  => $this->buildItem(Crime::findOrFail($id), new CrimeTransformer()),
            'prosecutors' => $this->buildCollection($users, new UserTransformer()),
            'courts' => $this->buildCollection(Court::all(), new CourtTransformer())
        ]);
    }

    /**
     * @param int $id
     * @param InvestigatorReportRequest $request
     *
     * @return RedirectResponse
     */
    public function updateInvestigationReport(int $id, InvestigatorReportRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $crime = Crime::findOrFail($id);
            $data = $this->sanitizePostToRequest($request->all(), $request);
            $crime->fill($this->toSnakeKeys($data))->save();
            $crime->workflow_apply('to_prosecution', $crime->getDefaultWorkflow());
            $crime->save();
            DB::commit();

            return redirect('/crimes/' . $crime->id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
            return back()->withErrors('Something went wrong while saving record');
        }
    }

    /**
     * @param int $id
     *
     * @return Response
     */
    public function addProsecutionReport(int $id): Response
    {
        return Inertia::render('Crime/AddProsecutionReport', [
            'crime'  => $this->buildItem(Crime::findOrFail($id), new CrimeTransformer()),
            'prisons' => $this->buildCollection(Prison::all(), new PrisonTransformer()),
        ]);
    }

    /**
     * @param int $id
     * @param ProsecutorReportRequest $request
     *
     * @return RedirectResponse
     */
    public function updateProsecutionReport(int $id, ProsecutorReportRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $crime = Crime::findOrFail($id);
            $data = $this->sanitizePostToRequest($request->all(), $request);
            $transition = $data['courtDecision'];
            data_forget($data, 'courtDecision');
            $crime->fill($this->toSnakeKeys($data))->save();
            $crime->workflow_apply($transition, $crime->getDefaultWorkflow());
            $crime->save();
            DB::commit();

            return redirect('/crimes/' . $crime->id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
            return back()->withErrors('Something went wrong while saving record');
        }
    }
}
