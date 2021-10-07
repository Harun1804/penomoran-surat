@extends('layouts.main')

@section('content')
<div class="row">
    @if (session('success'))
        <div class="col-md-12">
            <div class="alert alert-success">{{ session('success') }}</div>
        </div>
    @endif
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Restart No Urut</div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.update.no.urut') }}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-check">
                                <label>Jenis</label><br>
                                <label class="form-radio-label">
                                    <input class="form-radio-input" type="radio" name="jenis" value="surat">
                                    <span class="form-radio-sign">Surat</span>
                                </label>
                                <label class="form-radio-label ml-3">
                                    <input class="form-radio-input" type="radio" name="jenis" value="memo">
                                    <span class="form-radio-sign">Memo</span>
                                </label>
                                @error('jenis')
                                    <small id="jenis" class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="no_urut">Restart No Urut Ke </label>
                                <input type="text" class="form-control @error('no_urut') is-invalid @enderror" id="no_urut" placeholder="Restart No Urut" name="no_urut">
                                @error('no_urut')
                                    <small id="no_urut" class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection