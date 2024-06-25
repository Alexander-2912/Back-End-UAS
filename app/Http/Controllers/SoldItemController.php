<?php

namespace App\Http\Controllers;

use App\Models\SoldItem;
use Illuminate\Http\Request;

class SoldItemController extends Controller
{
    //

    public function index()
    {
        $soldItems = SoldItem::all();
        return view('sold_items.index', compact('soldItems'));
    }

    public function create()
    {
        return view('sold_items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'buyer_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'product_name' => 'required|string|max:255',
            'product_code' => 'required|string|max:50',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        $data = $request->all();

        unset($data['_token'], $data['_method']);

        SoldItem::create($data);

        return redirect()->route('sold_item.index')
            ->with('success', 'Sold item created successfully.');
    }

    public function edit(SoldItem $sold_item)
    {
        return view('sold_items.edit', compact('sold_item'));
    }

    public function update(Request $request, SoldItem $sold_item)
    {
        $request->validate([
            'buyer_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'product_name' => 'required|string|max:255',
            'product_code' => 'required|string|max:50',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        $sold_item->update($request->all());

        return redirect()->route('sold_item.index')
            ->with('success', 'Sold item updated successfully.');
    }

    public function destroy(SoldItem $sold_item)
    {
        $sold_item->delete();

        return redirect()->route('sold_item.index')
            ->with('success', 'Sold item deleted successfully.');
    }
}
