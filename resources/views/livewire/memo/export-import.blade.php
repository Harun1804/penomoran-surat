<div class="row">
    @if (session('success'))
    <div class="col-md-12">
        <div class="alert alert-success">{{ session('success') }}</div>
    </div>
    @endif
    @if ($form)
        <div class="col-md-12">
            @if ($export)
                <div class="card">
                    <div class="card-action">
                        <button class="btn btn-sm btn-primary" type="button" wire:click="exportXLSX">Export XLSX</button>
                        <button class="btn btn-sm btn-secondary" type="button" wire:click="exportCSV">Export CSV</button>
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Import Penomoran Memo
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" wire:submit.prevent="import">
                            @csrf
                            <div class="form-group">
                                <label for="import">Import XLSX / CSV</label>
                                <input type="file" class="form-control" id="import" wire:model="import" accept=".xlsx,.csv,.xls">
                            </div>
                            <button class="btn btn-sm btn-primary" type="submit">Import</button>
                        </form>
                    </div>
                    <div class="card-action">
                        <a class="btn btn-sm btn-info" download href="{{ asset('file/contohmemoXLSX.xlsx') }}">Download Contoh Template Import XLSX</a>
                        <a class="btn btn-sm btn-secondary" download href="{{ asset('file/contohmemoCSV.csv') }}">Download Contoh Template Import CSV</a>
                    </div>
                </div>
            @endif
        </div>
    @endif
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Export / Import Penomoran Memo
                    <div class="float-right">
                        <button class="btn btn-sm btn-success" wire:click="importForm">Import</button>
                        <button class="btn btn-sm btn-info" wire:click="exportForm">Export</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-head-bg-info table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Tanggal Surat</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Tujuan</th>
                                <th scope="col">Jenis Surat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($surat as $s)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $s->kode }}</td>
                                <td>{{ $s->tanggal_memo }}</td>
                                <td>{{ $s->keterangan }}</td>
                                <td>{{ $s->tujuan }}</td>
                                <td>{{ $s->jenis_memo }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td class="null-data" colspan="6">Belum Ada Data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
