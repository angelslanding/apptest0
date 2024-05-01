<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ParticipantLoginController;
use App\Http\Controllers\ParticipantRoleController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog-post', [BlogPostController::class, 'index'])->name("blog_post_index");
Route::get('/blog-post/index', [BlogPostController::class, 'indexDefault']);
Route::get('/blog-post/index-default', [BlogPostController::class, 'indexDefault']);
Route::get('/blog-post/index-cards', [BlogPostController::class, 'index_cards']);
Route::get('/blog-post/index-table', [BlogPostController::class, 'index_table']);
Route::get('/blog-post/create', [BlogPostController::class, 'create']);
Route::post('/blog-post/store', [BlogPostController::class, 'store']);
Route::get('/blog-post/participant/{participant}/index', [BlogPostController::class, 'participantIndex'])->name("blog_post_participant_index");
Route::get('/blog-post/show/{blogPost}', [BlogPostController::class, 'show'])->name("blog_post_show");
Route::get('/blog-post/edit/{blogPost}', [BlogPostController::class, 'edit']);
Route::post('/blog-post/update/{blogPost}', [BlogPostController::class, 'update']);
Route::get('/blog-post/destroy/{blogPost}', [BlogPostController::class, 'destroy']);

Route::get('/role', [RoleController::class, 'index'])->name("role_index");
Route::get('/role/index', [RoleController::class, 'indexDefault']);
Route::get('/role/index-default', [RoleController::class, 'indexDefault']);
Route::get('/role/index-cards', [RoleController::class, 'index_cards']);
Route::get('/role/index-table', [RoleController::class, 'index_table']);
Route::get('/role/create', [RoleController::class, 'create']);
Route::post('/role/store', [RoleController::class, 'store']);
Route::get('/role/show/{role}', [RoleController::class, 'show'])->name("role_show");
Route::get('/role/edit/{role}', [RoleController::class, 'edit']);
Route::post('/role/update/{role}', [RoleController::class, 'update']);
Route::post('/role/delete/{role}', [RoleController::class, 'delete']);
Route::post('/role/destroy/{role}', [RoleController::class, 'destroy']);

Route::get('/participant', [ParticipantController::class, 'index'])->name("participant_index");
Route::get('/participant/index', [ParticipantController::class, 'indexDefault']);
Route::get('/participant/index-default', [ParticipantController::class, 'indexDefault']);
Route::get('/participant/index-cards', [ParticipantController::class, 'index_cards']);
Route::get('/participant/index-table', [ParticipantController::class, 'index_table']);
Route::get('/participant/create', [ParticipantController::class, 'create']);
Route::post('/participant/store', [ParticipantController::class, 'store']);
Route::get('/participant/show/{participant}', [ParticipantController::class, 'show'])->name("participant_show");
Route::get('/participant/edit/{participant}', [ParticipantController::class, 'edit']);
Route::post('/participant/update/{participant}', [ParticipantController::class, 'update']);
Route::get('/participant/destroy/{participant}', [ParticipantController::class, 'destroy']);
Route::get('/participant/send-participant-created-email/{participant}', [ParticipantController::class, 'participantSendParticipantCreatedEmail'])->name("participant_send_participant_created_email");

// function () {
//
//     // $details = [
//     //     'title' => 'Mail from ItSolutionStuff.com',
//     //     'body' => 'This is for testing email using smtp'
//     // ];
//     //
//     // \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\MyTestMail($details));
//     //
//     // dd("Email is Sent.");
// });
Route::get('/participant-login', [ParticipantLoginController::class, 'index'])->name("participant_login_index");
Route::get('/participant-login/index', [ParticipantLoginController::class, 'indexDefault']);
Route::get('/participant-login/index-default', [ParticipantLoginController::class, 'indexDefault']);
Route::get('/participant-login/index-cards', [ParticipantLoginController::class, 'index_cards']);
Route::get('/participant-login/index-table', [ParticipantLoginController::class, 'index_table']);
Route::get('/participant-login/create', [ParticipantLoginController::class, 'create'])->name("participant_login_create");
Route::post('/participant-login/store', [ParticipantLoginController::class, 'store']);
Route::get('/participant-login/show/{participantLogin}', [ParticipantLoginController::class, 'show'])->name("participant_login_show");
Route::get('/participant-login/edit/{ParticipantLogin}', [ParticipantLoginController::class, 'edit']);
Route::post('/participant-login/update/{ParticipantLogin}', [ParticipantLoginController::class, 'update']);
Route::post('/participant-login/delete/{ParticipantLogin}', [ParticipantLoginController::class, 'delete']);
Route::post('/participant-login/destroy/{ParticipantLogin}', [ParticipantLoginController::class, 'destroy']);
Route::get('/participant-login/flush-login-session', [ParticipantLoginController::class, 'flushLoginSession'])->name("flush_login_session");
Route::get('/participant-login/logout/{participantLogin}', [ParticipantLoginController::class, 'logout'])->name("participant_login_logout");

Route::get('/participant-role', [ParticipantRoleController::class, 'index'])->name("participant_role_index");
Route::get('/participant-role/index', [ParticipantRoleController::class, 'indexDefault']);
Route::get('/participant-role/index-default', [ParticipantRoleController::class, 'indexDefault']);
Route::get('/participant-role/index-cards', [ParticipantRoleController::class, 'index_cards']);
Route::get('/participant-role/index-table', [ParticipantRoleController::class, 'index_table']);
Route::get('/participant-role/create', [ParticipantRoleController::class, 'create']);
Route::post('/participant-role/store', [ParticipantRoleController::class, 'store']);
Route::get('/participant-role/show/{participantRole}', [ParticipantRoleController::class, 'show'])->name("participant_role_show");
Route::get('/participant-role/edit/{participantRole}', [ParticipantRoleController::class, 'edit']);
Route::post('/participant-role/update/{participantRole}', [ParticipantRoleController::class, 'update']);
Route::post('/participant-role/delete/{participantRole}', [ParticipantRoleController::class, 'delete']);
Route::post('/participant-role/destroy/{participantRole}', [ParticipantRoleController::class, 'destroy']);
