<?php

namespace App\Http\Controllers;

use App\Actions\Jetstream\DeleteUser;
use App\Models\Task;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resources
     */
    public function index()
    {
        return view('management.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('management.users.create');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::withTrashed()->find($id);
        return view('management.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view ('management.users.edit', compact('user'));
    }


    /**
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function restore($id):Application|Factory|View|RedirectResponse
    {
        $user = USer::withTrashed()->find($id);
        $user->restore();
        return redirect()->route('users.show', $id)
            ->banner('The User has been restored correctly.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::withTrashed()->find($id);
        //Deleting the project
        $user->delete();
        //Show Notification
        return redirect()->route('users.show', $id)
            ->dangerBanner("The User has been deleted. You can restore it anytime.");
    }
}
