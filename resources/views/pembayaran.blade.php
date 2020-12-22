@extends('templates.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="container" style="height: 100vh;">
      
    <div class="input-group" style="margin-top: 3%;">
      <input type="text" class="form-control" placeholder="Pilih Produk" id="search">
      <span class="input-group-btn">
        <button type="submit" name="search" class="btn btn-flat"><i class="fa fa-search"></i>
        </button>
      </span>
    </div>
    <div class="justify-content-center" style="margin-top: 3%;">
      <div class="wthreeproductdisplay" id="list-cart">
          @if($error)
            <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong style="color:white;">Kesalahan dalam melakukan transaksi !!</strong>
            </div>
          @endif  
        <div class="form-group" style="padding:0%; margin:0;">
              <ul class=" col-md-12">
                <li class="col-md-3"><h3>Nama</h3></li>
                <li class="col-md-3"><h3>Harga</h3></li>
                <li class="col-md-3"><h3>Stok</h3></li>
                <li class="col-md-3"><h3>Aksi</h3></li>
              </ul>
            <div class="clear"></div>
          </div>
        
        @foreach ($data as $produk)
      
            <div class="form-group x" id="{{$produk->id_produk}}" style="padding:0%; margin:0; margin-top: 1%;">
              <ul class=" col-md-9">
                <li class="col-md-4">{{$produk->nama}}</li>
                <li class="col-md-4">{{$produk->harga}}</li>
                <li class="col-md-4">{{$produk->stok}}</li>
              </ul>
              <div class="snipcart-details col-md-3">
                <form action="#" method="post">
                  <input type="hidden" name="cmd" value="_cart">
                  <input type="hidden" name="add" value="1">
                  <input type="hidden" name="w3l_item" value="Striped Top">
                  <input type="hidden" name="amount" value="{{$produk->harga}}">
                  <input type="hidden" name="item_name" value="{{$produk->nama}}" />
                  <button type="submit" class="btn btn-warning" data-id="{{$produk->id_produk}}">Masukkan Ke Keranjang</button>
                </form>
              </div>
            <div class="clear"></div>
          </div>

          @endforeach
        </div>
      </div>		
  <!-- /.content -->
  <div style="float:right;">
    {{$data->links()}}
  </div>

</div>
<div class="fixed-bottom" style="position:fixed; bottom:0; padding-left: 3%; padding-bottom: 2%; width: 15%;">
    <div class="wthreecartaits wthreecartaits2 cart cart box_1">
      <form action="#" method="post" class="last">
        <input type="hidden" name="cmd" value="_cart" />
        <input type="hidden" name="display" value="1" />
        <button type="submit" name="submit" class="btn btn-primary w3view-cart" value="" style="width:100%;">
          <i class="fa fa-shopping-cart" style="font-size: 10rem;"></i><span class="label label-danger"
            id="pembayaran"></span>
        </button>
      </form>
    </div>
  </div>
<!-- /.content-wrapper -->


<script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>


<script type="text/javascript">
  $.ajaxSetup({ headers: { 'csrftoken': '{{ csrf_token() }}' } });
  

</script>

{{-- shopping-cart --}}
<script src="{{asset('shopping-cart/js/jquery-2.2.3.js')}}"></script>
<!-- Custom-JavaScript-File-Links -->

<!-- cart-js -->
<script src="{{asset('shopping-cart/js/minicart.min.js')}}"></script>
<script>
  // Mini Cart
  $(document).ready(function(){ 
      paypal1.minicart1.reset();
    });
  paypal1.minicart1.render({ //use only unique class names other than paypal1.minicart1.Also Replace same class name in css and minicart.min.js
    action: '#'
  });
  
</script>
<script type="text/javascript">
  $('#search').on('keyup', function () {
    $(".x").show();
    $value = $(this).val();
    $.ajax({
     
      type: 'get',
      url: '{{ route('search') }}',
      data: { 'search': $value },
      success: function (data) {   
        $(".x").hide();
        for (i=0;i<=data.length-1;i++){
          $("#"+data[i]).show();
        }
      }
    })
  })

</script>
@endsection