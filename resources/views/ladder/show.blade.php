@extends('layouts.app')

@section('content')
    <div class="container-margin">
        <div class="flex justify-between items-center">
            <a class="bg-yellow-500" href="{{ route('ladder.edit', $ladder->id) }}">EDIT this ladder</a>
            <form method="POST" action="{{ route('api.ladder.destroy', $ladder) }}">
                @method('delete')
                {{ csrf_field() }}
                <button type="submit" class="bg-yellow-500">delete this ladder</button>
            </form>
        </div>
        <ladder-component :ladder="{{ $ladder->toJson() }}"></ladder-component>
    </div>
@endsection
