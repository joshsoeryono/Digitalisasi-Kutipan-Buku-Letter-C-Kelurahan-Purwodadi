@extends('users-mgmt.base')
@section('action-content')
<!-- Main content -->
<section class="content">
  <div class="box">
    @include('flash_message')
    <div class="box-header">
      <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">List of users</h3>
        </div>
        <div class="col-sm-4">
          <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#addUser">
            <i class="fa fa-plus"></i> Register a new account
          </button>
        </div>
        @include('users-mgmt.create')
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <br>
      <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
          <div class="col-sm-12">
            <table class="table table-bordered table-dark">
              <thead>
                <tr role="row">
                  <th width="20%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Name</th>
                  <th width="20%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">NIP</th>
                  <th width="10%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Role</th>
                  <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Email</th>
                  <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr role="row" class="odd">
                  <td class="hidden-xs">{{ $user->fullname }}</td>
                  <td class="hidden-xs">{{ $user->nip}}</td>
                  <td class="sorting_1">{{ $user->rolename }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                    <form class="row" method="POST" action="{{ route('user-management.destroy', ['id' => $user->id]) }}" onsubmit="return confirm('Are you sure?')">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <a href="{{ route('user-management.edit', ['id' => $user->id]) }}" title="Edit User" class="btn btn-info col-sm-3 col-xs-5 btn-margin">
                        <i class="fa fa-edit fa-lg"></i>
                      </a>
                      @if ($user->rolename != 'Admin' && $user->nip != Auth::user()->nip)
                      <button type="submit" title="Delete User" class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                        <i class="fa fa-trash fa-lg"></i>
                      </button>
                      @endif
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-5">
            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">page 1 to {{count($users)}} of {{count($users)}} entries</div>
          </div>
          <div class="col-sm-7">
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
              {{ $users->links() }}
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