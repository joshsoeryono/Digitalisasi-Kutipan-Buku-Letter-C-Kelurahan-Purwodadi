<!-- Modal -->
<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#605ca8;color:white">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:#fff">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">Edit Profile</h5>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="modal-title" id="exampleModalLongTitle" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif; color:red"> Edit Profile</h3>
                        </div>
                        <div class="panel-body">

                            {{ csrf_field() }}
                            <div class="form-row">
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
                                        <input id="nip" type="text" class="form-control" name="nip" value="{{ $user->nip }}" required autofocus placeholder="NIP">
                                        @if ($errors->has('nip'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nip') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <input id="nip" type="text" class="form-control" name="email" value="{{ $user->email }}" required autofocus placeholder="Email">
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
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
                                    <div class="col-md-12">
                                        <input id="address" type="file" class="form-control" name="profile_picture">
                                        <img src="../../{{$user->profile_picture }}" width="50px" height="50px" />
                                        @if ($errors->has('profile_picture'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('profile_picture') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <input id="from" type="text" class="form-control" name="awal_jabatan" value="{{ $user->awal_jabatan }}" required autofocus placeholder="Awal Jabatan">
                                        @if ($errors->has('awal_jabatan'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('awal_jabatan') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <input id="to" type="text" class="form-control" name="akhir_jabatan" value="{{ $user->akhir_jabatan }}" required autofocus placeholder="Akhir Jabatan">
                                        @if ($errors->has('akhir_jabatan'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('akhir_jabatan') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    
                                </div>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>