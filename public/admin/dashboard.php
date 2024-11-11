<?php

session_start();

require_once (__DIR__ . '/../../src/Facades/Route.php');
require_once (__DIR__ . '/../../src/Facades/FlashSession.php');
require_once (__DIR__ . '/../../src/Facades/AdminAuth.php');
require_once (__DIR__ . '/../../src/Repositories/UserAdminRepositoryImpl.php');
require_once (__DIR__ . '/../../src/Repositories/InformationRepositoryImpl.php');

if (!AdminAuth::isLogged()) {
    Route::redirect('admin/');
}

$informationRepository = new InformationRepositoryImpl();

$unVerifiedPosts = $informationRepository->getNotVerified();

include (__DIR__ . '/../../src/Templates/header.php');
?>

<main>
  <div class="container mt-5">
    <h4 class="py-3">Informasi</h4>
    <?php if (FlashSession::isAny()): ?>
      <p><?= FlashSession::get(); ?></p>
    <?php endif; ?>
    <div class="table-responsive">
      <table class="table">
        <thead class="thead-light">
          <tr class="table-secondary">
            <th scope="col">No</th>
            <th scope="col">Tanggal Terjadi</th>
            <th scope="col">Tanggal Laporan</th>
            <th scope="col">Kronologi</th>
            <th scope="col">Tempat</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody class="customtable">
          <?php foreach ($unVerifiedPosts as $key => $information): ?>
            <tr>
              <td><?= $key + 1; ?></td>
              <td><?= $information->date_occured ?></td>
              <td><?= $information->date_report ?></td>
              <td><?= $information->chronology ?></td>
              <td><?= $information->place ?></td>
              <td><a href="<?= Route::createUrl('admin/verified-post.php?id=' . $information->id) ?>" class="btn btn-primary">Approve</a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    </table>

    <section>
      <a clsas="btn btn-danger" href="<?= Route::createUrl('logout.php') ?>">Logout</a>
    </section>
</main>

<?php include (__DIR__ . '/../../src/Templates/footer.php'); ?>
