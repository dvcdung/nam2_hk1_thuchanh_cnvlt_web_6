<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\B1TH3Controller;
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

Route::get('/', function() {
    return view('hello_world');
});

Route::get('/thuchanh2-bai01', function() {
    return view('thuchanh2/bai01/dangky');
})->name('thuchanh2-dangky');
Route::post('/thuchanh2-info', function() {
    return view('thuchanh2/bai01/info');
})->name('thuchanh2-info');

Route::get('/thuchanh2-bai02', function() {
    return view('thuchanh2/bai02/ptb2');
})->name('thuchanh2-bai02');

Route::get('/thuchanh2-bai03', function() {
    return view('thuchanh2/bai03/tinhhinhtron');
})->name('thuchanh2-bai03');

Route::get('/thuchanh2-bai04', function() {
    return view('thuchanh2/bai04/mua');
})->name('thuchanh2-bai04');


Route::get('/thuchanh3-bai01', [B1TH3Controller::class, 'Bai01'])
    ->name('thuchanh3-bai01');
Route::post('/thuchanh3-bai01', [B1TH3Controller::class, 'Bai01']) -> name('thuchanh3-xulychuoi');

Route::prefix('/thuchanh4-giohang')->group(function() {
    Route::get('/', function() {
        return view('/thuchanh4/index');
    })->name('viewcart');
    Route::post('/', function() {
        return view('/thuchanh4/index');
    });
});

Route::prefix('/thuchanh5-giohang')->group(function() {
    Route::get('/', function() {
        return view('/thuchanh5/index');
    })->name('thuchanh5');
    Route::post('/', function() {
        return view('/thuchanh5/index');
    });
});