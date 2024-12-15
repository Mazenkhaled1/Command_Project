<?php

use App\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InputController;
use App\Jobs\SendMailJob;

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
    return view('welcome');
});


// Route::post('store' , [InputController::class , 'store'])->name('store'); 


Route::get('/mail_test' , function () {
    // $email = 'che@gmail.com' ;
    // Mail::to($email)->send(new Mailer($name)) ; 
    $name = 'mazen khaled ' ; 
    dispatch(new SendMailJob($name)) ; 
    return 'email sent successfully to ' . $name   ; 
});