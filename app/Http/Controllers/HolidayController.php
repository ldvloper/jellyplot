<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('management.scheduler.holidays.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('management.scheduler.holidays.create');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show($id): View|Factory|Application
    {
        $holiday = Holiday::withTrashed()->find($id);
        return view('management.scheduler.holidays.show', compact('holiday'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id): View|Factory|Application
    {
        $holiday = Holiday::withTrashed()->find($id);
        return view('management.scheduler.holidays.edit', compact('holiday'));
    }


    /**
     * Restore the project
     * @param  $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function restore($id):Application|Factory|View|RedirectResponse
    {
        $holiday = Holiday::withTrashed()->findOrFail($id);
        $holiday->restore();
        return redirect()->route('holidays.show', $id)->banner('The Holiday date has been restored correctly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function destroy($id): Application|Factory|View|RedirectResponse
    {
        $holiday = Holiday::withTrashed()->find($id);
        $holiday->delete();
        return redirect()->route('holidays.show', $id)
            ->dangerBanner("The Holiday date has been deleted. You can restore it anytime.");
    }
}
