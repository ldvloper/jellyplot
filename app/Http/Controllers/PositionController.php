<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('management.positions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('management.positions.create');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show($id): Application|Factory|View
    {
        $position = Position::withTrashed()->find($id);
        return view('management.positions.show', compact('position'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id): View|Factory|Application
    {
        $position = Position::withTrashed()->find($id);
        return view('management.positions.edit', compact('position'));
    }

    /**
     * Restore the Position
     * @param  $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function restore($id):Application|Factory|View|RedirectResponse
    {
        $project = Position::withTrashed()->findOrFail($id);
        $project->restore();
        return redirect()->route('positions.show', $id)->banner('The Position has been restored correctly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function destroy($id): Application|Factory|View|RedirectResponse
    {
        $project = Position::withTrashed()->find($id);
        $project->delete();
        return redirect()->route('positions.show', $id)
            ->dangerBanner("The Position has been deleted. You can restore it anytime.");
    }
}
