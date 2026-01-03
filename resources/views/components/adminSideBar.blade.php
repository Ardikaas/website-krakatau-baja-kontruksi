<aside class="admin-sidebar" id="adminSidebar">
    {{-- Logo --}}
    <div class="admin-sidebar__header">
        <img
            src="{{ asset('images/logo.png') }}"
            alt="Krakatau Logo"
            class="admin-sidebar__logo"
        >
    </div>

    {{-- Menu --}}
    <nav class="admin-sidebar__menu">
        <a href="{{ route('admin.landingEdit') }}"
           class="menu-item active"
           role="menuitem">
            <img src="{{ asset('images/icons/img_home_3_streamline.svg') }}" class="menu-icon">
            <span class="menu-text">Landing Content</span>
        </a>

        <a href="#" class="menu-item">
            <img src="{{ asset('images/icons/img_bullet_list_streamline.svg') }}" class="menu-icon">
            <span class="menu-text">Specifications</span>
        </a>

        <a href="#" class="menu-item">
            <img src="{{ asset('images/icons/img_shipment_remove.svg') }}" class="menu-icon">
            <span class="menu-text">Product Management</span>
        </a>

        <a href="#" class="menu-item">
            <img src="{{ asset('images/icons/img_news_paper_streamline.svg') }}" class="menu-icon">
            <span class="menu-text">News Management</span>
        </a>
        <div class="sidebar-bottom">
            <a href="#" class="menu-item">
                <img src="{{ asset('images/icons/img_logout_1_streamline.svg') }}" class="menu-icon">
                <span class="menu-text" style="color:#00a1d1;">Sign Out</span>
            </a>
        </div>
    </nav>
</aside>
