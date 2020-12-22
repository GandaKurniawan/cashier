@extends('templates.master-admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Stok Barang
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <button type="button" class="btn btn-success" data-toggle="modal"
              data-target="#exampleModal">Tambah</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title" id="exampleModalLabel">Tambah Produk</h3>
                  </div>
                  <div class="modal-body">
                    <form action="{{route('produk_admin.store')}}" method="post">
                      {{csrf_field()}}
                      <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" id="lahan" name="kategori">
                          <option>-- Pilih Kategori --</option>
                          <option value="1">Pupuk</option>
                          <option value="2">Obat</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="nama">Nama nama</label>
                        <input name="nama" type="text" class="form-control" id="nama">
                      </div>
                      <div class="form-group">
                        <label for="stok">Stok</label>
                        <input name="stok" type="text" class="form-control" id="stok">
                      </div>
                      <div class="form-group">
                        <label for="harga">Harga</label>
                        <input name="harga" type="text" class="form-control" id="harga">
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <form method="get">
                <select class="form-control" class="form-kategori" id="combo">
                    <option value="">--Pilih Kategori--</option>
                    <option value="pupuk">pupuk</option>
                    <option value="obat">obat</option>
                </select>
              </form>
            </div>
            <div class="box-tools">
              <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>ID Produk</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Tanggal Pembelian</th>
                <th>aksi</th>
              </tr>
              @php
              $i=0;
              @endphp
              @foreach($data as $produk)
            <tr class="{{$produk->kategori}}">
                <td>{{$produk->id_produk}}</td>
                <td>{{$produk->nama}}</td>
                <td>{{$produk->kategori}}</td>
                <td>
                @if($produk->stok > 10)
                <span class="label label-success">{{$produk->stok}}</span>
                @else($produk->stok < 10)
                  <span class="label label-danger">{{$produk->stok}}</span>
                @endif
                </td>
                <td>{{$produk->harga}}</td>
                <td>{{$produk->tgl_pembelian}}</td>
                <td class="form-group">
                  <button type="button" class="btn btn-primary col-md-4" data-toggle="modal"
                    data-target="#exampleModal{{$i}}">Ubah</button>
                    <button type="button" class="btn btn-danger col-md-4" data-toggle="modal"
                    data-target="#exampleModalNew{{$i}}">Hapus</button>
                    <div class="modal fade" id="exampleModalNew{{$i}}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h3 class="modal-title" id="exampleModalLabel">Hapus Produk</h3>
                        </div>
                        <div class="modal-body">
                          <p> Apakah Anda Yakin   ?</p>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary col-md-2" data-dismiss="modal">Batal</button>
                          <form action="{{route('produk_admin.destroy' , $produk->id_produk)}}" method="post" class="d-inline col-md-1">
                        {{csrf_field()}}{{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger" onclick="Swal.fire('Data Berhasil Di Hapus', 'Mantap' , 'success')">Hapus</button>
                      </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <div class="modal fade" id="exampleModal{{$i}}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h3 class="modal-title" id="exampleModalLabel">Ubah Produk</h3>
                    </div>
                    <div class="modal-body">
                      <form action="{{route('produk_admin.update' , $produk->id_produk)}}" method="post">
                        {{csrf_field()}}{{method_field('PATCH')}}
                        <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" id="lahan" name="kategori">
                          <option>{{$produk->kategori}}</option>
                          <option value="1">Pupuk</option>
                          <option value="2">Obat</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="nama">Nama nama</label>
                        <input name="nama" type="text" class="form-control" id="nama" value="{{$produk->nama}}">
                      </div>
                      <div class="form-group">
                        <label for="stok">Stok</label>
                        <input name="stok" type="text" class="form-control" id="stok" value="{{$produk->stok}}">
                      </div>
                      <div class="form-group">
                        <label for="harga">Harga</label>
                        <input name="harga" type="text" class="form-control" id="harga" value="{{$produk->harga}}">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-primary" onclick="Swal.fire('Data Berhasil Di Ubah', 'Mantap' , 'success')">Ubah</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              @php
              $i++;
              @endphp
              @endforeach
            </table>
            {{$data->links()}}
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script><script>
  $(document).ready(function(){ 
    $('#combo').change(function(){ 
        var kategori = $('#combo :selected').text();
        var updateurl = "{{url('produk_admin')}}" + '/' + kategori;
        $('.form-kategori').attr('action', updateurl);
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
  
        $.ajax({
          type: "GET",
          dataType: 'json',
          url: updateurl,
          data: { '_token': $('input[name=_token]').val() },
          success: function (data) {
            if(data.kategori == 'pupuk'){
              $('.pupuk').show();
              $('.obat').hide();
            }else if(data.kategori == 'obat'){
              $('.pupuk').hide();
              $('.obat').show();
            }else{
              $('.pupuk').show();
              $('.obat').show();
            }
          }
        }).done(function (data) {
          console.log('suksess');
        });
    });
  });
  </script>
<!-- /.content-wrapper -->
@endsection