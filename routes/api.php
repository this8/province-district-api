<?php

use App\Models\District;
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

Route::get('/districts', function () {
    return District::all();
});

Route::post('/districts', function () {
    \request()->validate([
        'province' => 'required',
        'districts' => 'required',
    ]);
    return District::create([
        'province' => \request('province'),
        'districts' => \request('districts'),
    ]);
});
