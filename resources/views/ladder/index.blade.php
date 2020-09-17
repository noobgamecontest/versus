@extends('layouts.app')

@section('content')
    @foreach($ladders as $ladder)
        <a href="#">
            <div class="max-w-sm overflow-hidden shadow-lg bg-blue-500 border-b-2 border-t border-l border-r border-black mb-4 mx-auto">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ $ladder->name }}</div>
                    <p class="text-white text-base">
                        {{ $ladder->description }}
                    </p>
                </div>
            </div>
        </a>
    @endforeach
@endsection
