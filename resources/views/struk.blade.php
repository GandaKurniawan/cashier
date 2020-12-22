<!DOCTYPE html>
<html>
<head>
	<title>Struk Toko Sukisman</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
	<style>
 .body-main {
     background: #ffffff;
     border-bottom: 15px solid #1E1F23;
     border-top: 15px solid #1E1F23;
     margin-top: 30px;
     margin-bottom: 30px;
     padding: 40px 30px !important;
     position: relative;
     box-shadow: 0 1px 21px #808080;
     font-size: 10px
 }

 .main thead {
     background: #1E1F23;
     color: #fff
 }

 .img {
     height: 100px
 }

 h1 {
     text-align: center
 }
 h5{
	 font-size: 10px;
 }
 td{
	 font-size: 10px;
 }
	</style>
</head>
<body>
		<div class="container">
				<div class="container">
					<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-12 text-center">
										<h2>TOKO SUKISMAN</h2>
										<h5>Jalan melati no 24 ,Jenggawah ,Jember</h5>
									</div>
								</div>
								<div>
									<table class="table">
										<thead>
											<tr>
												<th>
													<h5>Nama Barang</h5>
												</th>
												<th>
													<h5>Harga</h5>
												</th>
											</tr>
										</thead>
										<tbody>
											@for($i=0, $count = count($barang);$i<$count;$i++) 	
											<tr>
												<td class="col-md-9">{{$barang[$i]}}</td>
												<td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i> {{$harga[$i]}} </td>
											</tr>
											@endfor
											<tr>
												<td class="text-right">
													<p> <strong>Total Harga:</strong> </p>
													<p> <strong>Uang yang Dibayar: </strong> </p>
													<p> <strong>Kembalian: </strong> </p>
												</td>
												<td>
													<p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> {{$totalharga}} </strong> </p>
													<p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> {{$uangdibayar}}</strong> </p>
													<p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> {{$kembalian}} </strong> </p>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
					</div>
				</div>
			</div>
</body>
</html>