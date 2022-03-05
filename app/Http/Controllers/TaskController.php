<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function index():Application|Factory|View|RedirectResponse
    {
        return view('tasks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function create():Application|Factory|View|RedirectResponse
    {
        return view('tasks.create');
    }


    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function show($id):Application|Factory|View|RedirectResponse
    {
        $task = Task::withTrashed()->find($id);
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit($id):Application|Factory|View|RedirectResponse
    {
        $task = Task::withTrashed()->find($id);
        return view('tasks.edit', compact('task'));
    }

    /**
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function restore($id):Application|Factory|View|RedirectResponse
    {
        $task = Task::withTrashed()->find($id);
        $task->restore();
        return redirect()->route('tasks.show', $id)
            ->banner('The Task has been restored correctly.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function destroy($id):Application|Factory|View|RedirectResponse
    {
        $task = Task::withTrashed()->find($id);
        //Deleting the project
        $task->delete();
        //Show Notification
        return redirect()->route('tasks.show', $id)
            ->dangerBanner("The Task has been deleted. You can restore it anytime.");
    }
}
