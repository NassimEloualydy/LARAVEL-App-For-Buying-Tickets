<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\StadiumController;
use App\Http\Controllers\locationController;
use App\Http\Controllers\listTypeLocationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/SignIn',[AccountController::class,'index'])->name('SignIn');
Route::get('/LogIn',[AccountController::class,'LogIn'])->name('LogIn');
Route::post('/signInSubmit',[AccountController::class,'signInSubmit'])->name('signInSubmit');
Route::post('/loginSubmit',[AccountController::class,'loginSubmit'])->name('loginSubmit');
Route::get('/logOut',[AccountController::class,'logOut'])->name('logOut');
Route::get('/Stadium',[StadiumController::class,'index'])->name('Stadium');
Route::get('/FormStaduim',[StadiumController::class,'FormStaduim'])->name('FormStaduim');
Route::post('/addStaduim',[StadiumController::class,'submitStaduim'])->name('addStaduim');
Route::get('/deleteStadium/{id}',[StadiumController::class,'deleteStadium'])->name('deleteStadium');
Route::get('/loadStadium/{id}',[StadiumController::class,'loadStadium'])->name('loadStadium');
Route::post('/searchStad',[StadiumController::class,'searchStad'])->name('searchStad');
Route::get('/location',[locationController::class,'index'])->name('location');
Route::get('/listTypeLocation',[listTypeLocationController::class,'index'])->name('listTypeLocation');
Route::get('/FormLocationType',[listTypeLocationController::class,'FormLocationType'])->name('FormLocationType');
Route::post('/addLocationType',[listTypeLocationController::class,'addLocationType'])->name('addLocationType');
Route::get('/deleteTypeLocation/{id}',[listTypeLocationController::class,'deleteTypeLocation'])->name('deleteTypeLocation');
Route::get('/loadeTypeLocation/{id}',[listTypeLocationController::class,'loadeTypeLocation'])->name('loadeTypeLocation');
Route::post('/searchTypeLocation',[listTypeLocationController::class,'searchTypeLocation'])->name('searchTypeLocation');
Route::get('/FormLocation',[locationController::class,'FormLocation'])->name('FormLocation');
Route::post("/getTypeOfStudiumLocations",[locationController::class,"getTypeOfStudiumLocations"])->name('getTypeOfStudiumLocations');
Route::post("/submitLocation",[locationController::class,'submitLocation'])->name('submitLocation');
Route::get("/deleteLocation/{id}",[locationController::class,'deleteLocation'])->name('deleteLocation');
Route::get("/loadLocation/{id}",[locationController::class,'loadLocation'])->name('loadLocation');
