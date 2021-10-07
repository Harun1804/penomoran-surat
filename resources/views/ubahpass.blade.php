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
                <div class="card-title">Ubah Password</div>
            </div>
            <div class="card-body">
                <form action="{{ route('user.update') }}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukan Password" name="password">
                                @error('password')
                                    <small id="password" class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cpassword">Ulangi Password</label>
                                <input type="password" class="form-control @error('cpassword') is-invalid @enderror" id="cpassword" placeholder="Ulangi Password" name="cpassword">
                                @error('cpassword')
                                    <small id="cpassword" class="form-text text-muted text-danger">{{ $message }}</small>
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