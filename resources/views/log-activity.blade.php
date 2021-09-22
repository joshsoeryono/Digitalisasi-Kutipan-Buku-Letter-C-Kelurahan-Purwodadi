@extends('system-mgmt.report.base')
@section('action-content')
<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <div class="row">
        <div class="col-sm-4">
          <h3 class="box-title" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">List of Activity</h3>
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      @component('layouts.search', ['title' => 'Search'])
      <form method="POST" action="{{ route('log-activity.search') }}">
        {{ csrf_field() }}
        <div class="row form-group">
          <div class="col-md-6">
            <div class="form-group">
              <div class="col-sm-8">
                <input type="text" class="form-control" name="query" id="input" placeholder="" value="{{isset($searchingVals) ? $searchingVals['query'] : ''}}" required>
              </div>
              <div class="col-sm-4">
                <select name="field" class="form-control">
                  <option value="log_activity.name">Nama</option>
                  <option value="log_activity.nip">NIP</option>
                  <option value="roles.name">Jabatan</option>
                </select>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            Search
          </button>
        </div>

      </form>
      <form method="POST" action="{{ route('log-activity.search') }}">
        {{ csrf_field() }}
        @component('layouts.two-cols-date-search-row', ['items' => ['yyyy-mm-dd'],
        'oldVals' => [isset($searchingVals) ? $searchingVals['date'] : '']])
        @endcomponent
      </form>
      @endcomponent
      <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
          <div class="col-sm-12">
            <table class="table table-bordered table-dark">
              <thead>
                <tr role="row">
                  <th width="30%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Name</th>
                  <th width="10%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthday: activate to sort column ascending">NIP</th>
                  <th width="10%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthday: activate to sort column ascending">Jabatan</th>
                  <th width="10%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">Time</th>
                  <th width="10%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthday: activate to sort column ascending">Date</th>
                  <th width="30%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthday: activate to sort column ascending">Activity</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($logactivity as $row)
                <tr role="row" class="odd">
                  <td>{{$row->name}}</td>
                  <td>{{$row->nip}}</td>
                  <td>{{$row->rolename}}</td>
                  <td>{{$row->time}}</td>
                  <td>{{$row->date}}</td>
                  <td>{{$row->activity}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">page 1 to {{count($logactivity)}} of {{count($logactivity)}} entries</div>
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