</style>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4 sidebar-no-expand bg-light">
  <!-- Brand Logo -->
  <a href="<?php echo base_url ?>admin" class="brand-link bg-transparent text-sm shadow-sm">
    <img src="<?php echo validate_image($_settings->info('logo')) ?>" alt="Store Logo"
      class="brand-image img-circle elevation-3 bg-white"
      style="width: 1.8rem;height: 1.8rem;max-height: unset;object-fit:scale-down;object-position:center center">
    <span class="brand-text font-weight-light"><?php echo $_settings->info('short_name') ?></span>
  </a>

  <!-- Sidebar Section -->
  <div
    class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
    <div class="os-resize-observer-host observed">
      <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
    </div>
    <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
      <div class="os-resize-observer"></div>
    </div>
    <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 646px;"></div>
    <div class="os-padding">
      <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
        <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">

          <!-- Sidebar User Panel (optional, may contain user profile) -->
          <div class="clearfix"></div>

          <!-- Sidebar Menu Section -->
          <nav class="mt-4">
            <!-- Sidebar Menu Items -->
            <ul
              class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child"
              data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item dropdown">
                <a href="./" class="nav-link nav-home">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>

              <!-- Archives List Menu Item -->
              <li class="nav-item">
                <a href="<?php echo base_url ?>admin/?page=archives" class="nav-link nav-archives">
                  <i class="nav-icon fas fa-archive"></i>
                  <p>Archives List</p>
                </a>
              </li>

              <!-- Student List Menu Item -->
              <li class="nav-item">
                <a href="<?php echo base_url ?>admin/?page=students" class="nav-link nav-students">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Student List</p>
                </a>
              </li>

              <!-- Conditional Items for Admin Users Only -->
              <?php if ($_settings->userdata('type')): ?>
                <li class="nav-header">Maintenance</li>

                <!-- Department List Menu Item (for Admin) -->
                <li class="nav-item dropdown">
                  <a href="<?php echo base_url ?>admin/?page=departments" class="nav-link nav-departments">
                    <i class="nav-icon fas fa-th-list"></i>
                    <p>Department List</p>
                  </a>
                </li>

                <!-- Curriculum List Menu Item (for Admin) -->
                <li class="nav-item dropdown">
                  <a href="<?php echo base_url ?>admin/?page=curriculum" class="nav-link nav-curriculum">
                    <i class="nav-icon fas fa-scroll"></i>
                    <p>Curriculum List</p>
                  </a>
                </li>

                <!-- User List Menu Item (for Admin) -->
                <li class="nav-item dropdown">
                  <a href="<?php echo base_url ?>admin/?page=user/list" class="nav-link nav-user_list">
                    <i class="nav-icon fas fa-users-cog"></i>
                    <p>User List</p>
                  </a>
                </li>

                <!-- System Settings Menu Item (for Admin) -->
                <li class="nav-item dropdown">
                  <a href="<?php echo base_url ?>admin/?page=system_info" class="nav-link nav-system_info">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>Settings</p>
                  </a>
                </li>
              <?php endif; ?>

            </ul>
          </nav>
          <!-- End Sidebar Menu Section -->

        </div>
      </div>
    </div>

    <!-- Scrollbars for Sidebar (Custom Scrollbars) -->
    <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
      <div class="os-scrollbar-track">
        <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
      </div>
    </div>
    <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
      <div class="os-scrollbar-track">
        <div class="os-scrollbar-handle" style="height: 55.017%; transform: translate(0px, 0px);"></div>
      </div>
    </div>
    <div class="os-scrollbar-corner"></div>
  </div>
  <!-- /.sidebar -->
</aside>

<script>
  var page;

  $(document).ready(function () {
    // Determine the current page from the URL parameter
    page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
    page = page.replace(/\//gi, '_');  // Sanitize the page name by replacing slashes

    // Highlight the active page link in the sidebar
    if ($('.nav-link.nav-' + page).length > 0) {
      $('.nav-link.nav-' + page).addClass('active')  // Add active class to the current menu item

      // If the current menu item is part of a treeview (dropdown), open it
      if ($('.nav-link.nav-' + page).hasClass('tree-item') == true) {
        $('.nav-link.nav-' + page).closest('.nav-treeview').siblings('a').addClass('active')  // Activate parent menu item
        $('.nav-link.nav-' + page).closest('.nav-treeview').parent().addClass('menu-open')  // Open the treeview menu
      }
      if ($('.nav-link.nav-' + page).hasClass('nav-is-tree') == true) {
        $('.nav-link.nav-' + page).parent().addClass('menu-open')  // Open treeview for menu items with submenus
      }
    }

    // Handle click on 'receive-nav' to show modal for entering tracking number
    $('#receive-nav').click(function () {
      $('#uni_modal').on('shown.bs.modal', function () {
        $('#find-transaction [name="tracking_code"]').focus();  // Focus on the tracking code input field when modal is shown
      });
      uni_modal("Enter Tracking Number", "transaction/find_transaction.php");  // Open the modal for finding a transaction
    });
  })
</script>