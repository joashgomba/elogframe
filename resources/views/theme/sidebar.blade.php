<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>General</h3>
    <ul class="nav side-menu">
      <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> Dashboard</a></li>

      <li><a><i class="fa fa-hdd-o"></i> MES <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{route('indicatorcategories.index')}}">Indicator Categories</a></li>
          <li><a href="{{route('mesindicators.index')}}">MES Indicators</a></li>
          <li><a href="{{route('mesindicatortrackings.index')}}">MES Indicator Reporting</a></li>
        </ul>
      </li>

      <li><a><i class="fa fa-list"></i> Work Plans <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{route('rollingplans.index')}}">Rolling Plans</a></li>
            <li><a href="{{route('resultareas.index')}}">Result Areas</a></li>
          <li><a href="{{route('annualworkplans.index')}}">Annual Work Plans</a></li>
          <li><a href="{{route('tasks.index')}}">Assign Tasks</a></li>
          <li><a href="{{route('taskreportings.index')}}">Tasks Reporting</a></li>
        </ul>
      </li>

      <li><a><i class="fa fa-bar-chart"></i> Reports <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{route('reports.index')}}">MES Indicator Category per County</a></li>
          <li><a href="{{route('reports.countyindicator')}}">Specific MES Indicator per County</a></li>
          <li><a href="{{route('reports.activityindicator')}}">Activity Indicator Tracking</a></li>
          <li><a href="{{route('reports.activityimplementation')}}">Activity Implementation Tracking</a></li>

        </ul>
      </li>

    </ul>
  </div>
  <div class="menu_section">
    <h3>Settings</h3>
    <ul class="nav side-menu">

      <li><a><i class="fa fa-clone"></i>Organization <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('counties.index') }}">Counties</a></li>
          <li><a href="{{ route('ministries.index') }}">Ministries</a></li>
          <li><a href="{{ route('departments.index') }}">Departments</a></li>
          <li><a href="{{ route('divisions.index') }}">Divisions</a></li>
          <li><a href="{{ route('units.index') }}">Units</a></li>
          <li><a href="{{route('sourcesoffunding.index')}}">Funding Sources</a></li>
        </ul>
      </li>
    </ul>
  </div>

  <div class="menu_section">
    <h3>Security</h3>
    <ul class="nav side-menu">
      <li><a><i class="fa fa-user"></i>User Management <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('roles.index') }}">Roles Management</a></li>
          <li><a href="{{ route('users.index') }}">User Management</a></li>
        </ul>
      </li>



    </ul>
  </div>

</div>
<!-- /sidebar menu -->
<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
  <a data-toggle="tooltip" data-placement="top" title="Settings">
    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="FullScreen">
    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="Lock">
    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="Logout" href="">
    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
  </a>
</div>
<!-- /menu footer buttons -->