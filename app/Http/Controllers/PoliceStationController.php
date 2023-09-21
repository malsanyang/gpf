<?php

namespace App\Http\Controllers;

use App\Http\Requests\PoliceStationRequest;
use App\Models\PoliceStation;
use App\Traits\DataTransformer;
use App\Transformers\PoliceStationTransformer;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;

class PoliceStationController extends Controller
{
    use DataTransformer;

    /**
     * @return Response
     */
    public function index() : Response
    {
        return Inertia::render('PoliceStation/Index', $this->buildCollection(PoliceStation::all(), new PoliceStationTransformer()));
    }

    /**
     * @param int $id
     *
     * @return Response
     */
    public function show(int $id): Response
    {
        return Inertia::render('PoliceStation/Show', $this->buildItem(PoliceStation::findOrFail($id), new PoliceStationTransformer()));
    }

    /**
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('PoliceStation/Create');
    }

    /**
     * @param PoliceStation $station
     * @param PoliceStationRequest $request
     *
     * @return RedirectResponse
     */
    public function store(PoliceStation $station, PoliceStationRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $data = $this->sanitizePostToRequest($request->all(), $request);
            $station->fill($this->toSnakeKeys($data))->save();
            DB::commit();

            return redirect('/police-stations');
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
        return Inertia::render('PoliceStation/Edit', [
            'station'  => $this->buildItem(PoliceStation::findOrFail($id), new PoliceStationTransformer())
        ]);
    }

    /**
     * @param int $id
     * @param PoliceStationRequest $request
     *
     * @return RedirectResponse
     */
    public function update(int $id, PoliceStationRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $station = PoliceStation::findOrFail($id);
            $data = $this->sanitizePostToRequest($request->all(), $request);
            $station->fill($this->toSnakeKeys($data))->save();
            DB::commit();

            return redirect('/police-stations');
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
            $user = PoliceStation::findOrFail($id);
            $user->delete();
            return redirect('/police-stations');
        } Catch(Exception $e) {
            Log::error($e);
            return back()->withErrors(['error' => 'Something went wrong while deleting record']);
        }
    }
}
