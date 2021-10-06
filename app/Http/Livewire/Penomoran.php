<?php

namespace App\Http\Livewire;

use App\Models\Nomor;
use Livewire\Component;

class Penomoran extends Component
{
    public $kode,$tglSurat,$keterangan,$tujuan,$jSurat,$selectedID;
    public $form = false;
    public $editMode = false;

    public function render()
    {
        $surat = Nomor::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->get();
        return view('livewire.penomoran.index',compact('surat'));
    }

    public function resetInput()
    {
        $this->kode = Nomor::generateKode();
        $this->tglSurat = null;
        $this->keterangan = null;
        $this->tujuan = null;
        $this->jSurat = null;
    }

    public function mount()
    {
        $this->kode = Nomor::generateKode();
    }

    public function create()
    {
        $this->form = true;
    }

    public function store()
    {
        Nomor::create([
            'kode' => $this->kode,
            'no_urut' => Nomor::incrementNoUrut(),
            'tanggal_surat' => $this->tglSurat,
            'keterangan' => $this->keterangan,
            'tujuan' => $this->tujuan,
            'jenis_surat' => $this->jSurat,
            'user_id' => auth()->user()->id
        ]);

        $this->form = false;
        session()->flash('success','Nomor Urut Berhasil Digenerate');
        $this->resetInput();
    }

    public function edit($id)
    {
        $nomor = Nomor::findOrFail($id);
        $this->tglSurat = $nomor->tanggal_surat;
        $this->keterangan = $nomor->keterangan;
        $this->tujuan = $nomor->tujuan;
        $this->jSurat = $nomor->jenis_surat;
        $this->selectedID = $nomor->id;
        $this->form = true;
        $this->editMode = true;
    }

    public function update()
    {
        $nomor = Nomor::findOrFail($this->selectedID);
        $nomor->update([
            'tanggal_surat' => $this->tglSurat,
            'keterangan' => $this->keterangan,
            'tujuan' => $this->tujuan,
            'jenis_surat' => $this->jSurat,
        ]);

        $this->editMode = false;
        $this->form = false;
        session()->flash('success','Surat Berhasil Diubah');
        $this->resetInput();
    }
}
