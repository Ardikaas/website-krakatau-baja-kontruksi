<div class="SidebarandTopbarAdmin">
  <button class="hamburger" onclick="toggleSidebar()">☰</button>
  <div class="sidebar-overlay" onclick="closeSidebar()"></div>

  <div class="content-wrapper">
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
      <nav class="sidebar-menu">
        <a href="#" class="menu-item active">
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
            <span class="menu-text logout">Sign Out</span>
          </a>
        </div>
      </nav>
    </aside>

    <!-- Main Area -->
    <div class="main-area">
      <header class="header">
        <img src="{{ asset('images/logo-3.png') }}" alt="Krakatau Logo" class="sidebar-logo">
        
        <div class="fitur-header">

            <div class="search-container">
                <img src="{{ asset('images/icons/img_magnifying_glass.svg') }}" class="search-icon">
                <span class="search-text">Search for menu</span>   
            </div>        
            
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
