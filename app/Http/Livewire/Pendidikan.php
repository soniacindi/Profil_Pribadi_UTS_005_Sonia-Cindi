<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pendidikan as Pendidikans;

class Pendidikan extends Component
{
  use WithPagination;
  public $id_pendidikan;
  public $nama_kuliah;
  public $tahun_kuliah;
  public $deskripsi_kuliah;
  public $nama_sma;
  public $tahun_sma;
  public $deskripsi_sma;
  public $nama_smp;
  public $tahun_smp;
  public $deskripsi_smp;
  public $cari; 

  protected $paginationTheme = 'bootstrap';

  protected $messages = [
    'pendidikan.required' => 'pendidikan Harus diisi',
  ];

  public function resetInputFields(){
    $this->id_pendidikan = "";
    $this->nama_kuliah = "";
    $this->tahun_kuliah = "";
    $this->deskripsi_kuliah = "";
    $this->nama_sma = "";
    $this->tahun_sma = "";
    $this->deskripsi_sma = "";
    $this->nama_smp = "";
    $this->tahun_smp = "";
    $this->deskripsi_smp = "";
  }

  public function updated($fields){
    $this->validateOnly($fields,[
      'nama_kuliah' => 'required',
      'tahun_kuliah' => 'required',
      'deskripsi_kuliah' => 'required',
      'nama_sma' => 'required',
      'tahun_sma' => 'required',
      'deskripsi_sma' => 'required',
      'nama_smp' => 'required',
      'tahun_smp' => 'required',
      'deskripsi_smp' => 'required',
    ]);
  }

  public function tambah(){
    $this->resetInputFields();
  }

  public function store()
  {
    $validateData = $this->validate([
      'nama_kuliah' => 'required',
      'tahun_kuliah' => 'required',
      'deskripsi_kuliah' => 'required',
      'nama_sma' => 'required',
      'tahun_sma' => 'required',
      'deskripsi_sma' => 'required',
      'nama_smp' => 'required',
      'tahun_smp' => 'required',
      'deskripsi_smp' => 'required',
    ]);

    Pendidikans::create($validateData);
    $this->resetInputFields();
    $this->emit('pendidikanAdded');
  }

  public function edit($id_pendidikan){
    $pendidikan = Pendidikans::where('id_pendidikan',$id_pendidikan)->first();
    $this->id_pendidikan = $pendidikan->id_pendidikan;
    $this->nama_kuliah = $pendidikan->nama_kuliah;
    $this->tahun_kuliah = $pendidikan->tahun_kuliah;
    $this->deskripsi_kuliah = $pendidikan->deskripsi_kuliah;
    $this->nama_sma = $pendidikan->nama_sma;
    $this->tahun_sma = $pendidikan->tahun_sma;
    $this->deskripsi_sma = $pendidikan->deskripsi_sma;
    $this->nama_smp = $pendidikan->nama_smp;
    $this->tahun_smp = $pendidikan->tahun_smp;
    $this->deskripsi_smp = $pendidikan->deskripsi_smp;
  }


  public function update(){
    $this->validate([
      'nama_kuliah' => 'required',
      'tahun_kuliah' => 'required',
      'deskripsi_kuliah' => 'required',
      'nama_sma' => 'required',
      'tahun_sma' => 'required',
      'deskripsi_sma' => 'required',
      'nama_smp' => 'required',
      'tahun_smp' => 'required',
      'deskripsi_smp' => 'required',
    ]);
    if($this->id_pendidikan){
      $pendidikan = pendidikans::find($this->id_pendidikan);
      $pendidikan->update([
        'nama_kuliah' => $this->nama,
        'tahun_kuliah' => $this->tanggal_lahir,
        'deskripsi_kuliah' => $this->no_telepon,
        'nama_sma' => $this->email,
        'tahun_sma' => $this->website,
        'deskripsi_sma' => $this->alamat,
        'nama_smp' => $namaFile,
        'tahun_smp' => $this->alamat,
        'deskripsi_smp' => $namaFile,
      ]);
      $this->emit('pendidikanUpdated');
    }
  }

  public function hapus($id_pendidikan){
    $pendidikan = Pendidikans::where('id_pendidikan',$id_pendidikan)->first();
    $this->id_pendidikan = $pendidikan->id_pendidikan; 
    $this->nama_kuliah = $pendidikan->nama_kuliah; 
    $this->tahun_kuliah = $pendidikan->tahun_kuliah; 
    $this->deskripsi_kuliah = $pendidikan->deskripsi_kuliah; 
    $this->nama_sma = $pendidikan->nama_sma; 
    $this->tahun_sma = $pendidikan->tahun_sma; 
    $this->deskripsi_sma = $pendidikan->deskripsi_sma; 
    $this->nama_smp = $pendidikan->nama_smp;
    $this->tahun_smp = $pendidikan->tahun_smp;
    $this->deskripsi_smp = $pendidikan->deskripsi_smp;
  }

  public function delete(){
    if($this->id_pendidikan){
      $pendidikan = pendidikans::find($this->id_pendidikan);
      $pendidikan->delete();
      $this->emit('pendidikanDeleted');
    }
  }


  public function render()
  {
    $cari = '%'.$this->cari.'%';
    $pendidikans = pendidikans::
    where('nama_kuliah','Like',$cari)
    ->orWhere('tahun_kuliah','Like',$cari)
    ->orWhere('deskripsi_kuliah','Like',$cari)
    ->orWhere('nama_sma','Like',$cari)
    ->orWhere('tahun_sma','Like',$cari)
    ->orWhere('deskripsi_sma','Like',$cari)
    ->orWhere('nama_smp','Like',$cari)
    ->orWhere('tahun_smp','Like',$cari)
    ->orWhere('deskripsi_smp','Like',$cari)->latest('pendidikans.created_at')->paginate(5);
    return view('admin.pendidikan',['pendidikans'=>$pendidikans])->layout('layouts.admin');
  }
}
