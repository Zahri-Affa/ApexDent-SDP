@extends('layouts.layout')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('Home')</a></li>
            <li class="breadcrumb-item"><a href="{{ route('announcements.index') }}">@lang('Announcements')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('Create Announcement')</li>
        </ol>
    </nav>

    <h1 class="mb-4">@lang('Create Emergency Announcement')</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('announcements.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">@lang('Title')</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">@lang('Content')</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
        </div>

        <div class="form-group form-check">
    <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1">
    <label for="is_active" class="form-check-label">@lang('Is Active')</label>
</div>

        <button type="submit" class="btn btn-primary">@lang('Create Announcement')</button>
    </form>
</div>
@endsection
