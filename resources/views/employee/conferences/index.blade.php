@extends('layouts.app')

@section('title', __('Employee conferences'))
@section('page_title', __('Conferences'))

@section('content')


        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>{{ __('Conferences') }}</th>
                    <th>{{ __('Date') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Location') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
@foreach ($conferences as $conference)
    @php
        $statusText = 'Planned';

        if ($conference->start_date < date('Y-m-d')) {
            $statusText = 'Finished';
        }
    @endphp

    <tr>
        <td>{{ $conference->title }}</td>
        <td>
            {{ $conference->start_date }}
            @if($conference->start_time)
                {{ $conference->start_time }}
            @endif
        </td>
        <td>{{ __($statusText) }}</td>
        <td>{{ $conference->address }}</td>
        <td>
            <a href="{{ route('employee.conferences.show', $conference->id) }}"
               class="btn btn-sm btn-secondary">
                {{ __('View') }}
            </a>
        </td>
    </tr>
@endforeach

            </tbody>
        </table>


@endsection
