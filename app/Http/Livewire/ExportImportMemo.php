<?php

namespace App\Http\Livewire;

use App\Models\Memo;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Exports\KodeMemoExport;
use App\Imports\KodeMemoImport;
use Maatwebsite\Excel\Facades\Excel;

class ExportImportMemo extends Component
{
    use WithFileUploads;

    public $form = false;
    public $export = false;
    public $import;

    public function render()
    {
        $surat = Memo::where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
        return view('livewire.memo.export-import',compact('surat'));
    }

    public function exportForm()
    {
        $this->form = true;
        $this->export = true;
    }

    public function exportXLSX()
    {
        session()->flash('success','Data Berhasil Diexport');
        return Excel::download(new KodeMemoExport,'kodeMemo.xlsx');
    }

    public function exportCSV()
    {
        session()->flash('success','Data Berhasil Diexport');
        return Excel::download(new KodeMemoExport,'kodeMemo.csv');
    }

    public function importForm()
    {
        $this->form = true;
        $this->export = false;
    }

    public function import()
    {
        Excel::import(new KodeMemoImport, $this->import);
        session()->flash('success','Data Berhasil Diimport');
        $this->import = null;
        $this->form = false;
    }
}
