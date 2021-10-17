<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Biodata as Biodatas;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
class Biodata extends Component
{
  use WithPagination;
  use WithFileUploads;
  public $id_biodata;
  public $nama;
  public $tanggal_lahir;
  public $no_telepon;
  public $email;
  public $website;
  public $alamat;
  public $foto;
  public $foto_saat_ini;
  public $cari; 

  protected $paginationTheme = 'bootstrap';

  protected $messages = [
    'biodata.required' => 'biodata Harus diisi',
  ];

  public function resetInputFields(){
    $this->id_biodata = "";
    $this->nama = "";
    $this->tanggal_lahir = "";
    $this->no_telepon = "";
    $this->email = "";
    $this->website = "";
    $this->alamat = "";
    $this->foto = "";
    $this->foto_saat_ini = "";
  }

  public function updated($fields){
    $this->validateOnly($fields,[
      'nama' => 'required',
      'tanggal_lahir' => 'required',
      'no_telepon' => 'required',
      'email' => 'required',
      'website' => 'required',
      'alamat' => 'required',
    ]);

  }

  public function tambah(){
    $this->resetInputFields();
  }

  public function store()
  {
    $validateData = $this->validate([
      'nama' => 'required',
      'tanggal_lahir' => 'required',
      'no_telepon' => 'required',
      'email' => 'required',
      'website' => 'required',
      'alamat' => 'required',
      'foto' => 'required',
    ]);
    $namaFile="";
    if($this->foto){
      $extFile=$this->foto->getClientOriginalExtension();
      $namaFile=time().Str::random(8).".".$extFile;
      $path=$this->foto->storeAs('image/foto_biodata',$namaFile);
    }
    $validateData['foto']= $namaFile;
    Biodatas::create($validateData);
    $this->resetInputFields();
    $this->emit('biodataAdded');
  }

  public function edit($id_biodata){
    $biodata = Biodatas::where('id_biodata',$id_biodata)->first();
    $this->id_biodata = $biodata->id_biodata;
    $this->nama = $biodata->nama;
    $this->tanggal_lahir = $biodata->tanggal_lahir;
    $this->no_telepon = $biodata->no_telepon;
    $this->email = $biodata->email;
    $this->website = $biodata->website;
    $this->alamat = $biodata->alamat;
    $this->foto_saat_ini = $biodata->foto;

  }


  public function update(){
    $this->validate([
      'nama' => 'required',
      'tanggal_lahir' => 'required',
      'no_telepon' => 'required',
      'email' => 'required',
      'website' => 'required',
      'alamat' => 'required',
    ]);
    $biodata = Biodatas::where('id_biodata',$this->id_biodata)->first();
    $namaFile="";
    if($this->foto){
      if($biodata){
        File::delete('image/foto_biodata/'.$biodata->foto);
      }
      $extFile=$this->foto->getClientOriginalExtension();
      $namaFile=time().Str::random(8).".".$extFile;
      $path=$this->foto->storeAs('image/foto_biodata',$namaFile);
    }
    else{
      $namaFile=$biodata->foto;
    }
    if($this->id_biodata){
      $biodata = Biodatas::find($this->id_biodata);
      $biodata->update([
        'nama' => $this->nama,
        'tanggal_lahir' => $this->tanggal_lahir,
        'no_telepon' => $this->no_telepon,
        'email' => $this->email,
        'website' => $this->website,
        'alamat' => $this->alamat,
        'foto' => $namaFile,
      ]);
      $this->emit('biodataUpdated');
    }
  }

  public function hapus($id_biodata){
    $biodata = Biodatas::where('id_biodata',$id_biodata)->first();
    $this->id_biodata = $biodata->id_biodata; 
    $this->nama = $biodata->nama; 
    $this->tanggal_lahir = $biodata->tanggal_lahir; 
    $this->no_telepon = $biodata->no_telepon; 
    $this->email = $biodata->email; 
    $this->website = $biodata->website; 
    $this->alamat = $biodata->alamat; 
    $this->foto = $biodata->foto;
    $this->foto_saat_ini = $biodata->foto;
  }

  public function delete(){
    if($this->id_biodata){
      $biodata = Biodatas::find($this->id_biodata);
      File::delete('image/foto_biodata/'.$biodata->foto);
      $biodata->delete();
      $this->emit('biodataDeleted');
    }
  }


  public function render()
  {
    $cari = '%'.$this->cari.'%';
    $biodatas = Biodatas::
    where('nama','Like',$cari)
    ->orWhere('tanggal_lahir','Like',$cari)
    ->orWhere('no_telepon','Like',$cari)
    ->orWhere('email','Like',$cari)
    ->orWhere('website','Like',$cari)
    ->orWhere('alamat','Like',$cari)
    ->orWhere('foto','Like',$cari)->latest('biodatas.created_at')->paginate(5);
    return view('admin.biodata',['biodatas'=>$biodatas])->layout('layouts.admin');
  }
}
