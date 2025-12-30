@extends('layouts.app')



@section('content')
    <h1 class="mb-4">{{ __('Conference list') }}</h1>

    <div class="mb-3">
        <a href="{{ route('admin.conferences.create') }}" class="btn btn-success">
            {{ __('Create conference') }}
        </a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>{{ __('Title') }}</th>
            <th>{{ __('Date') }}</th>
            <th>{{ __('Location') }}</th>
            <th>{{ __('Status') }}</th>
            <th>{{ __('Actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($conferences as $conference)
            @php
                $isPast = $conference->start_date < date('Y-m-d');
            @endphp
            <tr>
                <td>{{ $conference->title }}</td>
                <td>{{ $conference->start_date }}</td>
                <td>{{ $conference->address  }}</td>
                <td>
                    @if ($isPast)
                        {{ __('Past') }}
                    @else
                        {{ __('Upcoming') }}
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.conferences.show', $conference['id']) }}" class="btn btn-sm btn-secondary">
                        {{ __('Show') }}
                    </a>

                    <a href="{{ route('admin.conferences.edit', $conference['id']) }}" class="btn btn-sm btn-primary">
                        {{ __('Edit conference') }}
                    </a>

                    <form method="POST"
                          action="{{ route('admin.conferences.destroy', $conference['id']) }}"
                          class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            {{ __('Delete') }}
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
