@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Emergency Notices</h1>
    @can('create-announcement')
        <a href="{{ route('announcements.create') }}" class="btn btn-primary">Add New Notice</a>
    @endcan
    <div class="list-group mt-3">
        @foreach($announcements as $announcement)
            <div class="list-group-item">
                <h5>{{ $announcement->title }}</h5>
                <p>{{ Str::limit($announcement->content, 100) }}</p>
                <a href="{{ route('announcements.edit', $announcement) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('announcements.destroy', $announcement) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
