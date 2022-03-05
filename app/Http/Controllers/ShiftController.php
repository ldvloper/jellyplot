<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Shift;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('management.shifts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('management.shifts.create');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show($id): View|Factory|Application
    {
        $shift = Shift::withTrashed()->find($id);
        return view('management.shifts.show', compact('shift'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id): View|Factory|Application
    {
        $shift = Shift::withTrashed()->find($id);
        return view('management.shifts.edit', compact('shift'));
    }

    /**
     * Restore the Position
     * @param  $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function restore($id):Application|Factory|View|RedirectResponse
    {
        $shift = Shift::withTrashed()->findOrFail($id);
        $shift->restore();
        return redirect()->route('shifts.show', $id)->banner('The Shift has been restored correctly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function destroy($id): Application|Factory|View|RedirectResponse
    {
        $shift = Shift::withTrashed()->find($id);
        $shift->delete();
        return redirect()->route('shifts.show', $id)
            ->dangerBanner("The Shift has been deleted. You can restore it anytime.");
    }
}
