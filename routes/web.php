<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CompetencyController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\MultimediaController;
use App\Http\Controllers\MultimediaquestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ModelHasRoleController;
use App\Http\Controllers\LevelController;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\UserController;
use App\Models\Question;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Auth::check() ? redirect('/dashboard') : view('auth.login');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('user/pdf', [UserController::class, 'pdf'])->name('user.pdf');
    Route::get('answers/pdf', [AnswerController::class, 'pdf'])->name('answers.pdf');
    Route::get('questions/pdf', [QuestionController::class, 'pdf'])->name('questions.pdf');
    Route::get('/dashboard', [LoginController::class, 'index'])->name('dashboard');
    Route::get('/home', [LoginController::class, 'index'])->name('home');
    Route::resource('users', UserController::class);
    Route::resource('levels', LevelController::class);
    Route::resource('questions', QuestionController::class);
    Route::resource('answers', AnswerController::class);
    Route::resource('modules', ModuleController::class);
    Route::resource('competencies', CompetencyController::class);
    Route::resource('multimediaquestions', MultimediaquestionController::class);

    Route::get('/questions/{questionId}', [QuestionController::class, 'showQuestion'])->name('questions.show');
    Route::get('/questions/{questionId}/related-answers', 'QuestionController@getRelatedAnswers');



    Route::get('/menuadmin', 'MenuadminController@index');
    Route::view('/menu', 'menu.index');
    Route::view('/usergraf', 'usergraf.index');
    Route::get('/galeria', [MultimediaController::class, 'galeria'])->name('galeria');

    Route::resource('/model-has-role', ModelHasRoleController::class);
    Route::get('model-has-roles/create', [ModelHasRoleController::class, 'create'])->name('model-has-roles.create');
    Route::get('model-has-roles.destroy', [ModelHasRoleController::class, 'destroy'])->name('model-has-roles.destroy');
    Route::get('model-has-roles.show', [ModelHasRoleController::class, 'show'])->name('model-has-roles.show');
    Route::get('model-has-roles.edit', [ModelHasRoleController::class, 'edit'])->name('model-has-roles.edit');
    Route::post('model-has-roles', [ModelHasRoleController::class, 'store'])->name('model-has-roles.store');
    Route::get('model-has-roles', [ModelHasRoleController::class, 'index'])->name('model-has-roles.index');


    Route::resource('faculties', FacultyController::class);
    Route::get('/faculties.competencies/{id}', [FacultyController::class, 'competencies'])->name('faculties.competencies');
    Route::resource('authors', AuthorController::class);
    Route::resource('multimedia', MultimediaController::class);

    Route::group(['middleware' => ['role:superadmin']], function () {
        // Aquí puedes agregar rutas específicas para el rol de superadmin si es necesario.
    });

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

Route::get('/email_verify/{token}', [UserController::class, 'email_verify'])->name('email_verify');

// Las rutas de autenticación y registro generadas por Laravel
Auth::routes();
