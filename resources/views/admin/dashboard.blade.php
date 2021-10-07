@extends('layouts.main')

@section('content')
<div class="mt-2 mb-4">
    <h2 class="text-white pb-2">Welcome back, {{ auth()->user()->username }}</h2>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-dark bg-primary-gradient">
            <div class="card-body pb-0">
                <h2 class="mb-2">{{ $users }}</h2>
                <p>Users</p>
                <div class="pull-in sparkline-fix chart-as-background">
                    <div id="lineChart"><canvas width="327" height="70" style="display: inline-block; width: 327px; height: 70px; vertical-align: top;"></canvas></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card card-dark bg-secondary-gradient">
            <div class="card-body pb-0">
                <h2 class="mb-2">{{ $surat }}</h2>
                <p>Kode Surat Tergenerate</p>
                <div class="pull-in sparkline-fix chart-as-background">
                    <div id="lineChart2"><canvas width="327" height="70" style="display: inline-block; width: 327px; height: 70px; vertical-align: top;"></canvas></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-dark bg-info-gradient">
            <div class="card-body pb-0">
                <h2 class="mb-2">{{ $memo }}</h2>
                <p>Kode Memo Tergenerate</p>
                <div class="pull-in sparkline-fix chart-as-background">
                    <div id="lineChart2"><canvas width="327" height="70" style="display: inline-block; width: 327px; height: 70px; vertical-align: top;"></canvas></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection