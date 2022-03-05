<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        return view('equipment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('equipment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //Livewire
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function show(int $id): View|Factory|Response|Application
    {
        $equipment = Equipment::withTrashed()->find($id);
        return view('equipment.show', compact('equipment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Equipment  $equipment
     * @return Application|Factory|View|Response
     */
    public function edit(Equipment $equipment)
    {
        return view('equipment.edit', compact('equipment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //Livewire
    }


    /**
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function restore(int $id):Application|Factory|View|RedirectResponse
    {
        $equipment = Equipment::withTrashed()->find($id);
        $equipment->restore();
        return redirect()->route('equipment.show', $id)
            ->banner('The Equipment has been restored correctly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return
     */
    public function destroy(int $id)
    {
        $equipment = Equipment::withTrashed()->find($id);
        //Deleting the project
        $equipment->delete();
        //Show Notification
        return redirect()->route('equipment.show', $id)
            ->dangerBanner("The Equipment has been deleted. You can restore it anytime.");
    }
}
