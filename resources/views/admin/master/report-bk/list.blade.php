@extends('layout.layout')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <h4 class="card-title">Report Barang Keluar</h4>
                            @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $item)
                                                <li>{{ $item }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            <hr>
                            <form method="post" action="/rbk/bkexport">
                                @csrf
                                <div class="row pb-3">
                                    <div class="col-md-3">
                                        <label for="">Start Date</label>
                                        <input type="date" name="start_date" class="form-control" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">End Date :</label>
                                        <input type="date" name="end_date" class="form-control" required>
                                    </div>
                                    <div class="col-md-1 pt-4">
                                        <button type="submit" class="btn btn-success" name="export_type" value="EXCEL"> Export Excel </button>
                                    </div>
                                    <div class="col-md-1 pt-4">
                                        <button type="submit" class="btn btn-danger" name="export_type" value="PDF"> Export PDF</button>
                                    </div>
                                </div>
                            </form>
                        </div>        
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Type</th>
                                        <th>No. Seri</th>
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
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection