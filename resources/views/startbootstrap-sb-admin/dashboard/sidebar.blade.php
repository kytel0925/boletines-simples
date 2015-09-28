<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="#dashboard" onclick="AppDashboard.load('dashboard'); return false;">
                    <i class="fa fa-dashboard fa-fw"></i>{{trans('dashboard.title')}}
                </a>
            </li>
            <li>
                <a href="#mailings"><i class="fa fa-envelope fa-fw"></i> {{trans('dashboard.sidebar.mailings')}}<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a class="fa fa-edit" href="#mailings-edit" onclick="AppDashboard.load('mailings-edit'); return false;">{{trans('dashboard.sidebar.mailings-edit')}}</a>
                    </li>
                    <li>
                        <a class="fa fa-tasks" href="#mailings-tasks" onclick="AppDashboard.load('mailings-tasks'); return false;">{{trans('dashboard.sidebar.mailings-tasks')}}</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#suscribers"><i class="fa fa-database fa-fw"></i>{{trans('dashboard.sidebar.subscribers')}}<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a class="fa fa-edit" href="#subscribers-edit" onclick="AppDashboard.load('subscribers-edit'); return false;">{{trans('dashboard.sidebar.subscribers-edit')}}</a>
                    </li>
                    <li>
                        <a class="fa fa-bar-chart-o" href="#subscribers-statistics" onclick="AppDashboard.load('subscribers-statistics'); return false;">{{trans('dashboard.sidebar.subscribers-statistics')}}</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->