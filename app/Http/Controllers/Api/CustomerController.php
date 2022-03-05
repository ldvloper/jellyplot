<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Rules\DepartmentCustomer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Customer::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'department_id' => 'integer|required',
            'site' => 'url',
            'creator_id' => 'integer|required'
        ]);

        // Retrieve the validated input...
        $validated = $validator->validated();

        /**
         * First Validation Error
         * @return Response
         */
        if($validator->fails()){
            $response = new Response($validator->errors(), 422);
            $response->header('content-type', 'multipart/form-data' );
                return $response;
        }

        $validatorName = Validator::make($request->all(), [
            'name' => ['required', new DepartmentCustomer($validated['department_id'])]
        ]);

        /**
         * Name already exists in department
         * @return Response
         */
        if($validatorName->fails()) {
            $response = new Response($validatorName->errors(), 422);
            $response->header('content-type', 'multipart/form-data' );
            return $response;
        }

        // Retrieve the validated input...
        $validatedName = $validatorName->validated();


        return Customer::create([
            'name' => $validatedName['name'],
            'site' => $validated['site'],
            'department_id' => $validated['department_id'],
            'creator_id' => $validated['creator_id'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $name
     * @return Response
     */
    public function show($name)
    {
        return Customer::where('name', '=', $name)->orWhere('id', '=', $name)->get();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
