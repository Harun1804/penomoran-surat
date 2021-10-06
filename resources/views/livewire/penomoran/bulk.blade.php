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
                    <div class="row">
                        @foreach ($bulkSurat as $key => $value)
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tglSurat">Tanggal Surat</label>
                                <input type="date" class="form-control @error('tglSurat') is-invalid @enderror" id="tglSurat" placeholder="Masukan Tanggal Surat" wire:model="tglSurat.{{ $key }}" value="{{ old('tglSurat') }}">
                                @error('tglSurat')
                                    <small id="tglSurat" class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tujuan">Tujuan Surat</label>
                                <input type="text" class="form-control @error('tujuan') is-invalid @enderror" id="tujuan" placeholder="Tujuan" wire:model="tujuan.{{ $key }}">
                                @error('tujuan')
                                    <small id="tujuan" class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jSurat">Jenis Surat</label>
                                <input type="text" class="form-control @error('jSurat') is-invalid @enderror" id="jSurat" placeholder="Jenis Surat" wire:model="jSurat.{{ $key }}">
                                @error('jSurat')
                                    <small id="jSurat" class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" wire:model="keterangan.{{ $key }}" placeholder="Masukan Keterangan">{{ old('keterangan') }}</textarea>
                                @error('keterangan')
                                    <small id="keterangan" class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-sm btn-danger" wire:click.prevent="removeField({{ $key }})">Remove Field</button>
                        </div>
                        @endforeach

                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>