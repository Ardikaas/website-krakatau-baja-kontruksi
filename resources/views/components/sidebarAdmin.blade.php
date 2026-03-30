<div class="SidebarandTopbarAdmin">
    <button class="hamburger" onclick="toggleSidebar()">☰</button>
    <div class="sidebar-overlay" onclick="closeSidebar()"></div>

    <div class="content-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <nav class="sidebar-menu">
                <a href="{{ url('/admin') }}" class="menu-item {{ request()->is('admin') ? 'active' : '' }}">
                    <i class="fa-solid fa-house menu-icon"></i>
                    <span class="menu-text">Landing Content</span>
                </a>

                <a href="{{ url('/admin/aboutus') }}" class="menu-item {{ request()->is('admin/aboutus') ? 'active' : '' }}">
                    <i class="fa-solid fa-circle-info menu-icon"></i>
                    <span class="menu-text">About Us Content</span>
                </a>

                <a href="{{ url('/admin/productEdit') }}"
                    class="menu-item {{ request()->is('admin/productEdit*') ? 'active' : '' }}">
                    <i class="fa-solid fa-boxes-stacked menu-icon"></i>
                    <span class="menu-text">Product Management</span>
                </a>

                <a href="{{ url('/admin/projects') }}" class="menu-item {{ request()->is('admin/projectEdit*') ? 'active' : '' }}">
                    <i class="fa-solid fa-diagram-project menu-icon"></i>
                    <span class="menu-text">Project Management</span>
                </a>

                <a href="{{ url('/admin/newsEdit') }}"
                    class="menu-item {{ request()->is('admin/newsEdit*') || request()->is('admin/addNews*') ? 'active' : '' }}">
                    <i class="fa-solid fa-newspaper menu-icon"></i>
                    <span class="menu-text">News Management</span>
                </a>

                <a href="{{ url('/admin/sales') }}"
                    class="menu-item {{ request()->is('admin/sales*') || request()->is('admin/sales*') ? 'active' : '' }}">
                    <i class="fa-solid fa-money-bill-trend-up menu-icon"></i>
                    <span class="menu-text">Sales Management</span>
                </a>

                <a href="{{ url('/admin/wbs') }}" class="menu-item {{ request()->is('admin/wbs*') ? 'active' : '' }}">
                    <i class="fa-solid fa-shield-halved menu-icon"></i>
                    <span class="menu-text">WBS Management</span>
                </a>

                @if(config('app.debug'))
                <a href="{{ route('admin.utilities.index') }}" class="menu-item {{ request()->is('admin/utilities*') ? 'active' : '' }}">
                    <i class="fa-solid fa-screwdriver-wrench menu-icon"></i>
                    <span class="menu-text">System Utilities</span>
                </a>
                @endif

                <div class="sidebar-bottom">
                    <form action="{{ route('admin.logout') }}" method="POST" style="width: 100%;">
                        @csrf
                        <button type="submit" class="menu-item" style="width: 100%; border: none; background: transparent; cursor: pointer; text-align: left;" onclick="return confirm('Are you sure you want to sign out?')">
                            <i class="fa-solid fa-right-from-bracket menu-icon"></i>
                            <span class="menu-text logout">Sign Out</span>
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <!-- Main Area -->
        <div class="main-area">
            <header class="header">
                <img src="{{ asset('images/logo-3.png') }}" alt="Krakatau Logo" class="sidebar-logo">

                <div class="fitur-header">

                </div>
            </header>
        </div>
    </div>
</div>


<script>
    const sidebar = document.getElementById('sidebar');
    const overlay = document.querySelector('.sidebar-overlay');

    function toggleSidebar() {
        sidebar.classList.toggle('mobile-open');
        overlay.style.display = sidebar.classList.contains('mobile-open') ? 'block' : 'none';
    }

    function closeSidebar() {
        sidebar.classList.remove('mobile-open');
        overlay.style.display = 'none';
    }

    document.querySelectorAll('.menu-item').forEach(item => {
        item.addEventListener('click', () => {
            document.querySelectorAll('.menu-item')
                .forEach(i => i.classList.remove('active'));

            item.classList.add('active');

            if (window.innerWidth < 1024) closeSidebar();
        });
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth >= 1024) closeSidebar();
    });
</script>
