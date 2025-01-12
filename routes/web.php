<?php

use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ScheduleController::class, "dashboard"]);

Route::resource('schedules', ScheduleController::class);
