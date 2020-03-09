@extends('layouts.app')

@section('title', 'Add Player')

@section('content')
    @include('form', [
        'route' => route('store'),
        'method' => '',
        'player' => optional(),
    ])
@endsection
