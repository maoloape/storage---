@extends('layout.layout')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @foreach ($data_profile as $d)
                    <form method="POST" action="/profile/updateprofile/{{ $d->id }}">
                    @csrf
                    <div class="card-body">
                        <div class="d-flex align-item-center">
                            <h4 class="card-title">Setting Profile</h4>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <input type="text" name="name" value="{{ $d->name }}" class="form-control" placeholder="Nama Lengkap ..." required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" readonly value="{{ $d->email }}" class="form-control" placeholder="Email ..." required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Paassword ..." required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Role</label>
                                    <input type="text" name="role" readonly value="{{ $d->role }}" class="form-control" placeholder="Role ..." required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"> Save Changes</i></button>
                    </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection