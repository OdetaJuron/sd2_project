@extends('layouts.app')


@section('content')
    <h1 class="mb-4">{{ __('Users') }}</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ __('Name') }}</th>
            {{-- <th>{{ __('Surname') }}</th> --}}
            <th>{{ __('E-mail') }}</th>
            <th>{{ __('Actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user['id'] }}</td>
                <td>{{ $user['name'] }}</td>
                {{-- <td>{{ $user['surname'] }}</td> --}}
                <td>{{ $user['email'] }}</td>
                <td>
                    <a href="{{ route('admin.users.edit', $user['id']) }}" class="btn btn-sm btn-primary">
                        {{ __('Edit user') }}
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
