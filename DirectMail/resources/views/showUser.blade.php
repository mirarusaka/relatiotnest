@extends('layouts.app')

@section('title', 'List')
@section('content')
    <h3>ユーザプロフィール</h3>
    @if($me != 0)
    フォローされています
    @endif
    名前
    {{ $person }}
    <form action="{{ route('follow', ['name' => $person]) }}" method="POST">
        @csrf
        @if($you == 0)
            <input type="hidden" name="action" value="follow">
            <input type="submit" value="フォロー">
        @else
            <input type="hidden" name="action" value="unfollow">
            <input type="submit" value="フォロー解除">
        @endif
    </form>

    {{-- DMページを作成 --}}
    @if($me !=0 && $you != 0)
        DMを送る
    @endif
@endsection
