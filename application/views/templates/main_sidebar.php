<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  align-items-center">
      <a class="navbar-brand" href="<?= base_url('UserController') ?>">
        <p class="text-primary" style="font-family: 'Dank Mono', monospace; font-size: 24px; font-weight: bolder;"><i class="ni ni-books text-primary"></i> Histories</p>
      </a>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse">
        <div id="data-sidebar">

        </div>
        <hr class='my-3'>
        <ul class='navbar-nav'>
          <li class='nav-item'>
            <a class='nav-link' href='<?= base_url('auth/logout') ?>'>
              <i class='ni ni-user-run text-primary'></i>
              <span class='nav-link-text'>Logout</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>