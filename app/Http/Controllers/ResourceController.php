<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use PHPUnit\Framework\Reorderable;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('resources.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function create():Application|Factory|View|RedirectResponse
    {
        return view('resources.create');
    }


    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function show($id):Application|Factory|View|RedirectResponse
    {
        $resource = Resource::withTrashed()->find($id);
        return view('resources.show', compact('resource'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit($id):Application|Factory|View|RedirectResponse
    {
        $resource = Resource::withTrashed()->find($id);
        return view('resources.edit', compact('resource'));
    }

    /**
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function restore($id):Application|Factory|View|RedirectResponse
    {
        $resource = Resource::withTrashed()->find($id);
        $resource->restore();
        return redirect()->route('resources.show', $id)
            ->banner('The resource has been restored correctly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function destroy($id):Application|Factory|View|RedirectResponse
    {
        $resource = Resource::find($id);
        $resource->delete();
        return redirect()->route('resources.show', $id)
            ->dangerBanner("The resource have been deleted. You can restore anytime.");
    }
}
