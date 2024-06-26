<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF; // Alias untuk Barryvdh\DomPDF\Facade
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('mainpage', compact('products'));
    }

    public function create()
    {
        return view('mainage.create');
    }

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


        Product::create($data);

        return redirect()->route('mainpage.index')
            ->with('success', 'Product created successfully.');
    }


    public function show(Product $product)
    {
        return view('mainpage.show', compact('product'));
    }
    public function edit(Product $mainpage)
    {
        return view('mainpage.edit', compact('mainpage'));
    }

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

    public function destroy(Product $mainpage)
    {
        $mainpage->delete();

        return redirect()->route('mainpage.index')
            ->with('success', 'Product deleted successfully.');
    }

    public function export()
    {
        $data = [
            'title' => 'Data Produk',
            'products' => Product::all(), // Gantikan Product dengan model yang sesuai
        ];

        // Load view blade untuk PDF dan konversi ke HTML
        $html = view('exports.product', $data)->render();

        $pdf = FacadePdf::loadHTML($html);

        // Unduh file PDF
        return $pdf->download('products.pdf');
    }
}
