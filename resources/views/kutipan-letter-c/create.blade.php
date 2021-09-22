<!-- Modal -->
<div class="modal fade" id="addEmployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#605ca8;color:white">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:#fff">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">Add new employee</h5>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif; color:red"> New Kutipan Letter</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('kutipan-letter-c.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-md-4">
                                    <input id="kutipan_nomor" type="text" class="form-control" name="kutipan_nomor" value="{{ old('kutipan_nomor') }}" required autofocus placeholder="Kutipan Nomor">
                                    @if ($errors->has('kutipan_nomor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kutipan_nomor') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <textarea id="riwayat" class="form-control" name="riwayat" required placeholder="Riwayat">{{ old('riwayat') }}</textarea>
                                    @if ($errors->has('riwayat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('riwayat') }}</strong>
                                    </span>
                                    @endif
                                </div>                
                                <div class="col-md-4">
                                    <input type="file" id="picture" name="picture" class="form-control" required>
                                </div>
                                <br><br>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus placeholder="Alamat">
                                    @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Kutipan Letter</button>
            </div>
            </form>
        </div>
    </div>
</div>