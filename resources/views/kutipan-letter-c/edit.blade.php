@extends('kutipan-letter-c.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-11 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif; color:red">Update employee</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('kutipan-letter-c.update', ['id' => $kutipanletterc->id]) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <div class="col-md-4">
                                <input id="kutipan_nomor" type="text" class="form-control" name="kutipan_nomor" value="{{ $kutipanletterc->kutipan_nomor }}" required autofocus placeholder="Kutipan Nomor">

                                @if ($errors->has('kutipan_nomor'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kutipan_nomor') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="col-md-4">
                                <textarea id="riwayat" class="form-control" name="riwayat" required placeholder="Riwayat">{{ $kutipanletterc->riwayat }}</textarea>

                                @if ($errors->has('riwayat'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('riwayat') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="col-md-4">
                                <img src="../../{{$kutipanletterc->picture }}" width="50px" height="50px" />
                                <input type="file" id="picture" name="picture" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="address" type="text" class="form-control" name="address" value="{{ $kutipanletterc->address }}" required autofocus placeholder="Alamat">

                                @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group pull-right">
                            <div class="col-md-6 ">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-refresh"> Update Kutipan Letter</i>
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