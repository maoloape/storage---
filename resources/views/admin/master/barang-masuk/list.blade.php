@extends('layout.layout')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <div class="row md-3">
                                <h4 class="card-title">Barang Masuk</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalCreate">
                                    <i class="fa fa-plus"></i>
                                    Tambah Data
                                </button>
                            </div>
                            <hr>
                            <form method="GET" action="/Barang-Masuk/filter">
                                @csrf
                                <div class="row pb-3">
                                    <div class="col-md-3">
                                        <label for="">Start Date</label>
                                        <input type="date" name="start_date" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">End Date :</label>
                                        <input type="date" name="end_date" class="form-control">
                                    </div>
                                    <div class="col-md-1 pt-4">
                                        <button type="submit" class="btn btn-primary"> Filter </button>
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
                                        <th>No. Produk</th>
                                        <th>No. Kontrak</th>
                                        <th>Action</th>
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
                                        <td>
                                            <a href="#modalEdit{{ $row->id }}" data-toggle="modal" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                            <a href="#modalHapus{{ $row->id }}" data-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                            <a href="#modalKeluar{{ $row->id }}" data-toggle="modal" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Keluar</a>
                                            <a href="#modalReturn{{ $row->id }}" data-toggle="modal" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Return</a>
                                        </td> 
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

    
    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Input Barang</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="POST" action="/Barang-Masuk/store">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" placeholde="Nama barang ..." required>
                    </div>
                    <div class="form-group">
                        <label for="">Type</label>
                        <input type="text" class="form-control" name="type" placeholde="Type ..." required>
                    </div>
                    <div class="form-group">
                        <label for="">No. Seri</label>
                        <input type="text" class="form-control" name="serial_no" placeholde="No. Seri ..." required>
                    </div>
                    <div class="form-group">
                        <label for="">No. Produk</label>
                        <input type="text" class="form-control" name="no_produk" placeholde="No. Produk ..." required>
                    </div>
                    <div class="form-group">
                        <label for="">No. Kontrak</label>
                        <input type="text" class="form-control" name="no_kontrak" placeholde="No. Kontrak ..." required>
                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
   
    @foreach ($data_bm as $d)
    <div class="modal fade" id="modalEdit{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="POST" action="/Barang-Masuk/update/{{ $d->id }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama barang</label>
                        <input type="text" value="{{ $d->nama_barang }}" class="form-control" name="nama_barang" placeholde="Nama Barang ..." required>
                    </div>
                    <div class="form-group">
                        <label for="">Type</label>
                        <input type="text" value="{{ $d->type }}" class="form-control" name="type" placeholde="Type ..." required>
                    </div>
                    <div class="form-group">
                        <label for="">No. Seri</label>
                        <input type="text" value="{{ $d->serial_no }}" class="form-control" name="serial_no" placeholde="No. Seri ..." required>
                    </div>
                    <div class="form-group">
                        <label for="">No. Produk</label>
                        <input type="text" value="{{ $d->no_produk }}" class="form-control" name="no_produk" placeholde="No. Produk ..." required>
                    </div>
                    <div class="form-group">
                        <label for="">No. Kontrak</label>
                        <input type="text" value="{{ $d->no_kontrak }}" class="form-control" name="no_kontrak" placeholde="No. Kontrak ..." required>
                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    @foreach ($data_bm as $c)
    <div class="modal fade" id="modalHapus{{ $c->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="GET" action="/Barang-Masuk/destroy/{{ $d->id }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <h5>Apakah Anda Ingin Menghapus Data Ini</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    @foreach ($data_bm as $e)
    <div class="modal fade" id="modalKeluar{{ $e->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Keluarkan Barang?</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="POST" action="/Barang-Masuk/keluar/{{ $e->id }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <h5>Apakah Anda Ingin Mengeluarkan Data Ini</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> No </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    @foreach ($data_bm as $f)
    <div class="modal fade" id="modalReturn{{ $f->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Barang Return</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="POST" action="/Barang-Masuk/return/{{ $f->id }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" class="form-control" name="text" placeholde="Keterangan ..." required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> No </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

@endsection