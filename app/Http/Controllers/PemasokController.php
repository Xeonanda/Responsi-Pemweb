<?php

namespace App\Http\Controllers;

use App\Models\pemasok;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemasoks = pemasok::all();
        return view('Navbar.pemasok.index', compact('pemasoks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Navbar.pemasok.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'address' => 'required|string|max:255'
        ]);

        pemasok::create($request->all());
        return redirect()->route('pemasok.index')->with('success', 'pemasok created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(pemasok $pemasok)
    {
        return view('Navbar.pemasok.show', compact('pemasok'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pemasok $pemasok)
    {
        return view('Navbar.pemasok.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pemasok = pemasok::findOrFail($id);

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'address' => 'required|string|max:255'
        ]);

        $pemasok->update($validatedData);

        return redirect()->route('pemasok.index')->with('success', 'pemasok updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pemasok $pemasok)
    {
        $pemasok->delete();
        return redirect()->route('pemasok.index')->with('success', 'pemasok deleted successfully.');
    }
}
