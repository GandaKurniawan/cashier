<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\m_penjualan;
use App\models\m_produk;
use PDF;
use Carbon\Carbon;

class c_penjualan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $x= $data->created_at->toDateTimeString('Y-m-d');
        // date
        $x = date('Y-m-d');
        $total_penjualan = 0;
        $total_barang = 0;
        $data = m_penjualan::get();
        foreach($data as $time){
            $y= $time->created_at->format('Y-m-d');
            $time->created_at = $y;
            $time->save();
        }
        $data = m_penjualan::where('created_at' , $x)->paginate(8);
        foreach($data as $datas){
            $total_penjualan += $datas->total_harga;
            $total_barang += $datas->jumlah_barang;
        }
        return view('penjualan', compact('data','total_penjualan','total_barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function PDF(){
       
        // $pdf = PDF::loadview('penjualan-pdf',compact('data'));
    	// return $pdf->download('laporan-penjualan-pdf');
    }
    public function create()
    {
        $x = date('Y-m-d');
        $total_penjualan = 0;
        $total_barang = 0;
        $data = m_penjualan::get();
        foreach($data as $time){
            $y= $time->created_at->format('Y-m-d');
            $time->created_at = $y;
            $time->save();
        }
        $data = m_penjualan::where('created_at' , $x)->get(); 
        foreach($data as $datas){
            $total_penjualan += $datas->total_harga;
            $total_barang += $datas->jumlah_barang;
        } 
        $pdf = PDF::loadview('penjualanpdf',compact('data','total_penjualan','total_barang'));
    	return $pdf->download('laporan-penjualan-pdf.pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $x = 0;
        $y = '';
        $harga = $request['harga'];
        foreach($request['barang'] as $a){
            $x += $a;
        }
        foreach($request['item_name'] as $b){
            $y .= $b;
        }
        $stokcukup = true;
        for($i=0,$count=count($request['nama_produk']);$i<$count; $i++){
            $produk = m_produk::where('nama' , $request['nama_produk'][$i])->first();
            $stok = ($produk->stok - $request['barang'][$i]);
            if($stok < 0){
                $stokcukup = false;
            }
        }
    $cekuang = $request['pembayaran'] - $request['total'];
    if($stokcukup){
        if($cekuang > 0){
            for($i=0,$count=count($request['nama_produk']);$i<$count; $i++){
                $produk = m_produk::where('nama' , $request['nama_produk'][$i])->first();
                $stok = ($produk->stok - $request['barang'][$i]);
                $produk->stok = $stok;
                $produk->save();
            }
            $barang = $request['item_name'];
            $uangdibayar = $request['pembayaran'];
            $kembalian = $uangdibayar -  $request['total'];
            $data = new m_penjualan;
            $data->nama_produk = $y;
            $data->jumlah_barang = $x;
            $data->total_harga = $request['total'];
            $data->save();
            $totalharga = $request['total'];
            $data = m_produk::paginate(8);
            $error = false;
            $struk = PDF::loadview('struk', compact('x','y','barang','totalharga', 'uangdibayar' , 'kembalian','harga'))->setPaper('a6', 'potrait');
            return $struk->stream('struk-penjualan.pdf');
        }
    }
        $data = m_produk::paginate(8);
        $error = true;
        return view('pembayaran', compact('data' ,'error'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
