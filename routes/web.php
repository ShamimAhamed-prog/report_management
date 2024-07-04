<?php

use App\Http\Controllers\AnswerSubmitController;
use App\Http\Controllers\AnswerSubmitTypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionGroupController;
use App\Http\Controllers\QuestionTypeController;
use App\Http\Controllers\ReportManagementController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'LoginPage'])->name('login_page');
    Route::post('/submit_login', [LoginController::class, 'login'])->name('submit_login');
});

Route::get('/user/list', [PositionController::class, 'index']);


Route::middleware(['role'])->group(function () {
    Route::get('/', function () {
        return view('layouts.master');
    });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // ------------------------User----------------------
    Route::get('/user/list', [UserController::class, 'index'])->name('user_list');
    Route::get('/user/create', [UserController::class, 'create'])->name('create_user');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('edit_user');
    Route::post('/user/store', [UserController::class, 'store'])->name('store_user');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('update_user');
    Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('delete_user');
    // ------------------------Position----------------------
    Route::get('/position/list', [PositionController::class, 'index'])->name('position_list');
    Route::get('/position/create', [PositionController::class, 'create'])->name('create_position');
    Route::get('/position/edit/{id}', [PositionController::class, 'edit'])->name('edit_position');
    Route::post('/position/store', [PositionController::class, 'store'])->name('store_position');
    Route::put('/position/update/{id}', [PositionController::class, 'update'])->name('update_position');
    Route::get('/position/delete/{id}', [PositionController::class, 'destroy'])->name('delete_position');
    // ------------------------Question Group----------------------
    Route::get('/question/group/list', [QuestionGroupController::class, 'index'])->name('Qgroup_list');
    Route::get('/question/group/create', [QuestionGroupController::class, 'create'])->name('create_Qgroup');
    Route::get('/question/group/edit/{id}', [QuestionGroupController::class, 'edit'])->name('edit_Qgroup');
    Route::post('/question/group/store', [QuestionGroupController::class, 'store'])->name('store_Qgroup');
    Route::put('/question/group/update/{id}', [QuestionGroupController::class, 'update'])->name('update_Qgroup');
    Route::get('/question/group/delete/{id}', [QuestionGroupController::class, 'destroy'])->name('delete_Qgroup');
    // ------------------------Question Type----------------------
    Route::get('/question/type/list', [QuestionTypeController::class, 'index'])->name('Qtype_list');
    Route::get('/question/type/create', [QuestionTypeController::class, 'create'])->name('create_Qtype');
    Route::get('/question/type/edit/{id}', [QuestionTypeController::class, 'edit'])->name('edit_Qtype');
    Route::post('/question/type/store', [QuestionTypeController::class, 'store'])->name('store_Qtype');
    Route::put('/question/type/update/{id}', [QuestionTypeController::class, 'update'])->name('update_Qtype');
    Route::get('/question/type/delete/{id}', [QuestionTypeController::class, 'destroy'])->name('delete_Qtype');
    // ------------------------Answer Submit Type----------------------
    Route::get('/Answer/type/list', [AnswerSubmitTypeController::class, 'index'])->name('Astype_list');
    Route::get('/Answer/type/create', [AnswerSubmitTypeController::class, 'create'])->name('create_Astype');
    Route::get('/Answer/type/edit/{id}', [AnswerSubmitTypeController::class, 'edit'])->name('edit_Astype');
    Route::post('/Answer/type/store', [AnswerSubmitTypeController::class, 'store'])->name('store_Astype');
    Route::put('/Answer/type/update/{id}', [AnswerSubmitTypeController::class, 'update'])->name('update_Astype');
    Route::get('/Answer/type/delete/{id}', [AnswerSubmitTypeController::class, 'destroy'])->name('delete_Astype');
    // ------------------------Question----------------------
    Route::get('/question/list', [QuestionController::class, 'index'])->name('question_list');
    Route::get('/question/create', [QuestionController::class, 'create'])->name('create_question');
    Route::get('/question/edit/{id}', [QuestionController::class, 'edit'])->name('edit_question');
    Route::post('/question/store', [QuestionController::class, 'store'])->name('store_question');
    Route::put('/question/update/{id}', [QuestionController::class, 'update'])->name('update_question');
    Route::get('/question/delete/{id}', [QuestionController::class, 'destroy'])->name('delete_question');
    // ------------------------Get Report Question----------------------
    Route::get('/report/daily/{position_id}', [ReportManagementController::class, 'dailyReport'])->name('daily_report');
    Route::get('/report/weekly/{position_id}', [ReportManagementController::class, 'weeklyReport'])->name('weekly_report');
    Route::get('/report/monthly/{position_id}', [ReportManagementController::class, 'monthlyReport'])->name('monthly_report');

    // ------------------------Submit Report----------------------
    Route::post('/submit-answer/daily', [AnswerSubmitController::class, 'dailySubmit'])->name('daily_submit');
    Route::post('/submit-answer/weekly', [AnswerSubmitController::class, 'weeklySubmit'])->name('weekly_submit');
    Route::post('/submit-answer/monthly', [AnswerSubmitController::class, 'monthlySubmit'])->name('monthly_submit');

    // ------------------------Download Report----------------------
    Route::get('/download/daily', [ReportManagementController::class, 'downloadDaily'])->name('daily_download');
    Route::get('/download/pdf/daily/{id}', [ReportManagementController::class, 'generateDailyPdf'])->name('daily_pdf');
    Route::get('/download/weekly', [ReportManagementController::class, 'downloadWeekly'])->name('weekly_download');
    Route::get('/download/pdf/weekly/{id}', [ReportManagementController::class, 'generateWeeklyPdf'])->name('weekly_pdf');
    Route::get('/download/monthly', [ReportManagementController::class, 'downloadMonthly'])->name('monthly_download');
    Route::get('/download/pdf/monthly/{id}', [ReportManagementController::class, 'generateMonthlyPdf'])->name('monthly_pdf');
    // ------------------------Revenue Report----------------------
    Route::get('/revenue-report/monthly', [ReportManagementController::class, 'RevenueReport'])->name('revenue_report');



    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});
