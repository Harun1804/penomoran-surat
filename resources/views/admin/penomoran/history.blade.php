@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Riwayat Penomoran Surat Atau Memo
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
                                    <th scope="col">User</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($surat as $s)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $s->kode }}</td>
                                        <td>{{ $s->tanggal_surat }}</td>
                                        <td>{{ $s->keterangan }}</td>
                                        <td>{{ $s->tujuan }}</td>
                                        <td>{{ $s->jenis_surat }}</td>
                                        <td>{{ $s->user->username }}</td>
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
@endsection