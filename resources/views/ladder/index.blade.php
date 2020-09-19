@extends('layouts.app')

@section('content')
    @foreach($ladders as $ladder)
        <div class="max-w-sm overflow-hidden mx-auto">
            <a href="{{ route('ladder.ranking', $ladder) }}">
                <div class="px-6 py-4 hover:shadow-lg bg-blue-500 border-b-2 border-t border-l border-r border-black mb-4">
                    <div class="font-bold text-xl mb-2">
                        {{ $ladder->name }}
                    </div>
                    <p class="text-white text-base text-shadow">
                        {{ $ladder->description }}
                    </p>
                </div>
            </a>
        </div>
    @endforeach
@endsection
