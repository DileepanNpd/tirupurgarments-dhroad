<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderCleanupController;

Route::get('/delete-pos-orders', [OrderCleanupController::class, 'deletePosOrders']);
