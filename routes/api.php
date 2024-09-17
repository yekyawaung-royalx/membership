<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/check-mobile-register', [ApiController::class, 'check_mobile_to_register']);
Route::post('/check-mobile-otp', [ApiController::class, 'check_mobile_to_send_otp']);
Route::post('/get-token', [ApiController::class, 'get_token']);
Route::post('/login', [ApiController::class, 'member_login']);
Route::post('/register', [ApiController::class, 'member_register']);
Route::post('/profile', [ApiController::class, 'profile']);
Route::post('/passcode-reset', [ApiController::class, 'member_passcode_reset']);
Route::post('/passcode-change', [ApiController::class, 'member_passcode_change']);
Route::post('/digital-register', [ApiController::class, 'digital_register']);
Route::post('/update-info', [ApiController::class, 'update_info']);
Route::post('/approved-user-level', [ApiController::class, 'approved_user_level']);
Route::post('/terminate-user', [ApiController::class, 'terminate_user']);
Route::post('/unlock-user', [ApiController::class, 'unlock_user']);
Route::post('/delete-member', [ApiController::class, 'delete_member']);
Route::get('/townships', [ApiController::class, 'json_townships']);
Route::get('/member-register', [ApiController::class, 'member_register']);
