@extends('layout.layout')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <h4 class="card-title">Barang Keluar</h4>
                            {{-- <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalCreate">
                                <i class="fa fa-plus"></i>
                                Tambah Data
                            </button> --}}
                        </div>        
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Type</th>
                                        <th>No. Seri</th>
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
                                        <td>
                                            {{-- <a href="#modalEdit{{ $row->id }}" data-toggle="modal" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i>Edit</a> --}}
                                            <a href="#modalHapus{{ $row->id }}" data-toggle="modal" class="btn btn-xs btn-success"><i class="fa fa-trash"></i> Masuk</a>
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

    
    {{-- <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Input Barang</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="POST" action="/bk/store">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Barang</label>
                        <select class="form-control" name="nama_barang" id="" required>
                            <option value="" hidden>-- Pilih Barang --</option>
                            @foreach ($data_bk as $a)
                            <option value="{{ $a->id }}">{{ $a->nama_barang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Type</label>
                        <select class="form-control" name="type" id="" required>
                            <option value="" hidden>-- Pilih Type Barang --</option>
                            @foreach ($data_bk as $a)
                            <option value="{{ $a->id }}">{{ $a->type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">No. Seri</label>
                        <label for="">Type</label>
                        <select class="form-control" name="serial_no" id="" required>
                            <option value="" hidden>-- Pilih No Seri Barang --</option>
                            @foreach ($data_bk as $a)
                            <option value="{{ $a->id }}">{{ $a->serial_no }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div> --}}
   
    {{-- @foreach ($data_bk as $d)
    <div class="modal fade" id="modalEdit{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="POST" action="/bm/update/{{ $d->id }}">
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
    @endforeach --}}

    @foreach ($data_bm as $c)
    <div class="modal fade" id="modalHapus{{ $c->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Masukan Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="GET" action="/bk/destroy/{{ $c->id }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <h5>Apakah Anda Ingin Memasukan Data Ini</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-trash"></i> Masuk</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

@endsection