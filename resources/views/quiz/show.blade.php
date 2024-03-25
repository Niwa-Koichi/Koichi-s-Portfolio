@extends('adminlte::page')

@section('title', '回答')

@section('content_header')
    <h1>問題</h1>
@stop

@section('content')
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet" type="text/css">
    <meta name=”robots” content=”noindex”/>
    <title>問題</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
</head>
<body>
    <div class="container">
    <h2>{{ $question->question }}</h2>
    <div class="question-wrap">
        <form action="{{ route('quiz.answer') }}" method="get" id="quizForm">
            @csrf
            <input type="hidden" name="question_id" value="{{ $question->id }}">
            @foreach($question->choices as $index => $choice)
                <div>
                    <label>
                        <input type="radio" name="choice" value="{{ $index }}" required>
                        {{ $choice }}
                    </label>
                </div>
            @endforeach
            <input type="submit" value="回答する" class="answer" id="answer">
            <div id="quiz_result"></div>
        </form>
        <form id="quizForm">
        @csrf

    <input type="radio" name="answer" value="option1"> 答え1
    <input type="radio" name="answer" value="option2"> 答え2
    <input type="radio" name="answer" value="option3"> 答え3

    <button type="button" onclick="submitAnswer()">回答する</button>
</form>
<br>

<!-- 結果を表示(まだAPI実装失敗中) -->
    <div>回答結果
        <p id="result"></p>
    </div>
    <br>
</div>
</body>
</html>
@stop

<script>
function submitAnswer() {
    var answer = $('input[name="answer"]:checked').val();

    // Ajaxリクエストを使用して正誤判定
    
    $.ajax({
        url: `/api/quiz/1`,
        method: 'GET',
        success: function(response) {
            var correctAnswer = response.correct_choice;
            
            // 回答の確認
            console.log('ユーザーの回答:', answer);
            console.log('正解インデックス:', correctAnswer );

            if (answer === correctAnswer) {
                $('#result').text('正解です！');
            } else {
                $('#result').text('不正解です。');
            }
        },
        error: function(error) {
            console.error('APIリクエストエラー', error);
        }
    });
}
</script>


