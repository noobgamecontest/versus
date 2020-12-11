@extends('layouts.app')

@section('content')
    <div class="container-margin text-shadow">
        <h2 class="title-container text-center">Create ladder</h2>
        <form method="POST" action="{{ route('api.ladder.store') }}">
            @method('post')
            {{ csrf_field() }}
            <div class="container-padding flex">
                <div class="self-center space-y-4">
                    <label for="name">Nom</label>
                    <input id="name" name="name" type="text" class="input-form focus:outline-none">
                    <label for="description">Description</label>
                    <input id="description" name="description" type="text" class="input-form focus:outline-none">
                    <button type="submit" name="submit" class="input-form bg-gray-200">Créer le ladder</button>
                </div>
            </div>
        </form>
    </div>
@endsection
