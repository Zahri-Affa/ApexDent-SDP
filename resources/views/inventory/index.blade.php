@extends('layouts.layout')

@section('content')
<div class="container">
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('Home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('Inventory')</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center mb-3">
    <h1>@lang('Inventory List')</h1>
    <a href="{{ route('inventory.create') }}" class="btn btn-primary">@lang('Add New Item')</a>
</div>



    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Inventory Table -->
    <div class="card shadow rounded-4">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>@lang('Item Name')</th>
                        <th>@lang('Quantity')</th>
                        <th>@lang('Unit')</th>
                        <th>@lang('Category')</th>
                        <th>@lang('Expiry Date')</th>
                        <th>@lang('Actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inventories as $inventory)
                        <tr @if($inventory->quantity < 5) style="background-color: #ffe6e6;" @endif>
                            <td>{{ $inventory->item_name }}</td>
                            <td>
                                {{ $inventory->quantity }}
                                @if($inventory->quantity < 5)
                                    <span title="Low Stock!" class="text-warning">⚠️</span>
                                @endif
                            </td>
                            <td>{{ $inventory->unit }}</td>
                            <td>{{ $inventory->category }}</td>
                            <td>{{ $inventory->expiry_date }}</td>
                            <td>
                                @can('edit-inventory')
                                    <a href="{{ route('inventory.edit', $inventory->id) }}" class="btn btn-sm btn-warning">@lang('Edit')</a>
                                @endcan
                                @can('delete-inventory')
                                    <form action="{{ route('inventory.destroy', $inventory->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('@lang('Are you sure you want to delete this item?')')">@lang('Delete')</button>
                                    </form>
                                @endcan
                            </td>
                            <td>
                                <a href="{{ route('inventory.show', $inventory->id) }}" class="btn btn-sm btn-info">@lang('View Details')</a>
                                <!-- Edit and Delete buttons here -->
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-3">
                {{ $inventories->appends(request()->query())->links() }}

            </div>
        </div>
    </div>
</div>
@endsection
