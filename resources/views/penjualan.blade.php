@extends('templates.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="container">
      <h1>Transaksi Penjualan</h1>
    <div class="justify-content-center" style="margin-top: 3%;">
      <table class="table table-bordered table-hover col-md-12" style="border : 1px solid black;">
          <tr>
            <th>Tanggal</th>
            <th>Produk</th>
            <th>Jumlah Barang</th>
            <th>Total</th>
          </tr>
          @foreach($data as $penjualan)
          <tr>
            <td>{{$penjualan->created_at->format('Y-m-d')}}</td>
            <td>{{$penjualan->nama_produk}}</td>
            <td>{{$penjualan->jumlah_barang}}</td>
            <td>{{$penjualan->total_harga}}</td>
           </tr>
           @endforeach
           <tr>
              <td colspan="2">Total</td>
              <td>{{$total_barang}}</td>
              <td>{{$total_penjualan}}</td>
            </tr>
      </table>
      {{$data->links()}}	
    <a href="{{route('penjualan.create')}}" class="btn btn-success" onclick="Swal.fire('Data Berhasil Di Download', 'Mantap' , 'success')">Cetak</a>
    </div>
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection