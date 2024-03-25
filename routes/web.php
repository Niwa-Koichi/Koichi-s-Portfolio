<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// adminLTEの画面
Route::get('adminlte', function () {
    return view('adminlte');
});

Route::controller(QuizController::class)->group(function(){
    //トップページ
    Route::get('/','index')->name('quiz.index');

    // 問題の作成
    Route::get('/create','create')->name('quiz.create'); 

    //問題の保存
    Route::post('/quiz/store','store')->name('quiz.store');     
    
    //クイズの回答ページ
    Route::get('/quiz/{questionId}','show')->name('quiz.show');

    //解答のページ
    Route::get('/answer','answer')->name('quiz.answer');   

    //回答の判定
    Route::post('/quiz/{questionId}/check-answer',[QuizController::class, 'checkAnswer']);   
    
});