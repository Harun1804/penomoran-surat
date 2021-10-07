<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Bulk Input
                    <div class="float-right">
                        <button class="btn btn-sm btn-info" wire:click.prevent="addField">Add Field</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="store" method="post">
                    @csrf
                    <div class="table-responsive">
                        <table class="table">
                            @foreach ($bulkSurat as $key => $value)
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="tglSurat">Tanggal Surat</label>
                                        <input type="date" class="form-control @error('tglSurat') is-invalid @enderror" id="tglSurat" placeholder="Masukan Tanggal Surat" wire:model="tglSurat.{{ $key }}" value="{{ old('tglSurat') }}">
                                        @error('tglSurat')
                                            <small id="tglSurat" class="form-text text-muted text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group">
                                        <label for="tujuan">Tujuan Surat</label>
                                        <input type="text" class="form-control @error('tujuan') is-invalid @enderror" id="tujuan" placeholder="Tujuan" wire:model="tujuan.{{ $key }}">
                                        @error('tujuan')
                                            <small id="tujuan" class="form-text text-muted text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group">
                                        <label for="jSurat">Jenis Surat</label>
                                        <input type="text" class="form-control @error('jSurat') is-invalid @enderror" id="jSurat" placeholder="Jenis Surat" wire:model="jSurat.{{ $key }}">
                                        @error('jSurat')
                                            <small id="jSurat" class="form-text text-muted text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" wire:model="keterangan.{{ $key }}" placeholder="Masukan Keterangan">{{ old('keterangan') }}</textarea>
                                        @error('keterangan')
                                            <small id="keterangan" class="form-text text-muted text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </td>

                                <td>
                                    <button class="btn btn-sm btn-danger" wire:click.prevent="removeField({{ $key }})">Remove Field</button>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>