@extends('layouts.app')

@section('title', __('Home'))

@section('page_title', __('Home'))

@section('content')
    <p>{{ __('The online system is for conference registration and managing conference data.') }}</p>

    <h4>{{ __('Student information:') }}</h4>

    <p>{{ __('Name : Odeta') }}</p>
    <p>{{ __('Surname : Juroniene') }}</p>
    <p>{{ __('Group: PIT-22-I-NT') }}</p>
@endsection
