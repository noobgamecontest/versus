@extends('layouts.app')

@section('content')
    <div class="w-full h-screen bg-transparent">
        <div class="circle-background w-full h-full z-back mt-0 lg:-mt-40 bg-blue-500 bg-gradient relative">
            <div class="align-background">
                <div class="max-w-6xl mx-auto py-1 px-4 sm:px-6 lg:px-8 relative h-full">
                    <h1 class="text-center xl:text-left align-middle font-title text-4xl sm:text-5xl lg:text-5xl xl:text-7xl text-shadow leading-none tracking-tight text-gray-100 top-0 absolute absolute-center z-50">
                        Tournois à éliminations directes et calcul des points par équité !
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <a href="{{ route('ladder.create') }}" class="mt-1 md:mt-11 hover:underline mx-auto absolute text-gray-900 font-bold text-sm lg:text-2xl">Nouveau ladder</a>
        <ladders-component></ladders-component>
    </div>
@endsection


