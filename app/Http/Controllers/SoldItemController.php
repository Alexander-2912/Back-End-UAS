<?php

namespace App\Http\Controllers;

use App\Models\SoldItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SoldItemController extends Controller
{
    //
// Method untuk menampilkan semua item yang terjual
    public function index()
    {
        $soldItems = SoldItem::where('user_id', auth()->user()->id)->get();
        return view('sold_items.index', compact('soldItems'));
    }
// Method untuk menampilkan form pembuatan item yang terjual baru
    public function create()
    {
        return view('sold_items.create');
    }
  // Method untuk menyimpan item yang terjual baru ke database
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

        SoldItem::create([
            'buyer_name' => $request -> buyer_name,
            'phone_number' => $request -> phone_number,
            'product_name' => $request->product_name,
            'product_code' => $request->product_code,
            'quantity' => $request -> quantity,
            'price' => $request -> price,
            'date' => $request -> date,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('sold_item.index')
            ->with('success', 'Sold item created successfully.');
    }
// Method untuk menampilkan form edit item yang terjual
    public function edit(SoldItem $sold_item)
    {
        return view('sold_items.edit', compact('sold_item'));
    }
    // Method untuk mengupdate item yang terjual yang sudah ada
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

    // Method untuk menghapus item yang terjual
    public function destroy(SoldItem $sold_item)
    {
        $sold_item->delete();

        return redirect()->route('sold_item.index')
            ->with('success', 'Sold item deleted successfully.');
    }

// Method untuk mengekspor data item yang terjual ke PDF
    public function export()
    {
        $data = [
            'title' => 'Data Produk',
            'soldItems' => SoldItem::all(), 
        ];

   
        $html = view('exports.sold', $data)->render();

        $pdf = Pdf::loadHTML($html);


        return $pdf->download('sold.pdf');
    }
}
