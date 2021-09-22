@extends('employees-mgmt.base')
@section('action-content')
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            @include('flash_message')
            <div class="row">
                <div class="col-sm-8">
                    <h3 class="box-title" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">Profile</h3>
                </div>
                <div class="col-sm-4">
                    <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#editProfile">
                        <i class="fa fa-edit"></i> Edit Profile
                    </button>
                </div>
            </div>
            @include('editprofile')
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form>
                <fieldset disabled>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="card-header"><strong>Profile Picture</strong></div>
                            <img src="{{ asset($user->profile_picture) }}" class="user-image" alt="" width="160">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputName">Full Name</label>
                            <input type="text" class="form-control" id="inputName" placeholder="Full Name" value="{{$user->fullname}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputNIP">Nomor Induk Pegawai</label>
                            <input type="text" class="form-control" id="inputNIP" placeholder="NIP" value="{{$user->nip}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Email</label>
                            <input type="text" class="form-control" id="inputEmail" placeholder="email" value="{{$user->email}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAlamat">Alamat</label>
                            <input type="text" class="form-control" id="inputAlamat" placeholder="Address" value="{{$user->address}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputName">Tanggal Awal Masa Jabatan</label>
                            <input type="text" class="form-control" id="inputAwalJabatan" placeholder="Tanggal Awal Masa Jabatan" value="{{$user->awal_jabatan}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputNIP">Tanggal Akhir Masa Jabatan</label>
                            <input type="text" class="form-control" id="inputAkhirJabatan" placeholder="Tanggal Akhir Masa Jabatan" value="{{$user->akhir_jabatan}}">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <!-- /.box-body -->
    </div>
</section>
<!-- /.content -->
{{-- </div> --}}
@endsection