<div class="row">
    @if ($form)
    <div class="col-md-12">
        @if ($editMode)
        @include('livewire.memo.edit')
        @else
        @if ($bulkInsert)
        @include('livewire.memo.bulk')
        @else
        @include('livewire.memo.create')
        @endif
        @endif
    </div>
    @endif
    @if (session('success'))
    <div class="col-md-12">
        <div class="alert alert-success">{{ session('success') }}</div>
    </div>
    @endif
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Penomoran Memo
                    <div class="float-right">
                        <button class="btn btn-sm btn-info" wire:click="toExportImport">Export/Import</button>
                        <button class="btn btn-sm btn-primary" wire:click="create">Single Input</button>
                        <button class="btn btn-sm btn-warning" wire:click="bulkCreate">Bulk Input</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-head-bg-info table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Action</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Tanggal Memo</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Tujuan</th>
                                <th scope="col">Jenis Memo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($surat as $s)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <button class="btn btn-warning" wire:click="edit({{ $s->id }})">Edit</button>
                                </td>
                                <td>{{ $s->kode }}</td>
                                <td>{{ $s->tanggal_memo }}</td>
                                <td>{{ $s->keterangan }}</td>
                                <td>{{ $s->tujuan }}</td>
                                <td>{{ $s->jenis_memo }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td class="null-data" colspan="7">Belum Ada Data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
