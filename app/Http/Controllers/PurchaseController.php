<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use Barryvdh\DomPDF\Facade\Pdf;

class PurchaseController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::where('user_id', auth()->user()->id)->get();
 
        return view('purchases.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('purchases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sellerName' => 'required|string',
            'phoneNumber' => 'required|string',
            'productName' => 'required|string',
            'productCode' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'date' => 'required|date'
        ]);

        Purchase::create([
            'sellerName' => $request -> sellerName,
            'phoneNumber' => $request -> phoneNumber,
            'productName' => $request->productName,
            'productCode' => $request->productCode,
            'quantity' => $request -> quantity,
            'price' => $request -> price,
            'date' => $request -> date,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('purchase.index')
            ->with('success', 'Purchase created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        return view('purchase.show', compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        return view('purchases.edit', compact('purchase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        $request->validate([
            'sellerName' => 'required|string',
            'phoneNumber' => 'required|string',
            'productName' => 'required|string',
            'productCode' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'date' => 'required'
        ]);

        $purchase->update($request->all());

        return redirect()->route('purchase.index')
            ->with('success', 'Purchase updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();

        return redirect()->route('purchase.index')
            ->with('success', 'Purchase deleted successfully');
    }

    public function export()
    {
        $data = [
            'title' => 'Data Produk',
            'purchases' => Purchase::all(), // Gantikan Product dengan model yang sesuai
        ];

        // Load view blade untuk PDF dan konversi ke HTML
        $html = view('exports.purchase', $data)->render();

        $pdf = Pdf::loadHTML($html);

        // Unduh file PDF
        return $pdf->download('purchase.pdf');
    }
}
