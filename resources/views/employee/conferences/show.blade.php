@extends('layouts.app')

@section('title', __('Conference details'))
@section('page_title', __('Conference details'))

@section('content')

    <div class="mb-3">
        <a href="{{ route('employee.conferences') }}" class="btn btn-sm btn-outline-secondary">
            {{ __('Back') }}
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">{{ $conference->title }}</h5>

            <p class="card-text">
                <strong>{{ __('Date') }}:</strong> {{ $conference->start_date }}<br>
                <strong>{{ __('Time') }}:</strong> {{ $conference->start_time }}<br>
                <strong>{{ __('Address') }}:</strong> {{ $conference->address }}
            </p>

            <p>{{ $conference->description }}</p>
        </div>
    </div>

    <h3>{{ __('Registered clients') }}</h3>

    @if ($registeredUserList->count() === 0)
        <p>{{ __('No registered customers.') }}</p>
    @else
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('E-mail') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registeredUserList as $registeredUser)
                    <tr>
                        <td>{{ $registeredUser->name }}</td>
                        <td>{{ $registeredUser->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection
