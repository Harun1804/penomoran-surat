<?php

namespace App\Http\Livewire;

use App\Models\Memo;
use Livewire\Component;

class PenomoranMemo extends Component
{
    public $kode,$tglMemo,$keterangan,$tujuan,$jMemo,$selectedID;
    public $form = false;
    public $editMode = false;
    public $bulkInsert = false;
    public $bulkMemo = [];

    public function mount()
    {
        $this->kode = Memo::generateKode();
        $this->bulkMemo = [
            ['tanggal_memo' => '','tujuan' => '','jenis_memo' => '','keterangan' => '']
        ];
    }

    public function render()
    {
        $surat = Memo::where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
        return view('livewire.memo.index',compact('surat'));
    }

    public function addField()
    {
        $this->bulkMemo[] = ['tanggal_memo' => '','tujuan' => '','jenis_memo' => '','keterangan' => ''];
    }

    public function removeField($index)
    {
        unset($this->bulkMemo[$index]);
        array_values($this->bulkMemo);
    }

    public function resetInput()
    {
        $this->tglMemo = null;
        $this->keterangan = null;
        $this->tujuan = null;
        $this->jMemo = null;
    }

    public function create()
    {
        $this->form = true;
        $this->editMode = false;
        $this->bulkInsert = false;
        $this->resetInput();
    }

    public function store()
    {
        if (is_array($this->tglMemo)) {
            foreach ($this->tglMemo as $key => $value) {
                Memo::create([
                    'kode' => Memo::generateKode(),
                    'no_urut' => Memo::incrementNoUrut(),
                    'tanggal_memo' => $this->tglMemo[$key],
                    'keterangan' => $this->keterangan[$key],
                    'tujuan' => $this->tujuan[$key],
                    'jenis_memo' => $this->jMemo[$key],
                    'user_id' => auth()->user()->id
                ]);
            }
        } else {
            Memo::create([
                'kode' => $this->kode,
                'no_urut' => Memo::incrementNoUrut(),
                'tanggal_memo' => $this->tglMemo,
                'keterangan' => $this->keterangan,
                'tujuan' => $this->tujuan,
                'jenis_memo' => $this->jMemo,
                'user_id' => auth()->user()->id
            ]);
        }

        $this->form = false;
        session()->flash('success','Nomor Urut Berhasil Digenerate');
        $this->resetInput();
    }

    public function edit($id)
    {
        $nomor = Memo::findOrFail($id);
        $this->tglMemo = $nomor->tanggal_memo;
        $this->keterangan = $nomor->keterangan;
        $this->tujuan = $nomor->tujuan;
        $this->jMemo = $nomor->jenis_memo;
        $this->selectedID = $nomor->id;
        $this->form = true;
        $this->editMode = true;
    }

    public function update()
    {
        $nomor = memo::findOrFail($this->selectedID);
        $nomor->update([
            'tanggal_memo' => $this->tglMemo,
            'keterangan' => $this->keterangan,
            'tujuan' => $this->tujuan,
            'jenis_memo' => $this->jMemo,
        ]);

        $this->editMode = false;
        $this->form = false;
        session()->flash('success','Surat Berhasil Diubah');
        $this->resetInput();
    }

    public function bulkCreate()
    {
        $this->form = true;
        $this->bulkInsert = true;
        $this->editMode = false;
        $this->resetInput();
    }

    public function toExportImport()
    {
        return redirect()->route('staff.exportimport.memo');
    }
}
