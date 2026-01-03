<header class="admin-topbar">
    <div class="admin-topbar-left">
        {{-- Toggle sidebar (mobile) --}}
        <button
            type="button"
            class="admin-topbar-toggle"
            onclick="toggleSidebar()"
        >
            ☰
        </button>

        {{-- Search --}}
        <div class="admin-topbar-search">
            <img
                src="{{ asset('images/icons/img_magnifying_glass.svg') }}"
                alt="Search"
            >
            <span>Search for menu</span>
        </div>
    </div>

    <div class="admin-topbar-right">
        <div class="admin-topbar-divider"></div>

        <div class="admin-topbar-user">
            <img
                src="{{ asset('images/icons/icon-1.png') }}"
                alt="User"
            >
            <span>{{ auth()->user()->name ?? 'Admin User' }}</span>
        </div>
    </div>
</header>
