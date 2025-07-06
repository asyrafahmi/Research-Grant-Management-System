<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResearchGrantController;
use App\Http\Controllers\AcademicianController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\ProjectMemberController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);


Route::resource('research_grants', ResearchGrantController::class);

Route::resource('academicians', AcademicianController::class);

Route::resource('milestones', MilestoneController::class);

Route::middleware(['auth'])->group(function () {
    Route::post('/research-grants/{researchGrant}/members', [ResearchGrantController::class, 'addMember'])
        ->name('research_grants.add_member');
    
    Route::delete('/research-grants/{researchGrant}/members/{academician}', [ResearchGrantController::class, 'removeMember'])
        ->name('research_grants.remove_member');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
