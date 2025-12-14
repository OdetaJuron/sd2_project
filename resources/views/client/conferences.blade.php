@extends('layouts.app')


@section('title', __('Conferences'))
@section('page_title', __('Conferences'))

@section('content')

    


    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>{{ __('Conferences') }}</th>
                <th>{{ __('Date') }}</th>
                <th>{{ __('Location') }}</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($conferences as $conference)
                
                <tr id="conference-row-{{ $conference['id'] }}">
                    <td>{{ $conference['title'] }}</td>
                    <td>{{ $conference['date'] }}</td>
                    <td>{{ $conference['location'] }}</td>
                    <td>
                        
                        <a href="{{ route('client.conferences.show', $conference['id']) }}"
                           class="btn btn-sm btn-secondary">
                            {{ __('View') }}
                        </a>

                        
                        <button type="button"
                                class="btn btn-sm btn-success js-open-register-form"
                                data-conference-id="{{ $conference['id'] }}">
                            {{ __('Register') }}
                        </button>
                    </td>
                </tr>

                
                <tr class="register-form-row d-none"
                    data-conference-id="{{ $conference['id'] }}">
                    <td colspan="4">
                        <form method="POST"
                              action="{{ route('client.conferences.register', $conference['id']) }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label" for="participant_name_{{ $conference['id'] }}">
                                    {{ __('Name Surname') }}
                                </label>
                                <input type="text"
                                       class="form-control"
                                       id="participant_name_{{ $conference['id'] }}"
                                       name="participant_name"
                                       placeholder="{{ __('Name Surname') }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="participant_email_{{ $conference['id'] }}">
                                    {{ __('E-mail') }}
                                </label>
                                <input type="email"
                                       class="form-control"
                                       id="participant_email_{{ $conference['id'] }}"
                                       name="participant_email"
                                       placeholder="{{ __('E-mail') }}">
                            </div>

                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const buttons = document.querySelectorAll('.js-open-register-form');

            buttons.forEach(function (button) {
                button.addEventListener('click', function () {
                    const conferenceId = this.getAttribute('data-conference-id');

                    const row = document.querySelector(
                        '.register-form-row[data-conference-id="' + conferenceId + '"]'
                    );

                    if (row) {
                        row.classList.toggle('d-none');
                    }
                });
            });
        });
    </script>

@endsection

