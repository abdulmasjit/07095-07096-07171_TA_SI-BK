<nav class="navbar navbar-light p-2" style="background: linear-gradient(to right, #1976d2, #00d2ff); box-shadow: 0 2px 4px 0 rgb(0 0 0/10%),0 1px 2px 0 rgb(0 0 0/6%)!important;">
<!-- <nav class="navbar navbar-light p-2" style="background-color: rgb(11, 102, 139); box-shadow: 0px 2px 4px -1px rgb(0 0 0 / 20%), 0px 4px 5px 0px rgb(0 0 0 / 14%), 0px 1px 10px 0px rgb(0 0 0 / 12%);"> -->
    <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
        <a class="navbar-brand" href="<?= SITE_URL; ?>/home" style="color:#ffffff; font-size:20px; font-weight:500;"><i class="fa fa-bars"></i> SIM-BK</a>
        <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="col-12 col-md-4 col-lg-2">
        <!-- No Content -->
    </div>
    <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
        <div class="dropdown">
        <button style="background:#ffffff;" class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
          Hello, <?= $_SESSION['user']['nama'] ?>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="<?= SITE_URL ?>/auth/logout">Logout</a></li>
        </ul>
      </div>
  </div>
</nav>