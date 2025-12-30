@extends('layouts.app')

@section('title', __('Conferences'))
@section('page_title', __('Conferences'))

@section('content')

    <h2>{{ $conference->title }}</h2>

    <p>
        <strong>{{ __('Date') }}:</strong>  {{ $conference->start_date }}      
    </p>
    <p><strong>{{ __('Time') }}:</strong> {{ $conference->start_time }}</p>

    <p><strong>{{ __('Location') }}:</strong> {{ $conference->address }}</p>

    <p>{{ $conference->description }}</p>

    <a href="{{ route('client.conferences') }}" class="btn btn-secondary mt-3">
        {{ __('Back') }}
    </a>

@endsection
