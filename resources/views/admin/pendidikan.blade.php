<div>
    
@extends('admin.master')
@section('title', 'data pendidikan')
@section('menuPendidikan', 'active')
@section('content')
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data pendidikan</h3>
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
                    <th>Nama Kuliah</th>
                    <th>Nama SMA</th>
                    <th>Nama SMP</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no=1 ?>
                    @foreach($pendidikans as $pendidikan)
                    
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$pendidikan->nama_kuliah}}</td>
                    <td>{{$pendidikan->nama_sma}}</td>
                    <td>{{$pendidikan->nama_smp}}</td>
                    <td><button type="button" class="btn btn-block btn-primary btnEdit" wire:click.prevent="edit({{$pendidikan->id_pendidikan}})" data-toggle="modal" data-target="#modalEditPendidikan">Edit</button></td>
                    <td><button type="button" class="btn btn-block btn-danger btnHapus" wire:click.prevent="hapus({{$pendidikan->id_pendidikan}})" data-toggle="modal" data-target="#modalHapusPendidikan">Hapus</button></td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                {{$pendidikans->links()}}
                <button id="btnTambah" type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modalTambahPendidikan" wire:click.prevent="tambah()">Tambah</button>
                
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
    @section('tambahan')

<!-- ./wrapper -->
    <div wire:ignore.self  class="modal fade" id="modalTambahPendidikan">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="judulModal">Tambah pendidikan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="post">
                <input type="hidden" id="id_pendidikan" name="id_pendidikan">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Kuliah</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama_kuliah" class="form-control" placeholder="Nama Kuliah" wire:model="nama_kuliah" >
                      @error('nama_kuliah') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tahun Kuliah</label>
                    <div class="col-sm-10">
                      <input type="text" name="deskripsi_kuliah" class="form-control" placeholder="Tahun Kuliah" wire:model="deskripsi_kuliah" >
                      @error('deskripsi_kuliah') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama SMA</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama_sma" class="form-control" placeholder="Nama SMA" wire:model="nama_sma" >
                      @error('nama_sma') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tahun SMA</label>
                    <div class="col-sm-10">
                      <input type="text" name="tahun_sma" class="form-control" placeholder="Tahun SMA" wire:model="tahun_sma" >
                      @error('tahun_sma') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Desksripsi SMA</label>
                    <div class="col-sm-10">
                      <input type="text" name="deskripsi_sma" class="form-control" placeholder="Desksripsi SMA" wire:model="deskripsi_sma" >
                      @error('deskripsi_sma') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama SMP</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama_smp" class="form-control" placeholder="Nama SMP" wire:model="nama_smp" >
                      @error('nama_smp') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tahun SMP</label>
                    <div class="col-sm-10">
                      <input type="text" name="tahun_smp" class="form-control" placeholder="Tahun SMP" wire:model="tahun_smp" >
                      @error('tahun_smp') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Deskripsi SMP</label>
                    <div class="col-sm-10">
                      <input type="text" name="deskripsi_smp" class="form-control" placeholder="Deskripsi SMP" wire:model="deskripsi_smp" >
                      @error('deskripsi_smp') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" id="btnSimpan" style="margin-right: 0%;width:20%" wire:click.prevent="store()">Simpan</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div wire:ignore.self class="modal fade" id="modalEditPendidikan">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="judulModal">Edit pendidikan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="post">
                <input type="hidden" id="id_pendidikan" name="id_pendidikan" wire:model="id_pendidikan">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Kuliah</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama_kuliah" class="form-control" placeholder="Nama Kuliah" wire:model="nama_kuliah">
                      @error('nama_kuliah') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tahun Kuliah</label>
                    <div class="col-sm-10">
                      <input type="text" name="tahun_kuliah" class="form-control" placeholder="Tahun Kuliah" wire:model="tahun_kuliah">
                      @error('tahun_kuliah') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Deskripsi Kuliah</label>
                    <div class="col-sm-10">
                      <input type="text" name="deskripsi_kuliah" class="form-control" placeholder="Deskripsi Kuliah" wire:model="deskripsi_kuliah">
                      @error('deskripsi_kuliah') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama SMA</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama_sma" class="form-control" placeholder="Nama SMA" wire:model="nama_sma">
                      @error('nama_sma') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tahun SMA</label>
                    <div class="col-sm-10">
                      <input type="text" name="tahun_sma" class="form-control" placeholder="Tahun SMA" wire:model="tahun_sma">
                      @error('tahun_sma') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Deskripsi SMA</label>
                    <div class="col-sm-10">
                      <input type="text" name="deskripsi_sma" class="form-control" placeholder="Deskripsi SMA" wire:model="deskripsi_sma">
                      @error('deskripsi_sma') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama SMP</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama_smp" class="form-control" placeholder="Nama SMP" wire:model="nama_smp">
                      @error('nama_smp') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tahun SMP</label>
                    <div class="col-sm-10">
                      <input type="text" name="tahun_smp" class="form-control" placeholder="Tahun SMP" wire:model="tahun_smp">
                      @error('tahun_smp') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Deskripsi SMP</label>
                    <div class="col-sm-10">
                      <input type="text" name="deskripsi_smp" class="form-control" placeholder="Deskripsi SMP" wire:model="deskripsi_smp" >
                      @error('deskripsi_smp') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror                    
                    </div>
                  </div>
                </div>
              </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" id="btnSimpan" style="margin-right: 0%;width:20%" wire:click.prevent="update()">Edit</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div wire:ignore.self class="modal fade" id="modalHapusPendidikan">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="judulModal">Apakah Anda yakin untuk menghapus data ini?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="post">
                <input type="hidden" name="id_pendidikan" wire:model="id_pendidikan">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama pendidikan</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama_pendidikan" class="form-control" wire:model="nama_pendidikan" placeholder="Nama Ekstrakurikuler" readonly="">
                    </div>
                  </div>
                  <!-- <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Pembimbing</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama_pembimbing" class="form-control" wire:model="nama_pembimbing" placeholder="Nama Pembimbing" readonly="">
                    </div>
                  </div> -->
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
    });
    $('.pnama_pembimbing').on('change', function (e) {
                let data = $(this).val();
                 @this.set('nama_pembimbing', data);
            });
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