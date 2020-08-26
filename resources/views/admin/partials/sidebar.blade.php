<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="{{ Nav::isRoute('admin.dashboard') }}" href="{{ route('admin.dashboard') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-users"></i>
                        <span>Users</span>
                    </a>
                    <ul class="sub">
						<li><a class="{{ Nav::isResource('user.index') }}" href="{{ route('user.index') }}">List Users</a></li>
                        @can('create-users')
                            <li><a class="{{ Nav::isResource('user.create') }}" href="{{ route('user.create') }}">Create Users</a></li>
                        @endcan
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-lock"></i>
                        <span>Permission</span>
                    </a>
                    <ul class="sub">
                        <li><a class="{{ Nav::isResource('permission.index') }}" href="{{ route('permission.index') }}">List Permission</a></li>
                        <li><a class="{{ Nav::isResource('permission.create') }}" href="{{ route('permission.create') }}">Create Permission</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Role</span>
                    </a>
                    <ul class="sub">
                        <li><a {{ Nav::isResource('role.index') }} href="{{ route('role.index') }}">List Role</a></li>
                        <li><a {{ Nav::isResource('role.create') }} href="{{ route('role.create') }}">Create Role</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Posts</span>
                    </a>
                    <ul class="sub">
                        <li><a {{ Nav::isResource('post.index') }} href="{{ route('post.index') }}">List Post</a></li>
                        <li><a {{ Nav::isResource('post.create') }} href="{{ route('post.create') }}">Create Post</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
