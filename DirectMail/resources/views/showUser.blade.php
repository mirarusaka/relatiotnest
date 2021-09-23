@extends('layouts.app')

@section('title', 'List')
@section('content')
    <h3>ユーザプロフィール</h3>
    名前
    {{ $data }}
    <form action="{{ route('follow', ['name' => $data]) }}" method="POST">
        @csrf
        <input type="submit" value="フォローする">
    </form>
@endsection
