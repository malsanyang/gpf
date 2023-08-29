<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\DataTransformer;
use App\Transformers\UserTransformer;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;

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
     * @param User $user
     *
     * @return RedirectResponse
     */
    public function delete(User $user): RedirectResponse
    {
        try {
            $user->delete();
            return redirect('user.index');
        } Catch(Exception $e) {
            Log::error($e);
            return back()->withErrors(['error' => 'Something went wrong while deleting user']);
        }
    }
}
