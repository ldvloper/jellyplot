<?php

use App\Http\Controllers\Api\DeletedUserController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\RouteHelperController;
use App\Models\Department;
use App\Models\Equipment;
use App\Models\Holiday;
use App\Models\Project;
use App\Models\Resource;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });


    Route::get('/departments', function (){
        return Department::where('laboratory','=', true)->orderBy('id')->get();
    });

    Route::get('/all/departments/users', function (){
        $users = Department::where('laboratory','=', true)->get()->pluck('users');
        $value = array();
        foreach($users as $user)
        {
            array_push($value, $user->count());
        }
        return $value;
    });

    //User Contribution Resources Filter by Year Grouped By Month
    Route::get('{userID}/{year}/projects/count', function ($userID, $year){
        $projects = Project::where('creator_id', '=', $userID)->whereYear('created_at',$year)->get();
        $orderedProjects = $projects->groupBy(function($val) {
                return Carbon::parse($val->created_at)->month;
            })->toArray();

        return RouteHelperController::getMonths($orderedProjects);

    });



    Route::get('{userID}/{year}/resources/count', function ($userID, $year){
        $resources = Resource::where('creator_id', '=', $userID)->whereYear('created_at',$year)->get();
        $orderedResources = $resources->groupBy(function($val) {
            return Carbon::parse($val->created_at)->month;
        })->toArray();
        return RouteHelperController::getMonths($orderedResources);
    });


    Route::get('{userID}/{year}/customers/count', function ($userID,$year){
        $customers = Customer::where('creator_id', '=', $userID)->whereYear('created_at',$year)->get();
        $orderedCustomers = $customers->groupBy(function($val) {
            return Carbon::parse($val->created_at)->month;
        })->toArray();
        return RouteHelperController::getMonths($orderedCustomers);
    });


    Route::get('{userID}/{year}/equipment/count', function ($userID, $year){
        $equipment = Equipment::where('creator_id', '=', $userID)->whereYear('created_at',$year)->get();
        $orderedEquipment = $equipment->groupBy(function($val) {
            return Carbon::parse($val->created_at)->month;
        })->toArray();
        return RouteHelperController::getMonths($orderedEquipment);
    });

    /**
     * By department Search
     *
     * 1.Users
     * 2.Customers
     * 3.Resources
     * 5.equipment
     */

    //Users
    Route::get('{department}/users', function ($department){
        return User::whereHas('department', function (Builder $query) use ($department) {
            $query->where('name', '=', $department);
        })->orderBy('department_id')->get();
    });

    //Customers
    Route::get('{department}/customers', function ($department){
        return Customer::whereHas('department', function (Builder $query) use ($department) {
            $query->where('name', '=', $department);
        })->get();
    });

    //Resources
    Route::get('/resources', function (){
        return Resource::all();
    });

    Route::get('{department}/resources', function ($department){
        return Resource::whereHas('department', function (Builder $query) use ($department) {
            $query->where('name', '=', $department);
        })->where('deleted_at', NULL)->get()->sortBy('order_planning');
    });


    //Tasks
    Route::get('{department}/tasks',function ($department){
        return Task::whereHas('department', function (Builder $query) use ($department) {
            $query->where('name', '=', $department);
        })->where('deleted_at', NULL)->get();
    });

    //Equipment
    Route::get('{department}/equipment', function ($department){
        return Equipment::whereHas('department', function (Builder $query) use ($department) {
            $query->where('department_id', '=', $department);
        })->where('deleted_at', NULL)->get();
    });

    /**
     * By Customer Search
     *
     * 1.Projects
     */

    //Projects
    Route::get('{customer}/projects', function ($customer){
        return Project::whereHas('customer', function (Builder $query) use ($customer) {
            $query->where('name', '=', $customer);
        })->where('deleted_at', NULL)->get();
    });


    //Holidays
    Route::get('holidays', function (){
        return Holiday::all();
    });


    /**
     * Color Brand
     */

    Route::get('colors/primary', function (){
        return config('app.primary_color_simple');
    });

    Route::get('colors/secondary', function (){
        return config('app.secondary_color_simple');
    });

    Route::get('colors/primary/hex', function (){
        return config('app.primary_color');
    });

    Route::get('colors/secondary/hex', function (){
        return config('app.secondary_color');
    });








