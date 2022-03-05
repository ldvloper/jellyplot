<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Customer;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Application|Factory|View|RedirectResponse
     */
    public function index():Application|Factory|View|RedirectResponse
    {
        return view('customers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function create():Application|Factory|View|RedirectResponse
    {
        return view('customers.create');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function show($id):Application|Factory|View|RedirectResponse
    {
        $customer = Customer::withTrashed()->findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit($id):Application|Factory|View|RedirectResponse
    {
        $customer = Customer::withTrashed()->findOrFail($id);
        return view('customers.edit', compact('customer'));

    }

    /**
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function restore($id):Application|Factory|View|RedirectResponse
    {
        $customer = Customer::withTrashed()->findOrFail($id);
        $customer->restore();
        return redirect()->route('customers.show', $id)->banner('The customer has been restored correctly.');
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customers.show', $id)
            ->dangerBanner("The customer has been deleted. Remember that you can restore a customer and all the data related anytime.");
    }
}
