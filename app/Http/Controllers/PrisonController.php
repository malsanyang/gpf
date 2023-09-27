<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrisonRequest;
use App\Library\Helper;
use App\Models\Prison;
use App\Traits\DataTransformer;
use App\Transformers\PrisonTransformer;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;

class PrisonController extends Controller
{
    use DataTransformer;

    /**
     * @return Response
     */
    public function index() : Response
    {
        return Inertia::render('Prison/Index', $this->buildCollection(Prison::all(), new PrisonTransformer()));
    }

    /**
     * @param int $id
     *
     * @return Response
     */
    public function show(int $id): Response
    {
        return Inertia::render('Prison/Show', $this->buildItem(Prison::findOrFail($id), new PrisonTransformer()));
    }

    /**
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Prison/Create');
    }

    /**
     * @param Prison $prison
     * @param PrisonRequest $request
     *
     * @return RedirectResponse
     */
    public function store(Prison $prison, PrisonRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $data = $this->sanitizePostToRequest($request->all(), $request);
            $prison->prison_no = Helper::generateRefNumber();
            $prison->fill($this->toSnakeKeys($data))->save();
            DB::commit();

            return redirect('/prisons');
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
    public function edit(int $id): Response
    {
        return Inertia::render('Prison/Edit', [
            'prison'  => $this->buildItem(Prison::findOrFail($id), new PrisonTransformer())
        ]);
    }

    /**
     * @param int $id
     * @param PrisonRequest $request
     *
     * @return RedirectResponse
     */
    public function update(int $id, PrisonRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $prison = Prison::findOrFail($id);
            $data = $this->sanitizePostToRequest($request->all(), $request);
            $prison->fill($this->toSnakeKeys($data))->save();
            DB::commit();

            return redirect('/prisons');
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
            $prison = Prison::findOrFail($id);
            $prison->delete();
            return redirect('/prisons');
        } Catch(Exception $e) {
            Log::error($e);
            return back()->withErrors(['error' => 'Something went wrong while deleting record']);
        }
    }
}
