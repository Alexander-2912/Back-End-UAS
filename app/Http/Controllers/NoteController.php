<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    // Method untuk menampilkan daftar catatan

    public function index()
    {
        // Mendapatkan catatan milik pengguna yang sedang login
        $notes = Note::where('user_id', auth()->user()->id)->get();
        return view('notes.index', compact('notes'));
    }
// Method untuk menampilkan form pembuatan catatan baru
    public function create()
    {
        return view('notes.create');
    }
// Method untuk menampilkan form pembuatan catatan baru
    public function store(Request $request)
    {// Validasi input dari request
        $request->validate([
            'description' => 'required|string',
            'date' => 'required|date',
            'important' => 'nullable|boolean',
        ]);
// Membuat catatan baru dengan data yang divalidasi
        Note::create([
            'description' => $request->description,
            'date' => $request->date,
            'important' => $request->has('important'), // Simpan nilai important jika ada
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('notes.index')
            ->with('success', 'Note created successfully.');
    }
// Method untuk menampilkan form edit catatan
    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }
 // Method untuk mengupdate catatan yang sudah ada
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'description' => 'required|string',
            'date' => 'required|date',
            'important' => 'nullable|boolean', // Validasi untuk important
        ]);

        $note->update([
            'description' => $request->description,
            'date' => $request->date,
            'important' => $request->has('important'), // Update nilai important jika ada
        ]);

        return redirect()->route('notes.index')
            ->with('success', 'Note updated successfully.');
    }
// Method untuk menghapus catatan
    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('notes.index')
            ->with('success', 'Note deleted successfully.');
    }
}
