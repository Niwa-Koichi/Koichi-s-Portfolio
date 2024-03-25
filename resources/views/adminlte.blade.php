@extends('adminlte::page')

@section('title', 'クイズ一覧')

@section('content_header')
    <h1>クイズ一覧</h1>
@stop

@php
    $heads = [
        '問題番号',
        '備考',
        '作成日時',
        '更新日時',
        '',
        '',
    ];
    $config = [
        'dom' => 'Bftrip',
        'order' => [
            [0, 'asc']
        ],
   ];
@endphp

@section('content')
    <x-adminlte-datatable class="mytable table-sm table-striped table-hover" id="mytable" :heads="$heads" :config="$config">
        @for ($i = 1; $i <= 3; $i++)
        <tr>
                <td>Question {{$i}}</td>
                <td>Note for Question {{$i}}</td>
                <td>2023-07-30</td>
                <td>2023-07-30</td>

                <td class="md:px-4 py-3">
                    <a href="#" class="btn btn-primary" style="font-size:small;">回答する</a>
                </td>                            <td class="md:px-4 py-3">
                    <form method="post" action="#">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" style="font-size:small;">問題の削除</button>
                    </form>
                </td>

            </tr>
        @endfor
</x-adminlte-datatable>
@stop

<!-- @section('css')
    {{-- ページごとCSSの指定
    <link rel="stylesheet" href="/css/xxx.css">
    --}}
@stop

@section('js')
    <script> console.log('ページごとJSの記述'); </script>
@stop -->