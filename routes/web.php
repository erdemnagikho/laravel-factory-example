<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::get('customers', [CustomerController::class, 'create']);
Route::post('customers', [CustomerController::class, 'store']);
