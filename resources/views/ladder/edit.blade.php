@extends('layouts.app')

@section('content')
    <ladder-edit :ladder="{{ $ladder->toJson() }}"></ladder-edit>
@endsection
