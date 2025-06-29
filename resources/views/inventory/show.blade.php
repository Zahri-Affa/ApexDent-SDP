@extends('layouts.layout')

@section('content')
<div class="container">
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('Home')</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventory.index') }}">@lang('Inventory')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('Item Details')</li>
        </ol>
    </nav>

    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white">
            <h2>@lang('Inventory Item Details')</h2>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label>@lang('Item Name'):</label>
                <p>{{ $inventory->item_name }}</p>
            </div>

            <div class="mb-3">
                <label>@lang('Quantity'):</label>
                <p>{{ $inventory->quantity }}</p>
            </div>

            <div class="mb-3">
                <label>@lang('Unit'):</label>
                <p>{{ $inventory->unit }}</p>
            </div>

            <div class="mb-3">
                <label>@lang('Category'):</label>
                <p>{{ $inventory->category }}</p>
            </div>

            <div class="mb-3">
                <label>@lang('Expiry Date'):</label>
                <p>{{ $inventory->expiry_date }}</p>
            </div>

            <a href="{{ route('inventory.edit', $inventory->id) }}" class="btn btn-warning">@lang('Edit')</a>
            <a href="{{ route('inventory.index') }}" class="btn btn-secondary">@lang('Back to Inventory')</a>
        </div>
    </div>
</div>
@endsection
