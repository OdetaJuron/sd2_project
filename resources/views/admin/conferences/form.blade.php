<div class="mb-3">
    <label class="form-label">{{ __('Title') }}</label>
    <input type="text"
           name="title"
           class="form-control"
           value="{{ old('title', $conference['title'] ?? '') }}">
    @error('title')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Description') }}</label>
    <textarea name="description"
              class="form-control"
              rows="4">{{ old('description', $conference['description'] ?? '') }}</textarea>
    @error('description')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Date') }}</label>
    <input type="date"
           name="date"
           class="form-control"
           value="{{ old('date', $conference['date'] ?? '') }}">
    @error('date')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Location') }}</label>
    <input type="text"
           name="location"
           class="form-control"
           value="{{ old('location', $conference['location'] ?? '') }}">
    @error('location')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
