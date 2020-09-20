@extends('layouts.app')

@section('content')
    <ladder-ranking :ladder="{{ $ladder->toJson() }}"></ladder-ranking>
@endsection
