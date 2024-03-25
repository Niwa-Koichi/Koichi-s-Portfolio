$(function() {
    'use strict';
  
    //ボタンが押された際の処理
    $('.answer').on('click', function() {
        var $selected = $(this);
        var answer = $selected.text();

        $.ajax({
            url: `/quiz/{questionId}`,
            method: 'GET',
            success: function(response) {
                // レスポンスを処理
                if (response.correct) {
                    // 正解の場合の処理
                    console.log('正解！');
                } else {
                    // 不正解の場合の処理
                    console.log('不正解...');
                }
            },

            error: function(error) {
            console.error('APIリクエストエラー', error);
            }
        });

    });
});
