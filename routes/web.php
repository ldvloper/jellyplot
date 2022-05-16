<?php


use App\Http\Controllers\HolidayController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\SchedulerController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\StatusController;
use App\Models\Customer;
use App\Models\Equipment;
use App\Models\Resource;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
//Resources
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ResourceController;
use App\Models\TeamMessage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here are the application routes. These
| routes are protected by the sanctum middleware that protects the app
| from not logged users. Check out the routes you put out the main middleware.
|
*/
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');


Route::middleware(['auth:sanctum'], 'verified')->group(function () {
    Route::middleware('hasDepartment')->group(function () {


        /**
         * Dashboard
         * - Load Messages
         */
        Route::get('/', function () {
            $messages = TeamMessage::where('team_id', '=', auth()->user()->currentTeam->id)->first();
            return view('dashboard', [
                'messages' => $messages,
            ]);
        })->name('dashboard');


        /**
         * Middleware TeamDepartment
         * - Check if the user have a department associated
         */
        Route::middleware('teamDepartment')->group(function () {
            /**
             * Main Planning Scheduler
             *
             */
            Route::get('/scheduler', function () {
                return view('dashboard');
            })->name('planning.show');


            /**
             * Main Resources Section (Except Livewire REALTIME CRUD [Create, Update])
             *  1.Projects
             *  2.Customers
             *  3.Resources
             *  4.equipment
             *  5.Tasks
             */
            Route::get('projects/restore/{id}', [ProjectController::class, 'restore'])->name('projects.restore');
            Route::resource('projects', ProjectController::class)->except([
                'store', 'update'
            ])->missing(function (Request $request) {
                $request->session()->flash('flash.banner', 'The project you are looking for does not exist.');
                $request->session()->flash('flash.bannerStyle', 'alert');
                return redirect()->route('projects.index');
            });
            Route::get('customers/restore/{id}', [CustomerController::class, 'restore'])->name('customers.restore');
            Route::resource('customers', CustomerController::class)->except([
                'store', 'update'
            ])->missing(function (Request $request) {
                return Redirect::route('customers.index');
            });
            Route::get('resources/restore/{id}', [ResourceController::class, 'restore'])->name('resources.restore');
            Route::resource('resources', ResourceController::class)->except([
                'store', 'update'
            ])->missing(function (Request $request) {
                return Redirect::route('resources.index');
            });
            Route::get('equipment/restore/{id}', [EquipmentController::class, 'restore'])->name('equipment.restore');
            Route::resource('equipment', EquipmentController::class)->except([
                'store', 'update'
            ])->missing(function (Request $request) {
                return Redirect::route('equipment.index');
            });
            Route::get('tasks/restore/{id}', [TaskController::class, 'restore'])->name('tasks.restore');
            Route::resource('tasks', TaskController::class)->except([
                'store', 'update'
            ])->missing(function (Request $request) {
                return Redirect::route('tasks.index');
            });
        });


        /**
         * Team Section (Except Livewire REALTIME CRUD [Create, Update])
         *  1.Team Chat
         *  2.Team Tasks
         */

        Route::resource('teamMessage', TeamMessage::class)->only([
            'destroy',
        ]);


        /**
         * CRUD Management Routes
         */
        Route::middleware('masterAuth')->group(function () {
            Route::prefix('management')->group(function () {
                /**
                 * Management:
                 *  1.Index
                */
                Route::get('/', function (){
                    return view('management.index');
                })->name('management.index');

                /**
                 *  Scheduler
                 *  1.Index
                 *  2.Holidays
                 */

                Route::prefix('scheduler')->group(function () {
                    Route::get('/', function (){
                        return view('management.scheduler.index');
                    })->name('scheduler.index');

                    Route::get('holidays/restore/{id}', [HolidayController::class, 'restore'])->name('holidays.restore');
                    Route::resource('holidays', HolidayController::class)->except([
                        'store', 'update'
                    ]);

                    //ETC
                });

                /**
                 * Management: Resources Section
                 *  1.Users
                 *  2-Shifts
                 *  3-Positions
                 *  4-Status
                 */

                //Users
                Route::get('users/restore/{id}', [UserController::class, 'restore'])->name('users.restore');
                Route::resource('users', UserController::class)->except([
                    'store', 'update', 'create'
                ]);

                //Work Positions
                Route::get('positions/restore/{id}', [PositionController::class, 'restore'])->name('positions.restore');
                Route::resource('positions', PositionController::class)->only([
                    'index','show','update', 'create', 'edit', 'destroy'
                ]);

                //Scheduler Shifts
                Route::get('shifts/restore/{id}', [ShiftController::class, 'restore'])->name('shifts.restore');
                Route::resource('shifts', ShiftController::class)->only([
                    'index','show','update', 'create', 'edit', 'destroy'
                ]);

                //Status
                Route::resource('status', StatusController::class)->only([
                    'index','show','update', 'create', 'edit', 'destroy'
                ]);
            });
        });
    });

        /**
         * Other Routes
         */
        Route::get('/invoice', function () {
            return view('app.invoices.general');
        });

        Route::get('/analytics')->name('analytics');
        Route::get('/faq')->name('faq');
        Route::get('/technical-support')->name('technical.support');
        Route::get('/jellyplot-tour')->name('tour');
        Route::get('/integration')->name('integration');

        Route::get('/help-center', function (){
            return view('help.index');
        })->name('help.index');

    /**
     * DOCUMENTATION
     */
    Route::get('/docs', function () {
        return view('documentation.index');
    })->name('docs');
    Route::get('docs/models', function() {
        return view('documentation.models');
    })->name('docs.models');

    Route::get('test', fn () => phpinfo());

    Route::get('qr-code-g', function () {

        //Space
        \QrCode::size(500)
            ->format('png')
            ->generate(route('projects.show',1), public_path('images/qrcode.png'));

        return view('qrCode');
    });
});


/**
 * Displayable: Resources Section
 *  1.Sample
 */
Route::resource('samples', SampleController::class)->only([
    'index','show',
]);
