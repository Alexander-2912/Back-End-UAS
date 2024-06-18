<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function index(){
        return view('purchase.index');
    }

    public function create(){
        return view('purchase.index');
    }

    public function store(Request $request){
        $data = $request -> validate([
        'sellerName' => 'required',
        'phoneNumber' => 'required',
        'productName' => 'required',
        'productCode' => 'required',
        'quantity'=> 'required',
        'price' => 'required',
        ]);

        $newPurchase = Purchase::create($data);

        return redirect(route('purchase.index'));

    }
}
