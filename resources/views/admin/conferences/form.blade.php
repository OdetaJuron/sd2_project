@php
  
    $conference = $conference ?? null;
@endphp

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mb-3">
    <label class="form-label">{{ __('Title') }}</label>
    <input type="text"
           name="title"
           class="form-control"
           value="{{ old('title', $conference?->title) }}">
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Description') }}</label>
    <textarea name="description"
              class="form-control"
              rows="4">{{ old('description', $conference?->description) }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Speakers') }}</label>
    <textarea name="speakers"
              class="form-control"
              rows="2">{{ old('speakers', $conference?->speakers) }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Start date') }}</label>
    <input type="date"
           name="start_date"
           class="form-control"
           value="{{ old('start_date', $conference?->start_date) }}">
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Start time') }}</label>
    <input type="time"
           name="start_time"
           class="form-control"
           value="{{ old('start_time', $conference?->start_time) }}">
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Address') }}</label>
    <input type="text"
           name="address"
           class="form-control"
           value="{{ old('address', $conference?->address) }}">
</div>
