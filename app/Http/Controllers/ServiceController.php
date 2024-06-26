<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\SoldItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
// Method untuk menampilkan semua service
    public function index()
    {
        $services = Service::where('user_id', auth()->user()->id)->get();

        return view('services.index', compact('services'));
    }
// Method untuk menampilkan form pembuatan service baru
    public function create()
    {
        return view('services.create');
    }
// Method untuk menyimpan service baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'service_name' => 'required|string|max:255',
            'service_code' => 'required|string|max:50',
            'price' => 'required|numeric',
            'date' => 'required|date',
        ]);

        Service::create([
            'customer_name' => $request -> customer_name,
            'phone_number' => $request -> phone_number,
            'service_name' => $request->service_name,
            'service_code' => $request->service_code,
            'price' => $request -> price,
            'date' => $request -> date,
            'user_id' => auth()->id(),
        ]);


        return redirect()->route('services.index')
            ->with('success', 'Service created successfully.');
    }
// Method untuk menampilkan form edit service
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }
// Method untuk mengupdate service yang sudah ada
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'service_name' => 'required|string|max:255',
            'service_code' => 'required|string|max:50',
            'price' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $service->update($request->all());

        return redirect()->route('services.index')
            ->with('success', 'Service updated successfully');
    }
// Method untuk menghapus service
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')
            ->with('success', 'Service deleted successfully');
    }

    public function export()
    {
        $data = [
            'title' => 'Data Produk',
            'services' => Service::all(), 
        ];

        
        $html = view('exports.service', $data)->render();

        $pdf = Pdf::loadHTML($html);

        // Unduh file PDF
        return $pdf->download('services.pdf');
    }
}
