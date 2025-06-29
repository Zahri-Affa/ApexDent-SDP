@extends('layouts.layout')

@section('content')
<div class="container">
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('Home')</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventory.index') }}">@lang('Inventory')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('Edit Item')</li>
        </ol>
    </nav>

    <h1>@lang('Edit Inventory Item')</h1>

    <form action="{{ route('inventory.update', $inventory->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>@lang('Item Name'):</label>
            <input type="text" name="item_name" class="form-control" value="{{ old('item_name', $inventory->item_name) }}" required>
        </div>

        <div class="form-group">
            <label>@lang('Quantity'):</label>
            <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $inventory->quantity) }}" required>
        </div>

        <div class="form-group">
            <label>@lang('Unit'):</label>
            <input type="text" name="unit" class="form-control" value="{{ old('unit', $inventory->unit) }}">
        </div>

        <div class="form-group">
            <label>@lang('Category'):</label>
            <input type="text" name="category" class="form-control" value="{{ old('category', $inventory->category) }}">
        </div>

        <div class="form-group">
            <label>@lang('Expiry Date'):</label>
            <input type="date" name="expiry_date" class="form-control" value="{{ old('expiry_date', $inventory->expiry_date) }}">
        </div>

        <button type="submit" class="btn btn-primary mt-2">@lang('Update Item')</button>
        <a href="{{ route('inventory.index') }}" class="btn btn-secondary mt-2">@lang('Back to Inventory')</a>
    </form>
</div>
@endsection
