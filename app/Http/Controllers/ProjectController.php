<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Model;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Application|Factory|View|RedirectResponse
     */
    public function index(): Application|Factory|View|RedirectResponse
    {
        return view('projects.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View|RedirectResponse
     */
    public function create(): Application|Factory|View|RedirectResponse
    {
        return view('projects.create');
    }

    /**
     * Display the specified resource.
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function show($id):Application|Factory|View|RedirectResponse
    {
        $project = Project::withTrashed()->findOrFail($id);
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit($id):Application|Factory|View|RedirectResponse
    {
        $project = Project::withTrashed()->findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    /**
     * Restore the project
     * @param  $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function restore($id):Application|Factory|View|RedirectResponse
    {
        $project = Project::withTrashed()->findOrFail($id);
        $project->restore();
        return redirect()->route('projects.show', $id)->banner('The project has been restored correctly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function destroy($id): Application|Factory|View|RedirectResponse
    {
        $project = Project::withTrashed()->find($id);
        $project->delete();
        return redirect()->route('projects.show', $id)
            ->dangerBanner("The project has been deleted. You can restore it anytime.");
    }
}
