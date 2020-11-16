@extends('layouts.app')

@section('content')
    <ladder-edit :ladder="{{ $ladder->toJson() }}"></ladder-edit>
{{--    <div class="max-w-sm mx-auto text-white text-xl text-shadow font-bold text-center bg-blue-700 py-2 mb-4">--}}
{{--        <form method="POST" action="{{ route('api.ladder.update', $ladder) }}">--}}
{{--            @method('put')--}}
{{--            {{ csrf_field() }}--}}
{{--            <div class="">--}}
{{--                <label for="name">{{ $ladder->name }}</label>--}}
{{--                <input class="focus:outline-none text-gray-600 input-custom" type="text" name="name" id="name">--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                <label for="description">{{ $ladder->description }}</label>--}}
{{--                <input class="input-custom" type="text" id="description" name="description">--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                <label for="category">Category</label>--}}
{{--                <input class="input-custom" type="text" id="category" name="category">--}}
{{--            </div>--}}
{{--            <button type="submit">create</button>--}}

{{--        </form>--}}
{{--    </div>--}}
@endsection
