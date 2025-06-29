<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;


class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::paginate(10); 
        return view('inventory.index', compact('inventories'));

    }

    public function create()
    {
        return view('inventory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required',
            'quantity' => 'required|integer',
        ]);

        Inventory::create($request->all());

        return redirect()->route('inventory.index')->with('success', 'Item added successfully.');
    }

    public function edit(Inventory $inventory)
    {
        return view('inventory.edit', compact('inventory'));
    }

    public function show(Inventory $inventory)
    {
    return view('inventory.show', compact('inventory'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $request->validate([
            'item_name' => 'required',
            'quantity' => 'required|integer',
        ]);

        
        $inventory->update($request->all());
        // Check if there are any low stock items
        $lowStock = Inventory::where('quantity', '<', 5)->count();

        if ($lowStock > 0) {
        return redirect()->route('inventory.index')
        ->with('success', 'Item updated successfully.')
        ->with('warning', "⚠️ {$lowStock} item(s) are low on stock!");
}
        return redirect()->route('inventory.index')->with('success', 'Item updated successfully.');

    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();

        return redirect()->route('inventory.index')->with('success', 'Item deleted successfully.');
    }
}
