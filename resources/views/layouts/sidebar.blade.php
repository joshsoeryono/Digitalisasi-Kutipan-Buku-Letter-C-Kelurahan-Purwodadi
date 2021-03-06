  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
<!--      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.png") }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name}}</p>
          &lt;!&ndash; Status &ndash;&gt;
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>-->

      <!-- search form (Optional) -->
<!--      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- Optionally, you can add icons to the links -->
<!--        <li class="active"><a href="/"><i class="fa fa-dashboard fa-lg"></i> <span>Dashboard</span></a></li>-->
        <li><a href="{{ url('kutipan-letter-c') }}"><i class="fa fa-book fa-lg"></i> <span> Kutipan Nomor Letter C</span></a></li>
{{--        <li class="treeview">--}}
{{--          <a href="#"><i class="fa fa-gear fa-lg"></i> <span> General Management </span>--}}
{{--            <span class="pull-right-container">--}}
{{--              <i class="fa fa-angle-left pull-right"></i>--}}
{{--            </span>--}}
{{--          </a>--}}
{{--          <ul class="treeview-menu">--}}
{{--            <li><a href="{{ url('system-management/department') }}">Department</a></li>--}}
{{--            <li><a href="{{ url('system-management/division') }}">Division</a></li>--}}
{{--            <li><a href="{{ url('system-management/country') }}">Country</a></li>--}}
{{--            <li><a href="{{ url('system-management/state') }}">State</a></li>--}}
{{--            <li><a href="{{ url('system-management/city') }}">City</a></li>--}}
{{--          </ul>--}}
{{--        </li>--}}

        <li><a href="{{ url('profile') }}"><i class="fa fa-user fa-lg"></i> <span> Profile </span></a></li>
        @if (Auth::user()->role_id == '1')
        
        <li><a href="{{ route('user-management.index') }}"><i class="fa fa-users fa-lg"></i> <span> User </span></a></li>
        <li><a href="{{ url('log-activity') }}"><i class="fa fa-history fa-lg"></i> <span> Log Activity </span></a></li>
        @endif
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>