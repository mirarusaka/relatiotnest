@extends('layouts.app')

@section('title', 'List')
@section('content')
    <h3>ユーザプロフィール</h3>
    名前
    {{ $person }}
    <form action="{{ route('follow', ['name' => $person]) }}" method="POST">
        @csrf
        @if()
        <input type="submit" value="フォローする">
    </form>
@endsection
