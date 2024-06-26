<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\pemasok;
use App\Models\produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->query('perPage', 9);
        $search = $request->query('search');

        $query = produk::query();

        if (!empty($search)) {
            $validatedSearch = filter_var($search, FILTER_VALIDATE_FLOAT);
            if ($validatedSearch !== false) {
                $query->where('nama', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%')->orWhere('price', '=', $validatedSearch);
            } else {
                $query->where('nama', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%');
            }
        }

        $produks = $query->paginate($perPage);

        return view('Navbar.produk.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = kategori::all();
        $pemasoks = pemasok::all();
        return view('Navbar.produk.create', compact('kategoris', 'pemasoks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'description' => 'string',
            'price' => 'required|numeric|min:0|max:9999999.99',
            'id_kategori' => 'required|numeric',
            'id_pemasok' => 'required|numeric'
        ]);

        produk::create($request->all());
        return redirect()->route('produk.index')->with('success', 'produk created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(produk $produk)
    {
        return view('Navbar.produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produk $produk)
    {
        $kategoris = kategori::all();
        $pemasoks = pemasok::all();
        return view('Navbar.produk.edit', compact('produk', 'kategoris', 'pemasoks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $produk = produk::findOrFail($id);

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'description' => 'string',
            'price' => 'required|numeric|min:0|max:9999999.99',
            'id_kategori' => 'required|numeric',
            'id_pemasok' => 'required|numeric'
        ]);

        $produk->update($validatedData);

        return redirect()->route('produk.index')->with('success', 'produk updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'produk deleted successfully.');
    }
}
