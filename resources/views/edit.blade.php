@extends('layouts.app')

@section('title', 'Edit Player')

@section('content')
    @include('form', [
        'route' => route('update', ['player' => $player->id]),
        'method' => 'PUT',
    ])
@endsection
