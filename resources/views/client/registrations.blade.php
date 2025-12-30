@extends('layouts.app')

@section('page_title', __('Client registrations'))

@section('content')

    @if (session('successMessage'))
        <div class="alert alert-success">
            {{ session('successMessage') }}
        </div>
    @endif

    <p>{{ __('Here will be client registrations list. For now only simple text.') }}</p>
@endsection
