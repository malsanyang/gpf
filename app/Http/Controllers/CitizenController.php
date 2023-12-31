<?php

namespace App\Http\Controllers;

use App\Http\Requests\CitizenRequest;
use App\Models\Citizen;
use App\Traits\DataTransformer;
use App\Transformers\CitizenTransformer;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;

class CitizenController extends Controller
{
    use DataTransformer;

    /**
     * @return Response
     */
    public function index() : Response
    {
        return Inertia::render('Citizen/Index', $this->buildCollection(Citizen::all(), new CitizenTransformer()));
    }

    /**
     * @param int $id
     *
     * @return Response
     */
    public function show(int $id): Response
    {
        return Inertia::render('Citizen/Show', $this->buildItem(Citizen::findOrFail($id), new CitizenTransformer()));
    }

    /**
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Citizen/Create');
    }

    /**
     * @param Citizen $citizen
     * @param CitizenRequest $request
     *
     * @return RedirectResponse
     */
    public function store(Citizen $citizen, CitizenRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $data = $this->sanitizePostToRequest($request->all(), $request);
            $citizen->fill($this->toSnakeKeys($data))->save();
            DB::commit();

            return redirect('/citizens');
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
        return Inertia::render('Citizen/Edit', [
            'citizen'  => $this->buildItem(Citizen::findOrFail($id), new CitizenTransformer())
        ]);
    }

    /**
     * @param int $id
     * @param CitizenRequest $request
     *
     * @return RedirectResponse
     */
    public function update(int $id, CitizenRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $citizen = Citizen::findOrFail($id);
            $data = $this->sanitizePostToRequest($request->all(), $request);
            $citizen->fill($this->toSnakeKeys($data))->save();
            DB::commit();

            return redirect('/citizens');
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
            $user = Citizen::findOrFail($id);
            $user->delete();
            return redirect('/citizens');
        } Catch(Exception $e) {
            Log::error($e);
            return back()->withErrors(['error' => 'Something went wrong while deleting record']);
        }
    }
}
