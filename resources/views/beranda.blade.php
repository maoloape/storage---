@extends('layout.layout')
@section('content')

    <style>
    .gradient-1 {
        background: linear-gradient(125deg, #7f62cf, #0a288c);
    }

    .gradient-2 {
        background: linear-gradient(125deg, #cf6262, #8c0a0a);
    }

    .gradient-3 {
        background: linear-gradient(125deg, #22b8cf, #0b7285);
    }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Barang Masuk</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $data_bm->where('good_in', 'in')->where('return_in', 'in')->count() }}</h2>
                            <p class="text-white mb-0">{{ now()->format('Y-m-d') }}</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Barang Keluar</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $data_bk->where('good_in', 'out')->count() }}</h2>
                            <p class="text-white mb-0">{{ now()->format('Y-m-d') }}</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Barang Return</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $data_br->where('return_in', 'out')->count() }}</h2>
                            <p class="text-white mb-0">{{ now()->format('Y-m-d') }}</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <div class="row md-3">
                            <h4 class="card-title">Barang Masuk</h4>
                        </div>
                        <hr>
                    </div>        
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Type</th>
                                    <th>No. Seri</th>
                                    <th>No. Produk</th>
                                    <th>No. Kontrak</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data_bm as $row)
                                <tr>
                                    <td>{{ $no++ }} </td>
                                    <td>{{ $row->nama_barang }}</td>
                                    <td>{{ $row->type }}</td>
                                    <td>{{ $row->serial_no }}</td>
                                    <td>{{ $row->no_produk }}</td>
                                    <td>{{ $row->no_kontrak }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection