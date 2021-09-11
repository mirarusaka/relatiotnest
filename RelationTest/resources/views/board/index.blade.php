@extends('layouts.helloapp')

@section('title', 'Board.index')

@section('menubar')
    @parent
    ボード・ページ
@endsection

@section('content')
    <table>
        <tr><th>Data</th></tr>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
            </tr>
        @endforeach
    </table>
    <a href={{ route('board.add') }}>一覧追加へ</a>
@endsection

@section('footer')
フッター
@endsection
