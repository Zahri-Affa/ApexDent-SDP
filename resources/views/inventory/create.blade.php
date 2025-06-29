@extends('layouts.layout')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow rounded-4 w-50">
        <div class="card-header bg-primary text-white text-center rounded-top-4">
            <h2>@lang('Add New Inventory Item')</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('inventory.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="item_name" class="form-label">@lang('Item Name') <span class="text-danger">*</span></label>
                    <input type="text" name="item_name" id="item_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">@lang('Quantity') <span class="text-danger">*</span></label>
                    <input type="number" name="quantity" id="quantity" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="unit" class="form-label">@lang('Unit')</label>
                    <input type="text" name="unit" id="unit" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">@lang('Category')</label>
                    <input type="text" name="category" id="category" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="expiry_date" class="form-label">@lang('Expiry Date')</label>
                    <input type="date" name="expiry_date" id="expiry_date" class="form-control">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success px-5">@lang('Add Item')</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
