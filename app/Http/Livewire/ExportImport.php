<?php

namespace App\Http\Livewire;

use App\Models\Nomor;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Exports\KodeSuratExport;
use App\Imports\KodeSuratImport;
use Maatwebsite\Excel\Facades\Excel;

class ExportImport extends Component
{
    use WithFileUploads;

    public $form = false;
    public $export = false;
    public $import;

    public function render()
    {
        $surat = Nomor::where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
        return view('livewire.penomoran.export-import',compact('surat'));
    }

    public function exportForm()
    {
        $this->form = true;
        $this->export = true;
    }

    public function exportXLSX()
    {
        session()->flash('success','Data Berhasil Diexport');
        return Excel::download(new KodeSuratExport,'kodeSurat.xlsx');
    }

    public function exportCSV()
    {
        session()->flash('success','Data Berhasil Diexport');
        return Excel::download(new KodeSuratExport,'kodeSurat.csv');
    }

    public function importForm()
    {
        $this->form = true;
        $this->export = false;
    }

    public function import()
    {
        Excel::import(new KodeSuratImport, $this->import);
        session()->flash('success','Data Berhasil Diimport');
        $this->import = null;
        $this->form = false;
    }
}
