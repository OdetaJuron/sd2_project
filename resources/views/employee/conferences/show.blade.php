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
            <h5 class="card-title">{{ $conference['title'] }}</h5>

            <p class="card-text">
                <strong>{{ __('Date') }}:</strong> {{ $conference['date'] }}<br>
                <strong>{{ __('Location') }}:</strong> {{ $conference['location'] }}<br>
                <strong>{{ __('Status') }}:</strong> {{ $conference['status'] }}

                <p>{{ $conference['description'] }}</p>
            </p>
        </div>
    </div>

    <h3>{{ __('Registered clients') }}</h3>

    @if (empty($registrations))
        <p>{{ __('No registered customers.') }}</p>
    @else
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Surname') }}</th>
                    <th>{{ __('E-mail') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registrations as $registration)
                    <tr>
                        <td>{{ $registration['name'] }}</td>
                        <td>{{ $registration['surname'] }}</td>
                        <td>{{ $registration['email'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection
