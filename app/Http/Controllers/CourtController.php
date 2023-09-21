<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourtRequest;
use App\Models\Court;
use App\Traits\DataTransformer;
use App\Transformers\CourtTransformer;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;

class CourtController extends Controller
{
    use DataTransformer;

    /**
     * @return Response
     */
    public function index() : Response
    {
        return Inertia::render('Court/Index', $this->buildCollection(Court::all(), new CourtTransformer()));
    }

    /**
     * @param int $id
     *
     * @return Response
     */
    public function show(int $id): Response
    {
        return Inertia::render('Court/Show', $this->buildItem(Court::findOrFail($id), new CourtTransformer()));
    }

    /**
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Court/Create');
    }

    /**
     * @param Court $court
     * @param CourtRequest $request
     *
     * @return RedirectResponse
     */
    public function store(Court $court, CourtRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $data = $this->sanitizePostToRequest($request->all(), $request);
            $court->fill($this->toSnakeKeys($data))->save();
            DB::commit();

            return redirect('/courts');
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
        return Inertia::render('Court/Edit', [
            'court'  => $this->buildItem(Court::findOrFail($id), new CourtTransformer())
        ]);
    }

    /**
     * @param int $id
     * @param CourtRequest $request
     *
     * @return RedirectResponse
     */
    public function update(int $id, CourtRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $court = Court::findOrFail($id);
            $data = $this->sanitizePostToRequest($request->all(), $request);
            $court->fill($this->toSnakeKeys($data))->save();
            DB::commit();

            return redirect('/courts');
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
            $user = Court::findOrFail($id);
            $user->delete();
            return redirect('/courts');
        } Catch(Exception $e) {
            Log::error($e);
            return back()->withErrors(['error' => 'Something went wrong while deleting record']);
        }
    }
}
