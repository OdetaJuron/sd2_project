@extends('layouts.app')

@section('content')
    <h1>{{ __('All registrations') }}</h1>


    @if (session('successMessage'))
        <div class="alert alert-success">
            {{ session('successMessage') }}
        </div>
    @endif

    @if (empty($conferences) || count($conferences) === 0)
        <p>No registrations yet.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($conferences as $conferenceItem)
                    <tr>
                        <td>{{ $conferenceItem->title }}</td>
                        <td>{{ $conferenceItem->start_date }}</td>
                        <td>{{ $conferenceItem->start_time }}</td>
                        <td>{{ $conferenceItem->address }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
