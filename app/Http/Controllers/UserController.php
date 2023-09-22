<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\PoliceStation;
use App\Models\User;
use App\Traits\DataTransformer;
use App\Transformers\PoliceStationTransformer;
use App\Transformers\RoleTransformer;
use App\Transformers\UserTransformer;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    use DataTransformer;

    /**
     * @return Response
    */
    public function index() : Response
    {
        $users = User::all();
        return Inertia::render('User/Index', $this->buildCollection($users, new UserTransformer()));
    }

    /**
     * @param int $id
     *
     * @return Response
    */
    public function show(int $id): Response
    {
        return Inertia::render('User/Show', $this->buildItem(User::findOrFail($id), new UserTransformer()));
    }

    /**
     * @return Response
    */
    public function create(): Response
    {
        return Inertia::render('User/Create', [
            'roles' => $this->buildCollection(Role::all(), new RoleTransformer()),
            'stations' => $this->buildCollection(PoliceStation::all(), new PoliceStationTransformer()),
        ]);
    }

    /**
     * @param User $user
     * @param UserRequest $request
     *
     * @return RedirectResponse
    */
    public function store(User $user, UserRequest $request): RedirectResponse
    {
        try {
            $data = $this->sanitizePostToRequest($request->all(), $request);
            $role = $data['role'];
            $data['password'] = Hash::make($data['password']);
            data_forget($data, 'role');
            $user->fill($this->toSnakeKeys($data))->save();
            $user->refresh();
            $user->assignRole($role);

            return redirect('/user-management');
        } catch (Exception $e) {
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
        return Inertia::render('User/Edit', [
            'user'  => $this->buildItem(User::findOrFail($id), new UserTransformer()),
            'roles' => $this->buildCollection(Role::all(), new RoleTransformer()),
            'stations' => $this->buildCollection(PoliceStation::all(), new PoliceStationTransformer()),
        ]);
    }

    /**
     * @param User $user
     * @param UserRequest $request
     *
     * @return RedirectResponse
     */
    public function update(int $id, UserRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $user = User::findOrFail($id);
            $data = $this->sanitizePostToRequest($request->all(), $request);
            $role = $data['role'];
            $data['password'] = Hash::make($data['password']);
            data_forget($data, 'role');
            $user->fill($this->toSnakeKeys($data))->save();
            $user->refresh();

            $user->syncRoles([$role]);
            DB::commit();
            return redirect('/user-management');
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
            $user = User::findOrFail($id);
            $user->delete();
            return redirect('/user-management');
        } Catch(Exception $e) {
            Log::error($e);
            return back()->withErrors(['error' => 'Something went wrong while deleting user']);
        }
    }
}
