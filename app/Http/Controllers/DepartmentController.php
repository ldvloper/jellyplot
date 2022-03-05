<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function index():Application|Factory|View|RedirectResponse
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function create():Application|Factory|View|RedirectResponse
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse
     */
    public function store(Request $request):Application|Factory|View|RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function show(int $id):Application|Factory|View|RedirectResponse
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit(int $id):Application|Factory|View|RedirectResponse
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function update(Request $request, int $id):Application|Factory|View|RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function destroy(int $id):Application|Factory|View|RedirectResponse
    {
        //
    }
}
