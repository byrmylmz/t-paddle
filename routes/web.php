<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/store', function (Request $request) {
    $user= Auth::User();
    return view('store', [
        'payLink' => $request->user()->chargeProduct($productId = 21988)
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/user/subscribe', function (Request $request) {
     //dd($request->user());

    $payLink = $request->user()->newSubscription('default', $free = 21917)
        ->returnTo(route('dashboard'))
        ->create();


    return view('subscribe', ['payLink' => $payLink]);

})->name('subscribe');


Route::middleware(['auth:sanctum'],'verified')->get('/buy',[PaymentController::class,'pay']);

Route::middleware(['auth:sanctum', 'verified'])->get('/members', function () {
    return view('members');
})->name('members');

Route::middleware(['auth:sanctum', 'verified'])->get('/charge', function () {
    return view('charge');
})->name('charge');

Route::middleware(['auth:sanctum', 'verified'])->get('/invoices', function () {
    return view('invoices', [
       // 'invoices' => auth()->user()->invoices(),
    ]);
})->name('invoices');


