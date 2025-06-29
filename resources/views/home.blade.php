@extends('layouts.app')

@php
    $activeAnnouncement = \App\Models\Announcement::where('is_active', true)->latest()->first();
@endphp

@if($activeAnnouncement)
    <div class="alert alert-info">
        <strong>{{ $activeAnnouncement->title }}</strong><br>
        {{ $activeAnnouncement->content }}
    </div>
@endif

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
