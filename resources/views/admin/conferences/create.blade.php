@extends('layouts.app')

@section('page_title', __('Create conference'))

@section('content')
    <h1 class="mb-4">{{ __('Create conference') }}</h1>

    <form method="POST" action="{{ route('admin.conferences.store') }}">
        @csrf

        @php
            $conference = $conference ?? [];
        @endphp

        @include('admin.conferences.form')

        <button type="submit" class="btn btn-primary">
            {{ __('Create') }}
        </button>

        <a href="{{ route('admin.conferences.index') }}" class="btn btn-secondary">
            {{ __('Back') }}
        </a>
    </form>
@endsection
