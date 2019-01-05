<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{  ucfirst(auth::User()->name) }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
        {{-- <li class="header">MAIN NAVIGATION</li> --}}
        <li class="treeview">
            <a href="#">
            <i class="fa fa-laptop"></i>
            <span>News</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('news.index') }}"><i class="fa fa-circle-o"></i>Publish</a></li>
                <li><a href="{{ route('category.index') }}"><i class="fa fa-circle-o"></i> Categories</a></li>
                <li><a href="{{ route('tag.index') }}"><i class="fa fa-circle-o"></i>Tags</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Laws</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('laws.index') }}"><i class="fa fa-circle-o"></i>Publish</a></li>
                <li><a href="{{ route('lawcategory.index') }}"><i class="fa fa-circle-o"></i> Categories</a></li>
                <li><a href="{{ route('lawtag.index') }}"><i class="fa fa-circle-o"></i>Tags</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Registered</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('lawyer.index') }}"><i class="fa fa-circle-o"></i>Lawyers</a></li>
                <li><a href="{{ route('user.index') }}"><i class="fa fa-circle-o"></i>Users</a></li>
            </ul>
        </li>
        <li><a href="{{ route('unregister.index') }}"><i class="fa fa-circle-o"></i>Unregistered Lawyers</a></li>
        <li class="treeview">
            <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Messages</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('lawyerMessages.index') }}"><i class="fa fa-circle-o"></i>From Lawyers</a></li>
                <li><a href="{{ route('userMessages.index') }}"><i class="fa fa-circle-o"></i>From Users</a></li>
                <li><a href="{{ route('clientMessages.index') }}"><i class="fa fa-circle-o"></i>From Unregistered Users</a></li>
            </ul>
        </li>
    </section>
    <!-- /.sidebar -->
</aside>