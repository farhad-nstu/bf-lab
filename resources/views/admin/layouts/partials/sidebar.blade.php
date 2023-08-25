@php
    $route = Route::current()->getName();
@endphp
<style>
    .nav-item-active-a{
        background-color: #f6f9ff !important;
    }
    .ul-item-li-a-i{
        background-color: #4154f1 !important;
    }
    .ul-item-li-a-span{
        color: #4154f1 !important;
    }
</style>
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link @if(in_array($route, ['system.index'])) nav-item-active-a @else collapsed @endif" href="{{ route('system.index') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link @if(in_array($route, ['tasks.index','tasks.create','tasks.edit'])) nav-item-active-a @else collapsed @endif" href="{{ route('tasks.index') }}">
                <i class="bi bi-person"></i>
                <span>Tasks</span>
            </a>
        </li>

        @if(in_array(usersRole(auth()->id())->role, ['super-admin','admin']))
        <li class="nav-item">
            <a class="nav-link @if(in_array($route, ['users.index','users.create','users.edit','roles.index','roles.create','roles.edit','permissions.index','permissions.create','permissions.edit','status.index'])) nav-item-active-a @else collapsed @endif" data-bs-target="#configurations-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Configurations</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="configurations-nav" class="nav-content collapse @if(in_array($route, ['users.index','users.create','users.edit','roles.index','roles.create','roles.edit','permissions.index','permissions.create','permissions.edit','status.index'])) show @endif" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('users.index') }}">
                        <i class="bi bi-circle @if(in_array($route, ['users.index','users.create','users.edit'])) ul-item-li-a-i @endif"></i><span @if(in_array($route, ['users.index','users.create','users.edit'])) class="ul-item-li-a-span" @endif>Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('roles.index') }}">
                        <i class="bi bi-circle @if(in_array($route, ['roles.index','roles.create','roles.edit'])) ul-item-li-a-i @endif"></i><span @if(in_array($route, ['roles.index','roles.create','roles.edit'])) class="ul-item-li-a-span" @endif>Roles</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('permissions.index') }}">
                        <i class="bi bi-circle @if(in_array($route, ['permissions.index','permissions.create','permissions.edit'])) ul-item-li-a-i @endif"></i><span @if(in_array($route, ['permissions.index','permissions.create','permissions.edit'])) class="ul-item-li-a-span" @endif>Permissions</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('status.index') }}">
                        <i class="bi bi-circle @if(in_array($route, ['status.index'])) ul-item-li-a-i @endif"></i><span @if(in_array($route, ['status.index'])) class="ul-item-li-a-span" @endif>Status</span>
                    </a>
                </li>
            </ul>
        </li><!-- End configurations Nav -->
        @endif

    </ul>

</aside><!-- End Sidebar-->
