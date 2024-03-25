<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuizTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Question::truncate();

        $quizs =  [
            [
                'title_id' => 1,
                'question' => 'Googleが作ったフレームワークはどれ？',
                'answer1' => 'Vue.js',
                'answer2' => 'AngularJS',
                'answer3' => 'React',
                'answer' => 2,
                'description' => 'AngularJSでした'
            ],
            [
                'title_id' => 1,
                'question' => 'HTTP通信を行うためによく使われるライブラリはどれ？',
                'answer1' => 'axios',
                'answer2' => 'Lodash',
                'answer3' => 'Moment.js',
                'answer' => 1,
                'description' => '他の選択肢は全然Ajaxのライブラリではないですよ。'
            ],
            [
                'title_id' => 1,
                'question' => 'JavaScript以外のプログラミング言語でフロントエンドを構築するための技術は何？',
                'answer1' => 'web3.0',
                'answer2' => 'NoCode',
                'answer3' => 'WebAssembly',
                'answer' => 1,
                'description' => 'ちょっと難しかったかなぁ？'
            ],
            [
                'title_id' => 1,
                'question' => '次のうち、最終的にJavaScriptにコンパイルされる言語でないものはどれ？',
                'answer1' => 'TypeScript',
                'answer2' => 'CoffeScript',
                'answer3' => 'Dart',
                'answer' => 3,
                'description' => ''
            ],
            [
                'title_id' => 2,
                'question' => '一般的にギターには何本の弦が張られている？',
                'answer1' => '4本',
                'answer2' => '6本',
                'answer3' => '5本',
                'answer' => 2,
                'description' => '正解は6本でした'
            ],
            [
                'title_id' => 2,
                'question' => '3弦の開放弦の音は何？',
                'answer1' => 'C',
                'answer2' => 'G',
                'answer3' => 'D',
                'answer' => 2,
                'description' => 'ソの音です。'
            ],
            [
                'title_id' => 2,
                'question' => 'ベース音と5度の2音だけを出すコードのことを何という？',
                'answer1' => 'アッパーストラクチャー',
                'answer2' => 'テンションコード',
                'answer3' => 'パワーコード',
                'answer' => 3,
                'description' => 'ロックでよく使われます。'
            ],
            [
                'title_id' => 2,
                'question' => 'ピッキングせずに指を弦に押さえつけるだけで音を出す奏法を何という？',
                'answer1' => 'ハンマリングオン',
                'answer2' => 'プリングオフ',
                'answer3' => 'チョーキング',
                'answer' => 1,
                'description' => ''
            ],
            [
                'title_id' => 3,
                'question' => 'サピエンス全史の作者は誰？',
                'answer1' => 'ジャスティン・ビーバー',
                'answer2' => 'ユヴァル・ノア・フラリ',
                'answer3' => 'ユヴァル・ノア・ハラリ',
                'answer' => 3,
                'description' => '覚えにくい名前ですね。'
            ],
            [
                'title_id' => 4,
                'question' => '「イノベーション」の説明として正しいものを選べ',
                'answer1' => '手を加えて良くすること',
                'answer2' => '人が何かする際の動機づけ',
                'answer3' => '新しい技術や考え方を取り入れて社会的に大きな変化を起こすこと',
                'answer' => 3,
                'description' => 'その他はリノベーション・モチベーションの説明。'
            ],
            [
                'title_id' => 4,
                'question' => '次のうち「貸借対照表」の説明はどれ？',
                'answer1' => '企業のある一定時点における資産、負債、純資産の状態を表すもの',
                'answer2' => '企業のある一定期間における収益と費用の状態を表すもの',
                'answer3' => '会計期間における資金の増減、つまり収入と支出を表示する',
                'answer' => 1,
                'description' => '難しいですね。'
            ],
            [
                'title_id' => 4,
                'question' => '次のうち「資産」でないものはどれ？',
                'answer1' => '現金',
                'answer2' => '手形',
                'answer3' => '借入金',
                'answer' => 3,
                'description' => '会計のお話です。'
            ],
        ];

        foreach($quizs as $quiz) {
            Question::create($quiz);
        }
    }
}
