@extends('kutipan-letter-c.base')
@section('action-content')
<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      @include('flash_message')
      <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">List of Kutipan Nomor Letter C</h3>
        </div>
        <div class="col-sm-4">
          @if (Auth::user()->role_id == '1' || Auth::user()->role_id == '2')
          <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#addEmployee">
            <i class="fa fa-plus"></i> Add New Kutipan Nomor Letter C
          </button>
          @endif
        </div>
        @include('kutipan-letter-c.create')
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="{{ route('kutipan-letter-c.search') }}">
        {{ csrf_field() }}
        @component('layouts.search', ['title' => 'Search'])
        @component('layouts.two-cols-search-row', ['items' => ['Kutipan Nomor Letter C'],
        'oldVals' => [isset($searchingVals) ? $searchingVals['kutipan_nomor'] : '']])
        @endcomponent
      </form>
      <form method="POST" action="{{ route('kutipan-letter-c.search') }}">
        {{ csrf_field() }}
        @component('layouts.two-cols-search-row', ['items' => ['Address'],
        'oldVals' => [isset($searchingVals) ? $searchingVals['address'] : '']])
        @endcomponent
        @endcomponent

      </form>
      <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
          <div class="col-sm-12">
            <table class="table table-bordered table-dark">
              <thead>

                <tr>
                  <th scope="col">Gambar Kutipan Nomor Letter C</th>
                  <th scope="col">Kutipan Nomor Letter C</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Riwayat</th>
                  @if (Auth::user()->role_id == '1' || Auth::user()->role_id == '2')
                  <th scope="col" rowspan="3">Action</th>
                  @endif
                </tr>
              </thead>
              <tbody>
                @foreach ($kutipanletterc as $row)
                <tr role="row" class="odd">
                  <td>
                    <div style="padding: 2px"><img id="show{{$row->id}}" src="../{{$row->picture }}" class="user-image" width="350px" height="350px" style="display: none;" /></div>
                    <div id="modal{{$row->id}}" class="modal" tabindex="-1" role="dialog">
                      <div class="modal-dialog" style="width:fit-content; max-width:100%;" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <img src="../{{$row->picture }}" class="user-image" style="max-width:100%;" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <button class="btn btn-primary" id="button{{$row->id}}" onclick="disp('{{$row->id}}')" value="show">Show Picture</button>
                    <button data-toggle="modal" data-target="#modal{{$row->id}}" class="btn btn-primary">Show in Original Size</button>
                  </td>
                  <td class="hidden-xs">{{ $row->kutipan_nomor }}</td>
                  <td class="hidden-xs text-left">{!! nl2br($row->address) !!}</td>
                  <td class="hidden-xs text-left">{!! nl2br($row->riwayat) !!}</td>
                  @if (Auth::user()->role_id == '1' || Auth::user()->role_id == '2')
                  <td colspan="3">

                    <form class="row" method="POST" action="{{ route('kutipan-letter-c.destroy', ['id' => $row->id]) }}" onsubmit="return confirm('Are you sure?')">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <a href="{{ route('kutipan-letter-c.edit', ['id' => $row->id]) }}" class="btn btn-info  col-xs-3 btn-margin">
                        <i class="fa fa-edit "></i>
                      </a>
                      <button type="submit" class="btn btn-danger col-xs-3 btn-margin">
                        <i class="fa fa-trash "></i>
                      </button>
                    </form>

                  </td>
                  @endif
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-5">
            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">page 1 to {{count($kutipanletterc)}} of {{count($kutipanletterc)}} entries</div>
          </div>
          <div class="col-sm-7">
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
              {{ $kutipanletterc->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.box-body -->
  </div>
</section>
<!-- /.content -->
{{-- </div> --}}
@endsection

<script>
  function disp(id) {
    if ($('#button' + id).val() == 'show') {
      $('#show' + id).show();
      $('#button' + id).val('hide');
      $('#button' + id).html('Hide Picture');
    } else {
      $('#show' + id).hide();
      $('#button' + id).val('show');
      $('#button' + id).html('Show Picture');
    }
  }
</script>