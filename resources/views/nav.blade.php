{{-- //@extends('index') --}}

{{-- @section('nav') --}}

<header class="main-header">
    <!-- Logo -->
    <a href="{{route('dashboard')}}" class="logo">MassData</a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Tasks: style can be found in dropdown.less -->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('dist/img/user.jpg')}}" class="user-image" alt="User Image"/>
              <span class="hidden-xs">{{auth()->user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('dist/img/user.jpg')}}" class="img-circle" alt="User Image" />
                <p>
                  {{auth()->user()->name}} - Web Developer
                  <small>Member since {{auth()->user()->created_at->format('d/m/Y')}}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="text-center">
                  <a href="{{route('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
          @can('edit-users')
        <li class=" treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>User Management</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('users')}}"><i class="fa fa-circle-o"></i> Users</a></li>
            <li><a href="{{route('permissions')}}"><i class="fa fa-circle-o"></i> Permissions</a></li>
          </ul>
        </li>
        @endcan
        @can('upload')
        <li class="treeview">
          <a href="{{route('dataImport')}}">
            <i class="fa fa-files-o"></i>
            <span>Data Import</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Your Imported Data</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu"> 
            @foreach(auth()->user()->insertData()->get()->unique('dataname')->all() as $userData)
              <li><a href="{{route('manage', $userData->dataname)}}"><i class="fa fa-circle-o"></i> {{$userData->dataname}}</a></li>
            @endforeach
          </ul>
        </li>
        @endcan
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
{{-- @endsection --}}