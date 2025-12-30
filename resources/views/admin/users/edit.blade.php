@extends('layouts.app')


@section('content')
    <h1 class="mb-4">{{ __('Edit user') }}</h1>

    <form method="POST" action="{{ route('admin.users.update', $user['id']) }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">{{ __('Name') }}</label>
            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ old('name', $user['name']) }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- <div class="mb-3">
            <label class="form-label">{{ __('Surname') }}</label>
            <input type="text"
                   name="surname"
                   class="form-control"
                   value="{{ old('surname', $user['surname']) }}">
            @error('surname')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div> --}}

        <div class="mb-3">
            <label class="form-label">{{ __('E-mail') }}</label>
            <input type="email"
                   name="email"
                   class="form-control"
                   value="{{ old('email', $user['email']) }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            {{ __('Save') }}
        </button>

        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
            {{ __('Back') }}
        </a>
    </form>
@endsection
