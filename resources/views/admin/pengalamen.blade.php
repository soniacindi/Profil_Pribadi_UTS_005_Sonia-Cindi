<div>
    
@extends('admin.master')
@section('title', 'data pengalamen')
@section('menuPengalamen', 'active')
@section('content')
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pengalaman</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group row"style=" float: right;margin-bottom: 10px;width:40%; min-width: 300px;">
                  <label class="col-sm-3 col-md-2 col-form-label">Cari : </label>
                  <div class="col-sm-9 col-md-10">
                    <input type="text"  class="form-control" placeholder="Cari.." wire:model.debounce.200ms="cari" >
                  </div>
                </div>
                <table id="tabelData" class="table table-bordered table-hover" style="margin-bottom: 15px;">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Pengalaman Kerja</th>
                    <th>Tahun Pengalaman</th>
                    <th>Deskripsi Pengalaman</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no=1 ?>
                    @foreach($pengalamens as $pengalamen)
                    
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$pengalamen->pengalamen_kerja}}</td>
                    <td>{{$pengalamen->tahun_pengalamen}}</td>
                    <td>{{$pengalamen->deskripsi_pengalamen}}</td>
                    <td><button type="button" class="btn btn-block btn-primary btnEdit" wire:click.prevent="edit({{$pengalamen->id_pengalamen}})" data-toggle="modal" data-target="#modalEditPengalamen">Edit</button></td>
                    <td><button type="button" class="btn btn-block btn-danger btnHapus" wire:click.prevent="hapus({{$pengalamen->id_pengalamen}})" data-toggle="modal" data-target="#modalHapusPengalamen">Hapus</button></td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                {{$pengalamens->links()}}
                <button id="btnTambah" type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modalTambahPengalamen" wire:click.prevent="tambah()">Tambah</button>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @endsection
    <!-- validasi -->
    @section('tambahan')

<!-- ./wrapper -->
<div wire:ignore.self class="modal fade" id="modalTambahPengalamen">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="judulModal">Tambah Pengalamen</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form  class="form-horizontal" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_pengalamen" wire:model="id_pengalamen">
                <div class="card-body">


                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pengalaman Kerja</label>
                    <div class="col-sm-10">
                      <input type="text" name="pengalamen_kerja" class="form-control" placeholder="Pengalaman Kerja" wire:model="pengalamen_kerja" >
                      @error('pengalamen_kerja') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tahun Pengalaman</label>
                    <div class="col-sm-10">
                      <input type="text" name="tahun_pengalamen" class="form-control" placeholder="Tahun Pengalaman" wire:model="tahun_pengalamen" >
                      @error('tahun_pengalamen') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Deskripsi Pengalaman</label>
                    <div class="col-sm-10">
                      <input type="text" name="deskripsi_pengalamen" class="form-control" placeholder="Deskripsi Pengalaman" wire:model="deskripsi_pengalamen">
                      @error('deskripsi_pengalamen') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                </div>
              </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" id="btnSimpan" wire:click.prevent="store() style="margin-right: 0%;width:20%">Simpan</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <div wire:ignore.self class="modal fade" id="modalEditPengalamen">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="judulModal">Edit Pengalaman</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form wire:submit.prevent="update" class="form-horizontal" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_pengalamen" wire:model="id_pengalamen">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pengalaman Kerja</label>
                    <div class="col-sm-10">
                      <input type="text" name="pengalamen_kerja" class="form-control" placeholder="Pengalaman Kerja" wire:model="pengalamen_kerja" >
                      @error('pengalamen_kerja') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Deskripsi Pengalaman</label>
                    <div class="col-sm-10">
                      <input type="text" name="deskripsi_pengalamen" class="form-control" placeholder="Deskripsi Pengalaman" wire:model="deskripsi_pengalamen" >
                      @error('deskripsi_pengalamen') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" style="margin-right: 0%;width:20%">Edit</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <div wire:ignore.self class="modal fade" id="modalHapusPengalamen">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="judulModal">Apakah Anda yakin untuk menghapus data ini?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <input type="hidden" id="hid_pengalamen" name="id_pengalamen" wire:model="id_pengalamen">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pengalaman Kerja</label>
                    <div class="col-sm-10">
                      <input type="text" name="pengalamen_kerja" class="form-control" placeholder="Pengalaman Kerja" wire:model="pengalamen_kerja" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tahun Pengalaman</label>
                    <div class="col-sm-10">
                      <input type="text" name="tahun_pengalamen" class="form-control" placeholder="Tahun Pengalaman" wire:model="tahun_pengalamen" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Deskripsi Pengalaman</label>
                    <div class="col-sm-10">
                      <input type="text" name="deskripsi_pengalamen" class="form-control" placeholder="Deskripsi Pengalaman" wire:model="deskripsi_pengalamen" readonly="">
                    </div>
                  </div>  
                </div>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" id="hbtnHapus" style="margin-right: 0%;width:20%" wire:click.prevent="delete()">Hapus</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@push('scripts')
<script>
  $(function () {
    //Initialize Select2 Elements
    Livewire.hook('message.processed', (message, component) => {
      $('.select2bs4').select2({
      
        theme: 'bootstrap4',
        placeholder: "---Pilih---",
      });
    // $('.pnama').on('change', function (e) {
    //             let data = $(this).val();
    //              @this.set('id_nama', data);
    //         });
    // $('.ptanggal_lahir').on('change', function (e) {
    //             let data = $(this).val();
    //              @this.set('tanggal_lahir', data);
    //         });
    //Date picker
    $('#reservationdate').datetimepicker({
        locale: 'id',
        format: 'DD MMMM YYYY'
    });

    bsCustomFileInput.init();
    $('.select2bs4').select2({
      
      theme: 'bootstrap4',
      placeholder: "---Pilih---",
    });

  });

</script>
@endpush
      @endsection