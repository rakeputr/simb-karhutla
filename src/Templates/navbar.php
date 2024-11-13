<?php
require_once(__DIR__ . '/../Facades/Auth.php');
require_once(__DIR__ . '/../Facades/Route.php');
?>
<nav class="navbar navbar-expand-lg bg-dark-subtle shadow-lg">
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
        <li class="nav-item active">
          <a class="nav-link" href="index.php#news">News</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="gtk.html">Get To Know</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#portfolio">About Us</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="info.php">Pelaporan</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="admin/dashboard.php">Admin(doang)</a>
        </li>

        <?php if (Auth::isLogged()): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= Route::createUrl('logout.php') ?>">Logout</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>