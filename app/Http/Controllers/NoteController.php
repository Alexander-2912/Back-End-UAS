<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    //

    public function index()
    {
        $notes = Note::where('user_id', auth()->user()->id)->get();
        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'date' => 'required|date',
            'important' => 'nullable|boolean',
        ]);

        Note::create([
            'description' => $request->description,
            'date' => $request->date,
            'important' => $request->has('important'), // Simpan nilai important jika ada
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('notes.index')
            ->with('success', 'Note created successfully.');
    }

    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

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

    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('notes.index')
            ->with('success', 'Note deleted successfully.');
    }
}
