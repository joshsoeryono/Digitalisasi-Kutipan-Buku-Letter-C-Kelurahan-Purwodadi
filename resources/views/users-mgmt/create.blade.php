<!-- Modal -->
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#605ca8;color:white">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:#fff">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">Add new users</h5>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif; color:red"> New user Portal</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('user-management.store') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-md-6">
                                    <input id="fullname" type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" required placeholder="Full Name">

                                    @if ($errors->has('fullname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fullname') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <input id="nip" type="text" class="form-control" name="nip" value="{{ old('nip') }}" required autofocus placeholder="NIP">

                                    @if ($errors->has('nip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nip') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input id="address" type="text" class="form-control" name="address" required placeholder="Address">

                                    @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="E-Mail Address">

                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-md-6">

                                    <select class="form-control" name="role_id">
                                        <option value="">-- Pilih Role --</option>
                                        @foreach($roles as $role)
                                        <option value="{{ $role->id }}"> {{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <input id="from" type="text" class="form-control" name="awal_jabatan" required placeholder="Awal Jabatan">

                                    @if ($errors->has('awal_jabatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('awal_jabatan') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <input id="to" type="text" class="form-control" name="akhir_jabatan" required placeholder="Akhir Jabatan">

                                    @if ($errors->has('akhir_jabatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('akhir_jabatan') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="sumbit" class="btn btn-primary">Save User</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>