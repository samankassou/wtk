<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="">{{ config('app.name') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">{{ strtoupper(substr(config('app.name'), 0, 2)) }}</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><a class="nav-link"
                href="{{ route('admin.dashboard') }}"><i class="fas fa-columns"></i> <span>Dashboard</span></a></li>
        <li class="menu-header">Cities</li>
        <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.cities') }}"><i class="fas fa-city"></i> <span>Cities</span></a>
        </li>
        <li class="menu-header">Users</li>
        <li class="{{ request()->routeIs('admin.users') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.users') }}"><i class="fas fa-users"></i> <span>Users</span></a>
        </li>
    </ul>
</aside>
