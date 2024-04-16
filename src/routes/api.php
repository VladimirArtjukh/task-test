<?php

use Illuminate\Support\Facades\Route;
use Modules\API\V1\Users\Controllers\UserController;

Route::group(['prefix' => 'v1', 'middleware' => 'throttle:350,1'], function () {
    Route::post('user/save', [UserController::class, 'save'])->name('v1.api.user.save');
});
