<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF; 
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class ProductController extends Controller
{
// Method untuk menampilkan semua produk
    public function index()
    {
        $products = Product::where('user_id', auth()->user()->id)->get();
        return view('mainpage', compact('products'));
    }
// Method untuk menampilkan form pembuatan produk baru
    public function create()
    {
        return view('mainage.create');
    }
// Method untuk menyimpan produk baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_code' => 'required|unique:products',
            'quantity' => 'required|integer',
            'price' => 'required|integer',
            'date' => 'required|date',
            
        ]);

        $data = $request->all();

        unset($data['_token'], $data['_method']);


        Product::create([
            'product_name' => $request->product_name,
            'product_code' => $request->product_code,
            'quantity' => $request -> quantity,
            'price' => $request -> price,
            'date' => $request -> date,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('mainpage.index')
            ->with('success', 'Product created successfully.');
    }

// Method untuk menampilkan detail produk
    public function show(Product $product)
    {
        return view('mainpage.show', compact('product'));
    }
    public function edit(Product $mainpage)
    {
        return view('mainpage.edit', compact('mainpage'));
    }
// Method untuk menampilkan form edit produk
    public function update(Request $request, Product $mainpage)
    {
        $request->validate([
            'product_name' => 'required',
            'product_code' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|integer',
            'date' => 'required|date',
        ]);

        $data = $request->all();

        unset($data['_token'], $data['_method']);
        $mainpage->update($data);

        return redirect()->route('mainpage.index')
            ->with('success', 'Product updated successfully.');
    }
// Method untuk menghapus produk
    public function destroy(Product $mainpage)
    {
        $mainpage->delete();

        return redirect()->route('mainpage.index')
            ->with('success', 'Product deleted successfully.');
    }
// Method untuk mengekspor data produk ke PDF
    public function export()
    {
        $data = [
            'title' => 'Data Produk',
            'products' => Product::all(), 
        ];

        $html = view('exports.product', $data)->render();

        $pdf = FacadePdf::loadHTML($html);

        return $pdf->download('products.pdf');
    }
}
