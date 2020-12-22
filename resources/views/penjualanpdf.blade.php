<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Penjualan</h4>
	</center>
 
	<table class='table table-bordered'>
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
           <tr>
              <td colspan="2">Total</td>
              <td>{{$total_barang}}</td>
              <td>{{$total_penjualan}}</td>
            </tr>

	</table>
 
</body>
</html>