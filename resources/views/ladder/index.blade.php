@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto py-1 px-4 sm:px-6 lg:px-8">
        <a href="{{ route('ladder.create') }}" class="text-gray-200 font-bold uppercase text-sm">Create ladder</a>
        <ladders-component></ladders-component>
    </div>
@endsection

