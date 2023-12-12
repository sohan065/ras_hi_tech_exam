<div class="sidebar">
    <div class="logo">logo</div>
    <ul class="menu">
        <li>
            <a href="{{ route('user.dashboard') }}">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('user.index') }}">
                <i class="fas fa-user"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="{{ route('user.dashboard') }}">
                <i class="fas fa-chart-bar"></i>
                <span>Posts</span>
            </a>
        </li>

        <li>
            <a href="{{ route('user.logout') }}">
                <i class="fas fa-sign-out"></i>
                <span>Logout</span>
            </a>
        </li>

    </ul>
</div>
