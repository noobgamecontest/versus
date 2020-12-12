@extends('layouts.app')

@section('content')
    <div class="container-margin">
        <a class="title-container mb-4 block" href="{{ route('ladder.create') }}">Créer ton ladder !</a>
        @foreach($ladders as $ladder)
            @auth()
                @if (auth()->user()->role == 'admin')
                    <a href="{{ route('ladder.show', $ladder) }}" class="mt-1 md:mt-11 text-center bg-yellow-500 ">Options ladder</a>
                @endif
            @endauth
            <ladder-component :ladder="{{ $ladder->toJson() }}"></ladder-component>
        @endforeach
    </div>
@endsection
