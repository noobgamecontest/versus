@extends('layouts.app')

@section('content')
    <div class="container-margin text-shadow">
        <h2 class="title-container text-center">Edit {{ $ladder->name }}</h2>
        <form method="POST" action="{{ route('api.ladder.update', $ladder) }}">
             @method('put')
            {{ csrf_field() }}
            <div class="container-padding flex">
                <div class="self-center space-y-4">
                    <input name="name" type="text" placeholder="{{ $ladder->name }}" class="input-form focus:outline-none">
                    <input name="description" type="text" placeholder="{{ $ladder->description }}" class="input-form focus:outline-none">
                    <button type="submit" name="submit" class="input-form bg-gray-200">Modifier le ladder</button>
                </div>
            </div>
        </form>
    </div>
@endsection
