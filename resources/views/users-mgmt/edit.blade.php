@extends('users-mgmt.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-11 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif; color:red">Update user</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('user-management.update', ['id' => $user->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="profile_picture" type="file" class="form-control" name="profile_picture" placeholder="Profile Picture">
                                <img src="../../{{$user->profile_picture }}" width="50px" height="50px" />
                                @if ($errors->has('profile_picture'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('profile_picture') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <input id="fullname" type="text" class="form-control" name="fullname" value="{{ $user->fullname }}" required autofocus placeholder="Full Name">

                                @if ($errors->has('fullname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('fullname') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="col-md-4">
                                <input id="nip" type="text" class="form-control" name="nip" value="{{ $user->nip }}" required placeholder="NIP">

                                @if ($errors->has('nip'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nip') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="col-md-4">

                                <select class="form-control" name="role_id">
                                    <option value="">-- Pilih Role --</option>
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected="selected"' : '' }}> {{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block">
                                    <strong>{{ $errors->first('role_id') }}</strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="address" type="text" class="form-control" name="address" value="{{ $user->address }}" required placeholder="Address">

                                @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <input id="from" type="text" class="form-control" name="awal_jabatan" value="{{ $user->awal_jabatan }}" required placeholder="Awal Jabatan">

                                @if ($errors->has('awal_jabatan'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('awal_jabatan') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input id="to" type="text" class="form-control" name="akhir_jabatan" value="{{ $user->akhir_jabatan }}" required placeholder="Akhir Jabatan">

                                @if ($errors->has('akhir_jabatan'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('akhir_jabatan') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password (optional)">

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password (optional)">
                            </div>
                        </div>

                        <div class="form-group pull-right">
                            <div class="col-md-3 col-md-offset-0">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-refresh"></i> Update User
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection