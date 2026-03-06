<div class="SidebarandTopbarAdmin">
    <button class="hamburger" onclick="toggleSidebar()">☰</button>
    <div class="sidebar-overlay" onclick="closeSidebar()"></div>

    <div class="content-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <nav class="sidebar-menu">
                <a href="/admin" class="menu-item {{ request()->is('admin') ? 'active' : '' }}">
                    <img src="{{ asset('images/icons/img_home_3_streamline.svg') }}" class="menu-icon">
                    <span class="menu-text">Landing Content</span>
                </a>

                <a href="/admin/aboutus" class="menu-item {{ request()->is('admin/aboutus') ? 'active' : '' }}">
                    <img src="{{ asset('images/icons/img_bullet_list_streamline.svg') }}" class="menu-icon">
                    <span class="menu-text">About Us Content</span>
                </a>

                <a href="/admin/productEdit"
                    class="menu-item {{ request()->is('admin/productEdit*') ? 'active' : '' }}">
                    <img src="{{ asset('images/icons/img_shipment_remove.svg') }}" class="menu-icon">
                    <span class="menu-text">Product Management</span>
                </a>

                <a href="/admin/projects" class="menu-item {{ request()->is('admin/projectEdit*') ? 'active' : '' }}">
                    <img src="{{ asset('images/icons/img_shipment_remove.svg') }}" class="menu-icon">
                    <span class="menu-text">Project Management</span>
                </a>

                <a href="/admin/newsEdit"
                    class="menu-item {{ request()->is('admin/newsEdit*') || request()->is('admin/addNews*') ? 'active' : '' }}">
                    <img src="{{ asset('images/icons/img_news_paper_streamline.svg') }}" class="menu-icon">
                    <span class="menu-text">News Management</span>
                </a>

                <a href="/admin/sales"
                    class="menu-item {{ request()->is('admin/sales*') || request()->is('admin/sales*') ? 'active' : '' }}">
                    <img src="{{ asset('images/icons/img_megaphone_streamline.svg') }}" class="menu-icon">
                    <span class="menu-text">Sales Management</span>
                </a>

                <a href="/admin/wbs" class="menu-item {{ request()->is('admin/wbs*') ? 'active' : '' }}">
                    <img src="{{ asset('images/icons/img_megaphone_streamline.svg') }}" class="menu-icon">
                    <span class="menu-text">WBS Management</span>
                </a>

                <div class="sidebar-bottom">
                    <form action="{{ route('admin.logout') }}" method="POST" style="width: 100%;">
                        @csrf
                        <button type="submit" class="menu-item" style="width: 100%; border: none; background: transparent; cursor: pointer; text-align: left;" onclick="return confirm('Are you sure you want to sign out?')">
                            <img src="{{ asset('images/icons/img_logout_1_streamline.svg') }}" class="menu-icon">
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

                    <div class="user-section">
                        <span class="divider-line"></span>
                        <div class="user-info">
                            <img src="{{ asset('images/icons/icon-1.png') }}" class="user-avatar">
                            <span class="user-name">Admin User</span>
                        </div>
                    </div>
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
