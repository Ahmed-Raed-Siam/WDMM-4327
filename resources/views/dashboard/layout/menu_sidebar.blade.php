<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard.') }}" class="brand-link">
        <img src="{{ asset("dist/img/AdminLTELogo.png") }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar users panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset("dist/img/user2-160x160.jpg") }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Ahmed Raed Siam</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item {{ \Illuminate\Support\Facades\Request::is('admin') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="{{ route('dashboard.') }}"
                       class="nav-link {{ \Illuminate\Support\Facades\Request::is('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
            <!--{{--Posts--}}-->
                <li class="nav-item {{ \Illuminate\Support\Facades\Request::is('admin/posts','admin/posts/create') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="{{ route('dashboard.posts.index') }}"
                       class="nav-link {{ \Illuminate\Support\Facades\Request::is('admin/posts','admin/posts/create') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Posts
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.posts.index') }}"
                               class="nav-link {{ \Illuminate\Support\Facades\Request::is('admin/posts') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Posts Table</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.posts.create') }}"
                               class="nav-link {{ \Illuminate\Support\Facades\Request::is('admin/posts/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Post</p>
                            </a>
                        </li>
                    </ul>
                </li>
            <!--{{--Categories--}}-->
                <li class="nav-item {{ \Illuminate\Support\Facades\Request::is('admin/categories','admin/categories/create') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="{{ route('dashboard.categories.index') }}"
                       class="nav-link {{ \Illuminate\Support\Facades\Request::is('admin/categories','admin/categories/create') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Categories
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.categories.index') }}"
                               class="nav-link {{ \Illuminate\Support\Facades\Request::is('admin/categories') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categories Table</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.categories.create') }}"
                               class="nav-link {{ \Illuminate\Support\Facades\Request::is('admin/categories/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
            <!--{{--Users--}}-->
                <li class="nav-item {{ \Illuminate\Support\Facades\Request::is('admin/users','admin/users/create','admin/users/trash') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="{{ route('dashboard.users.index') }}"
                       class="nav-link {{ \Illuminate\Support\Facades\Request::is('admin/users','admin/users/create','admin/users/trash') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.users.index') }}"
                               class="nav-link {{ \Illuminate\Support\Facades\Request::is('admin/users') ? 'active' : '' }}">
                                {{--                                <i class="{{ \Illuminate\Support\Facades\Request::is('admin/users') ? 'far fa-dot-circle' : 'far fa-circle' }} nav-icon"></i>--}}
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users Table</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.users.create') }}"
                               class="nav-link {{ \Illuminate\Support\Facades\Request::is('admin/users/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.users.trash.index') }}"
                               class="nav-link {{ \Illuminate\Support\Facades\Request::is('admin/users/trash') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Trash</p>
                            </a>
                        </li>
                    </ul>
                </li>
            <!--{{--Roles & Users Roles--}}-->
                <li class="nav-item {{ \Illuminate\Support\Facades\Request::is('admin/roles','admin/roles/create','admin/users/roles','admin/users/roles/create') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="{{ route('dashboard.roles.index') }}"
                       class="nav-link {{ \Illuminate\Support\Facades\Request::is('admin/roles','admin/roles/create','admin/users/roles','admin/users/roles/create') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-lock"></i>
                        <p>
                            Roles
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ \Illuminate\Support\Facades\Request::is('admin/roles','admin/roles/create') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="{{ route('dashboard.roles.index') }}"
                               class="nav-link {{ \Illuminate\Support\Facades\Request::is('admin/roles','admin/roles/create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-signature"></i>
                                <p>
                                    Roles
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.roles.index') }}"
                                       class="nav-link {{ \Illuminate\Support\Facades\Request::is('admin/roles') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Roles Table</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.roles.create') }}"
                                       class="nav-link {{ \Illuminate\Support\Facades\Request::is('admin/roles/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Role</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{ \Illuminate\Support\Facades\Request::is('admin/users/roles','admin/users/roles/create') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="{{ route('dashboard.users.roles.index') }}"
                               class="nav-link {{ \Illuminate\Support\Facades\Request::is('admin/users/roles','admin/users/roles/create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users-cog"></i>
                                <p>
                                    Users Roles
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.users.roles.index') }}"
                                       class="nav-link {{ \Illuminate\Support\Facades\Request::is('admin/users/roles') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Users Roles Table</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.users.roles.create') }}"
                                       class="nav-link {{ \Illuminate\Support\Facades\Request::is('admin/users/roles/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Users Roles</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
