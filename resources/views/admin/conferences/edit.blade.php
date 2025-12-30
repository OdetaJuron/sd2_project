@extends('layouts.app')



@section('content')
    <h1 class="mb-4">{{ __('Edit conference') }}</h1>

    <form method="POST" action="{{ route('admin.conferences.update', $conference['id']) }}">
        @csrf

        @include('admin.conferences.form')

        <button type="submit" class="btn btn-primary">
            {{ __('Update') }}
        </button>

        <a href="{{ route('admin.conferences.index') }}" class="btn btn-secondary">
            {{ __('Back') }}
        </a>
    </form>
@endsection
