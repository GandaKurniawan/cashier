<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\m_produk;
use Alert;

class c_produk extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = m_produk::paginate(8);
        return view('produk' , ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'stok' => 'required|numeric|min:0',
            'harga' => 'required|numeric|min:0'
        ]);
        $data = new m_produk;
        $data->nama = $request['nama'];
        $data->kategori = $request['kategori'];
        $data->stok = $request['stok'];
        $data->harga = $request['harga'];
        $data->save();
        $data = m_produk::paginate(8);
        return view('produk', ['data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kategori)
    {
        $data = m_produk::where('kategori', $kategori)->first();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = m_produk::find($id);
        $data->nama = $request['nama'];
        $data->kategori = $request['kategori'];
        $data->stok = $request['stok'];
        $data->harga = $request['harga'];
        $data->save();
        $data = m_produk::paginate(8);
        return view('produk', ['data' => $data]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \I
     * lluminate\Http\Response
     */
    public function destroy($id)
    {
        $data = m_produk::find($id);
        $data->delete();
        $data = m_produk::paginate(8);
        return view('produk', ['data' => $data]);
    }
}
