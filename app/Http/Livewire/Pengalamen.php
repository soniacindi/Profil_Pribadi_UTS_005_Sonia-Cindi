<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pengalamen as Pengalamens;

class Pengalamen extends Component
{
  use WithPagination;
  public $id_pengalamen;
  public $pengalamen_kerja;
  public $tahun_pengalamen;
  public $deskripsi_pengalamen;
  public $cari; 

  protected $paginationTheme = 'bootstrap';

  protected $messages = [
    'pengalamen.required' => 'pengalamen Harus diisi',
  ];

  public function resetInputFields(){
    $this->id_pengalamen = "";
    $this->pengalamen_kerja = "";
    $this->tahun_pengalamen = "";
    $this->deskripsi_pengalamen = "";
  }

  public function updated($fields){
    $this->validateOnly($fields,[
      'pengalamen_kerja' => 'required',
      'tahun_pengalamen' => 'required',
      'deskripsi_pengalamen' => 'required',
    ]);

  }

  public function tambah(){
    $this->resetInputFields();
  }

  public function store()
  {
    $validateData = $this->validate([
      'pengalamen_kerja' => 'required',
      'tahun_pengalamen' => 'required',
      'deskripsi_pengalamen' => 'required',
    ]);

  Pengalamens::create($validateData);
    $this->resetInputFields();
    $this->emit('pengalamenAdded');
  }

  public function edit($id_pengalamen){
    $pengalamen = Pengalamens::where('id_pengalamen',$id_pengalamen)->first();
    $this->id_pengalamen = $pengalamen->id_pengalamen;
    $this->pengalamen_kerja = $pengalamen->pengalamen_kerja;
    $this->tahun_pengalamen = $pengalamen->tahun_pengalamen;
    $this->deskripsi_pengalamen = $pengalamen->deskripsi_pengalamen;

  }
  public function update(){
    $this->validate([
      'pengalamen_kerja' => 'required',
      'tahun_pengalamen' => 'required',
      'deskripsi_pengalamen' => 'required',
    ]);
    if($this->id_pengalamen){
      $pengalamen = Pengalamens::find($this->id_pengalamen);
      $pengalamen->update([
        'pengalamen_kerja' => $this->pengalamen_kerja,
        'tahun_pengalamen' => $this->tahun_pengalamen,
        'deskripsi_pengalamen' => $this->deskripsi_pengalamen,
      ]);
      $this->emit('pengalamenUpdated');
    }
  }

  public function hapus($id_pengalamen){
    $pengalamen = Pengalamens::where('id_pengalamen',$id_pengalamen)->first();
    $this->id_pengalamen = $pengalamen->id_pengalamen; 
    $this->pengalamen_kerja = $pengalamen->pengalamen_kerja; 
    $this->tahun_pengalamen = $pengalamen->tahun_pengalamen; 
    $this->deskripsi_pengalamen = $pengalamen->deskripsi_pengalamen;
  }

  public function delete(){
    if($this->id_pengalamen){
      $pengalamen = Pengalamens::find($this->id_pengalamen);
      $pengalamen->delete();
      $this->emit('pengalamenDeleted');
    }
  }


  public function render()
  {
    $cari = '%'.$this->cari.'%';
    $pengalamens = Pengalamens::
    where('pengalamen_kerja','Like',$cari)
    ->orWhere('tahun_pengalamen','Like',$cari)
    ->orWhere('deskripsi_pengalamen','Like',$cari)->latest('pengalamens.created_at')->paginate(5);
    return view('admin.pengalamen',['pengalamens'=>$pengalamens])->layout('layouts.admin');
  }
}
