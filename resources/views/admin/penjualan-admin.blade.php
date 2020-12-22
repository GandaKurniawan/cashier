@extends('templates.master-admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="container">

      <h1>Transaksi Penjualan</h1>
      <div class="col-md-12">
        <form action="{{route('penjualan_admin.store')}}" method="post">
          {{csrf_field()}}
          <div class="form-group col-md-4">
              <input class="form-control" type="date" value="pilih tanggal" id="example-date-input" name="waktu">
              <button type="submit" class="btn btn-success">Lihat</button>
            
          </div>
        </form>
      </div>
    <div class="justify-content-center" style="margin-top: 3%;">
      <table class="table table-bordered table-hover col-md-12" style="border : 1px solid black;">
          <tr>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Produk</th>
            <th>Jumlah Barang</th>
            <th>Total</th>
          </tr>
          @foreach($data as $penjualan)
          <tr>
            <td>{{$penjualan->created_at->format('Y-m-d')}}</td>
            <td>{{$penjualan->created_at->format('h.m')}}</td>
            <td>{{$penjualan->nama_produk}}</td>
            <td>{{$penjualan->jumlah_barang}}</td>
            <td>{{$penjualan->total_harga}}</td>
           </tr>
           @endforeach
           
      </table>
            <a href="{{route('penjualan_admin.create')}}" class="btn btn-success" onclick="Swal.fire('Data Berhasil Di Download', 'Mantap' , 'success')">Cetak</a>
    </div>
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection