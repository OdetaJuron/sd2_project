@extends('layouts.app')


@section('content')
    <h1 class="mb-4">{{ $conference['title'] }}</h1>

    <p><strong>{{ __('Date') }}:</strong> {{ $conference['date'] }}</p>
    <p><strong>{{ __('Location') }}:</strong> {{ $conference['location'] }}</p>


    <p class="mt-3"><strong>{{ __('Description') }}:</strong></p>
    <p>{{ $conference['description'] }}</p>

    <a href="{{ route('admin.conferences.index') }}" class="btn btn-secondary">
        {{ __('Back') }}
    </a>

    <a href="{{ route('admin.conferences.edit', $conference['id']) }}" class="btn btn-primary">
        {{ __('Edit conference') }}
    </a>
@endsection
