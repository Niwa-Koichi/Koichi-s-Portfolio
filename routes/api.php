<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Models\Question;
use App\Models\AnswerHistory;
use App\Models\Category;
use App\Models\Title;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::get('/quiz/{questionId}', 'QuizController@checkAnswer');
// 質問取得用のAPI

Route::get('/titles/new', function(){
    return Title::latest()->take(5)->get();
});

Route::get('/categories', function(){
    return Category::all();
});

Route::get('/titles', function(Request $request){
    return Title::where('category_id', $request->category_id)->paginate(1);
});

Route::get('/quiz/{questionId}', function ($questionID){
    $Question = Question::find($questionID);
    $question = Question::find($questionID)->question;
    return [
        "id" => $Question->id,
        "question" => $Question->question,
        "choices" => $Question->choices,
        "correct_choice" => $Question->correct_choice,
    ];
})->where('questionId', '[0-9]+');

Route::post('/quiz/answer', function (Request $request){
    //バリデーション
    $validatedData = $request->validate([
        'quizId' => 'required|integer',
        'answer' => 'required|between:1,4',
    ]);
    $answer_history = new AnswerHistory();
    $answer_history->quiz_id = $request->quizId;
    $answer_history->answer = $request->answer;
    $result = $answer_history->save();
    $quiz = Question::find($request->question_id);
    $next_quiz_id = getNextQuizId($quiz->title_id, $quiz->id);
    return [
        'answer'      => $quiz->answer,
        'description' => $quiz->description,
        'next_quiz_id' => $next_quiz_id,
    ];
});

// 次のクイズID（無い場合はnull）
function getNextQuizId($title_id, $quiz_id) {
    $is_found = false;
    $quizzes =Question::where('title_id', $title_id)->get();
    foreach($quizzes as $quiz){
        if($is_found) return $quiz->id;
        if($quiz->id === $quiz_id) $is_found =true;
    }
    return null;
}
