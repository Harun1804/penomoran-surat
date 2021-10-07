<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Single Input</div>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="store" method="post">
                    @csrf
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tglMemo">Tanggal Memo</label>
                                <input type="date" class="form-control @error('tglMemo') is-invalid @enderror" id="tglMemo" placeholder="Masukan Tanggal Memo" wire:model="tglMemo" value="{{ old('tglMemo') }}">
                                @error('tglMemo')
                                    <small id="tglMemo" class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tujuan">Tujuan Surat</label>
                                <input type="text" class="form-control @error('tujuan') is-invalid @enderror" id="tujuan" placeholder="Tujuan" wire:model="tujuan">
                                @error('tujuan')
                                    <small id="tujuan" class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jMemo">Jenis Memo</label>
                                <input type="text" class="form-control @error('jMemo') is-invalid @enderror" id="jMemo" placeholder="Jenis Memo" wire:model="jMemo">
                                @error('jMemo')
                                    <small id="jMemo" class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" wire:model="keterangan" rows="5" placeholder="Masukan Keterangan">{{ old('keterangan') }}</textarea>
                                @error('keterangan')
                                    <small id="keterangan" class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>