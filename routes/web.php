<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CompaniesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Agregar controladores

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DniController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\BankController;
use App\Http\Livewire\AssignmentCities;
use App\View\Components\Select2;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
    // return redirect()->route('user.index');
    // return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Ruta para el select dinamico de cities en quotes
Route::get('/get-cities-by-state-id/{id}', [StateController::class,'citiesByStateId']);
// Ruta para el select dinamico de customers por type en quotes
Route::get('/get-customers-by-company-id/{id}', [CompaniesController::class,'customersByCompaniesId']);
// Ruta para uso de Select2
// Route::get('select2', Select2::class);


// agregar rutas de controladores referenciados.

Route::group(['middleware' => ['auth']], function(){
    // Route::resource('roles', RolController::class);
    //Route::resource('user', UserController::class);
    // Route::resource('customer', CustomerController::class);

    /**
     * Quotes DataTables
     */
    Route::get('quote/datatable', [QuoteController::class, 'datatable']);
    Route::get('quote/index', [QuoteController::class, 'index'])->name('quote.index');
    Route::get('quote/create', [QuoteController::class, 'create'])->name('quote.create');
    Route::post('quote/store', [QuoteController::class, 'store'])->name('quote.store');
    Route::get('quote/show/{quote}', [QuoteController::class, 'show'])->name('quote.show');
    Route::get('quote/edit/{quote}', [QuoteController::class, 'edit'])->name('quote.edit');
    Route::put('quote/update/{quote}', [QuoteController::class, 'update'])->name('quote.update');
    Route::post('quote/destroy/{quote}', [QuoteController::class, 'destroy'])->name('quote.destroy');
    Route::get('quote/pdf/{quote}', [QuoteController::class, 'pdf'])->name('quote.pdf');
    Route::get('quote/form-options', [QuoteController::class, 'formOptions']);
    Route::get('quote/edit/{id}/ajax', [QuoteController::class, 'editAjax']);

    /**
     * Users DataTables
     */
    Route::get('user/datatable', [UserController::class, 'datatable']);
    Route::get('user/index', [UserController::class, 'index'])->name('user.index');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('user/show/{user}', [UserController::class, 'show'])->name('user.show');
    Route::get('user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('user/update/{user}', [UserController::class, 'update'])->name('user.update');
    Route::post('user/destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    /**
     * Customer DataTables
     */
    Route::get('customer/datatable', [CustomerController::class, 'datatable']);
    Route::get('customer/index', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('customer/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('customer/store', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('customer/show/{customer}', [CustomerController::class, 'show'])->name('customer.show');
    Route::get('customer/edit/{customer}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::patch('customer/update/{customer}', [CustomerController::class, 'update'])->name('customer.update');
    Route::post('customer/destroy/{customer}', [CustomerController::class, 'destroy'])->name('customer.destroy');

    /**
     * Roles DataTables
     */
    Route::get('role/datatable', [RolController::class, 'datatable']);
    Route::get('role/index', [RolController::class, 'index'])->name('role.index');
    Route::get('role/create', [RolController::class, 'create'])->name('role.create');
    Route::post('role/store', [RolController::class, 'store'])->name('role.store');
    Route::get('role/show/{role}', [RolController::class, 'show'])->name('role.show');
    Route::get('role/edit/{role}', [RolController::class, 'edit'])->name('role.edit');
    Route::patch('role/update/{role}', [RolController::class, 'update'])->name('role.update');
    Route::post('role/destroy/{role}', [RolController::class, 'destroy'])->name('role.destroy');


    // Route::resource('quote', QuoteController::class);

    Route::resource('state', StateController::class);
    Route::resource('cities', CityController::class);
    Route::resource('banks', BankController::class);
    Route::resource('dni', DniController::class);
    Route::resource('companies', CompaniesController::class);
});

