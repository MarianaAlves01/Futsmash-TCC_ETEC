<header class="main-header" >
  <!-- Logo -->
  <a style="background-color: black;" href="home.php" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>TCC</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>FUTSMASH</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            
            <span class="hidden-xs">Olá, <?php echo $admin['firstname'].' '.$admin['lastname']; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li style="background-color: #0e0e17;" class="user-header">
              <p>
                <?php echo $admin['firstname'].' '.$admin['lastname']; ?>
                <small>Membro desde <?php echo strftime('%B de %Y', strtotime($admin['created_on'])); ?></small>
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="#profile" style='border-radius: 2rem;' data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile"> Atualizar</a>
              </div>
              <div class="pull-right">
                <a href="../logout.php" style='border-radius: 2rem;' class="btn btn-default btn-flat">Sair</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<?php include 'includes/profile_modal.php'; ?>