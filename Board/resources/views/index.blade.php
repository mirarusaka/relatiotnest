@extends('layouts.app')

@section('title', 'List')
@section('content')
    @foreach($person as $person)
        <a href="{{ route('user', ['name' => $person->name]) }}">{{ $person->name }}</a><br>
    @endforeach
@endsection
