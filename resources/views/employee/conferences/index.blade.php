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
                    <tr>
                        <td>{{ $conference['title'] }}</td>
                        <td>{{ $conference['date'] }}</td>
                        <td>{{ $conference['status'] }}</td>
                        <td>{{ $conference['location'] }}</td>
                        <td>
                            <a href="{{ route('employee.conferences.show', $conference['id']) }}"
                               class="btn btn-sm btn-secondary">
                                {{ __('View') }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


@endsection
