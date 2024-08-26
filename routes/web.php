<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DocsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TownshipController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $members = DB::table('members')->where('nrc','like','8/'.'%')->get();


    foreach($members as $member){
        // $nrc = str_replace(' ', '',strtoupper($member->nrc));
        
        // DB::table('members')->where('id',$member->id)->update([
        //     'nrc' => $nrc
        // ]);
        
        echo $member->nrc;
        echo "<br>";
    }
    //return view('welcome');
});

Route::get('/dashboard', function () {
    //return view('dashboard');
    $asset = assets();

    return view($asset.'.dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //Route::get('/profile1', [ProfileController::class, 'edit1'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/users', [UserController::class, 'users']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/view/{id}', [UserController::class, 'show']);
    Route::get('/digital-data', [MemberController::class, 'digital_data']);
    Route::get('/members/{status}', [MemberController::class, 'members_status']);
    Route::get('/push-notifications', [MemberController::class, 'push_notifications']);
    Route::get('/api-docs', [DocsController::class, 'api_docs']);
    Route::get('/members/view/{id}', [MemberController::class, 'show']);
    Route::get('/member-logs', [MemberController::class, 'member_logs']);
    Route::get('/member-tokens', [MemberController::class, 'member_tokens']);
    Route::post('/download-digital-data', [MemberController::class, 'download_digital_data']);
    Route::post('/synced-data-with-digital', [MemberController::class, 'synced_data_with_digital']);   
    Route::get('/api-docs/{slug}', [DocsController::class, 'api_slug']);
    Route::get('/regions', [RegionController::class, 'regions']);
    Route::get('/townships', [TownshipController::class, 'townships']);
    Route::get('/members/{id}/histories', [MemberController::class, 'member_histories']);
    Route::get('/search/members/{term}', [MemberController::class, 'search_member']);

    //JSON Routes
    Route::prefix('json')->group(function () {
        Route::get('/members/{status}', [MemberController::class, 'json_members_status']);
        Route::get('/digital-data', [MemberController::class, 'json_digital_data']);
        Route::get('/member-logs', [MemberController::class, 'json_member_logs']);
        Route::get('/member-tokens', [MemberController::class, 'json_member_tokens']);
        Route::get('/users', [UserController::class, 'json_users']);
        Route::get('/regions', [RegionController::class, 'json_regions']);
        Route::get('/townships', [TownshipController::class, 'json_townships']);
    });
    
});



Route::get('/home', [App\Http\Controllers\ProfileController::class, 'index'])->name('home');
Route::post('/save-token', [App\Http\Controllers\MemberController::class, 'saveToken'])->name('save-token');
Route::post('/send-notification', [App\Http\Controllers\MemberController::class, 'sendNotification'])->name('send.notification');

require __DIR__.'/auth.php';
