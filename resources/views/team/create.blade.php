@extends('layouts.app')

@section('content')
    <ladder-register-team :ladder="{{ $ladder->toJson() }}"></ladder-register-team>
@endsection
