<?php

namespace App\Http\Controllers;

use App\Http\Requests\CriminalRequest;
use App\Models\Criminal;
use App\Traits\DataTransformer;
use App\Transformers\CriminalTransformer;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;

class CriminalController extends Controller
{
    use DataTransformer;

    /**
     * @return Response
     */
    public function index() : Response
    {
        return Inertia::render('Criminal/Index', $this->buildCollection(Criminal::all(), new CriminalTransformer()));
    }

    /**
     * @param int $id
     *
     * @return Response
     */
    public function show(int $id): Response
    {
        return Inertia::render('Criminal/Show', $this->buildItem(Criminal::findOrFail($id), new CriminalTransformer()));
    }

    /**
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Criminal/Create');
    }

    /**
     * @param Criminal $criminal
     * @param CriminalRequest $request
     *
     * @return RedirectResponse
     */
    public function store(Criminal $criminal, CriminalRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $data = $this->sanitizePostToRequest($request->all(), $request);
            $criminal->fill($this->toSnakeKeys($data))->save();
            DB::commit();

            return redirect('/criminals');
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
        return Inertia::render('Criminal/Edit', [
            'criminal'  => $this->buildItem(Criminal::findOrFail($id), new CriminalTransformer())
        ]);
    }

    /**
     * @param int $id
     * @param CriminalRequest $request
     *
     * @return RedirectResponse
     */
    public function update(int $id, CriminalRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $citizen = Criminal::findOrFail($id);
            $data = $this->sanitizePostToRequest($request->all(), $request);
            $citizen->fill($this->toSnakeKeys($data))->save();
            DB::commit();

            return redirect('/criminals');
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
            $user = Criminal::findOrFail($id);
            $user->delete();
            return redirect('/criminals');
        } Catch(Exception $e) {
            Log::error($e);
            return back()->withErrors(['error' => 'Something went wrong while deleting record']);
        }
    }
}
