<?php

declare(strict_types=1);

use App\Http\Controllers\Api\Order\ShowController;
use Illuminate\Support\Facades\Route;

Route::get('/orders/{id}', ShowController::class);
