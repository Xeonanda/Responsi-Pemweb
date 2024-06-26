<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->query('perPage', 9);
        $search = $request->query('search');

        $query = kategori::query();

        if (!empty($search)) {
            $query->where('nama', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%');
        }

        $kategoris = $query->paginate($perPage);

        return view('Navbar.kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Navbar.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'description' => 'string',
        ]);

        kategori::create($request->all());
        return redirect()->route('kategori.index')->with('success', 'kategori created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori)
    {
        return view('Navbar.kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategori $kategori)
    {
        return view('Navbar.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kategori = kategori::findOrFail($id);

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'description' => 'string',
        ]);

        $kategori->update($validatedData);

        return redirect()->route('kategori.index')->with('success', 'kategori updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'kategori deleted successfully.');
    }
}
