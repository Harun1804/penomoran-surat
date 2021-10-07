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
                <div class="card-title">Ubah Background Login</div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.update.Bg.Login') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="image">Background Login Baru</label>
                                <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" placeholder="Masukan Background Baru" name="image">
                                @error('image')
                                    <small id="image" class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit">Ubah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection