@extends('layouts.app')

@section('page_title', __('Dashboard'))

@section('content')

    <div class="mb-3">
        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-primary me-2">
            {{ __('Users') }}
        </a>

        <a href="{{ route('admin.conferences.index') }}" class="btn btn-outline-primary">
            {{ __('Conferences') }}
        </a>
    </div>
@endsection
