<?php
require_once(__DIR__ . '/../Facades/authentication.php');
require_once(__DIR__ . '/../Facades/Route.php');
?>
<style>
/* Warna saat item aktif */
.navbar-nav .nav-link.active {
    color: rgb(255, 140, 0) !important;
}

/* Warna saat item di-hover */
.navbar-nav .nav-link:hover {
    color: rgb(255, 140, 0) !important;
}
</style>
<nav class="navbar navbar-expand-lg bg-light shadow-lg">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <strong>Pantau Api</strong>
    </a>

    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link <?= ($title == "News") ? "active" : ""; ?>" href="news.php">Berita</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= ($title == "Get To Know") ? "active" : ""; ?>" href="gtk.php">Get To Know</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= ($title == "Our Team") ? "active" : ""; ?>" href="ourTeam.php">About Us</a>
        </li>

        <li class="nav-item ">
          <a class="nav-link <?= ($title == "Pelaporan") ? "active" : ""; ?>" href="info.php">Pelaporan</a>
        </li>
        <?php if (isLogged()): ?>
        <?php  if (isAdmin()) : ?>
        <li class="nav-item">
          <a class="nav-link" href="admin/dashboard.php">Admin</a>
        </li>
        <?php endif; ?>
        <?php endif; ?>

        <?php if (isLogged()): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= Route::createUrl('logout.php') ?>">Logout</a>
          </li>
        <?php endif; ?>
        <?php if (!isLogged()): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= Route::createUrl('loginNew.php') ?>">Login</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>