<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\CompetenciesController;
use App\Http\Controllers\QuestionsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', [ApiController::class, 'login'])->name('login');
Route::post('/register', [ApiController::class, 'register'])->name('register');
Route::post('/send_recover_password_email', [ApiController::class, 'send_recover_password_email'])->name('send_recover_password_email');
Route::post('/validate_code_recover', [ApiController::class, 'validate_code_recover'])->name('validate_code_recover');
Route::get('/faculties', [ApiController::class, 'faculties'])->name('faculties');

Route::get('/logout', [ApiController::class, 'logout'])->name('logout');



   
Route::middleware('auth:sanctum')->group(function(){
    
    
    Route::get('/multimedia_question/{id}', [ApiController::class, 'multimedia_question'])->name('multimedia_question');
    Route::get('/reset_progress', [ApiController::class, 'reset_progress'])->name('reset_progress');
    Route::get('/competencies', [ApiController::class, 'competencies'])->name('competencies');
    Route::get('/competencies_statitics', [ApiController::class, 'competencies_statitics'])->name('competencies_statitics');
    Route::get('/send_email_verify', [ApiController::class, 'send_email_verify'])->name('send_email_verify');
    Route::post('/update_profile', [ApiController::class, 'update_profile'])->name('update_profile');
    Route::post('/complete_question', [ApiController::class, 'complete_question'])->name('complete_question');
    Route::post('/validate_answer_exist_writer', [ApiController::class, 'validate_answer_exist_writer'])->name('validate_answer_exist_writer');
    Route::post('/write_answer', [ApiController::class, 'write_answer'])->name('write_answer');
    Route::post('/update_password_recover', [ApiController::class, 'update_password_recover'])->name('update_password_recover');
    
    Route::get('/get_progress', [ApiController::class, 'get_progress'])->name('get_progress');
    
    Route::get('/perfil', [ApiController::class, 'perfil'])->name('perfil');
    Route::get('/questions/{id}', [ApiController::class, 'questions'])->name('questions');
    Route::get('/points', [ApiController::class, 'points'])->name('points');
    Route::get('/get_level_user_competencie/{id}', [ApiController::class, 'get_level_user_competencie'])->name('get_level');
    Route::get('/get_competencie_level/{id}', [ApiController::class, 'get_competencie_level'])->name('get_competencie_level');
    Route::get('/question_resolve/{id}', [ApiController::class, 'question_resolve'])->name('question_resolve');
    Route::get('/answers/{id}', [ApiController::class, 'answers'])->name('answers');
    Route::get('/validate_session', [ApiController::class, 'validate_session'])->name('validate_session');
});