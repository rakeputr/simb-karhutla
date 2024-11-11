<?php

session_start();

require_once (__DIR__ . '/src/Facades/Route.php');
require_once (__DIR__ . '/src/Facades/Auth.php');
require_once (__DIR__ . '/src/Repositories/InformationRepositoryImpl.php');

$informationRepository = new InformationRepositoryImpl();

if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
    if (!Auth::isLogged()) {
        Route::redirect('info.php');
    }

    $user_id = Auth::getLoggedUser()->id;
    $dateOccured = $_REQUEST['date_occured'];
    $place = $_REQUEST['place'];
    $chronology = $_REQUEST['chronology'];

    $informationRepository->insert($user_id, $dateOccured, $place, $chronology);

    Route::redirect('info.php');
}

?>

<?php include (__DIR__ . '/src/Templates/header.php'); ?>

<main>
  <?php include (__DIR__ . '/src/Templates/navbar.php') ?>

  <div class="container mt-5">
    <h4 class="py-3">Informasi</h4>
    <div class="table-responsive">
      <table class="table">
        <thead class="thead-light">
          <tr class="table-secondary">
            <th scope="col">No</th>
            <th scope="col">Tanggal Terjadi</th>
            <th scope="col">Tanggal Laporan</th>
            <th scope="col">Kronologi</th>
            <th scope="col">Tempat</th>
          </tr>
        </thead>
        <tbody class="customtable">
          <?php foreach ($informationRepository->getVerified() as $key => $information): ?>
            <tr>
              <td><?= $key + 1; ?></td>
              <td><?= $information->date_occured ?></td>
              <td><?= $information->date_report ?></td>
              <td><?= $information->chronology ?></td>
              <td><?= $information->place ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <section class="container mt-3">
    <h4 class="py-3">Buat Laporan</h4>
    <?php if (Auth::isLogged()): ?>
      <form method="post">
        <div class="mb-3">
          <label for="date_occured" class="form-label">Tanggal Terjadi</label>
          <input type="datetime-local" class="form-control" id="date_occured" name="date_occured" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="place" class="form-label">Tempat</label>
          <input type="text" class="form-control" id="place" name="place" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="chronology" class="form-label">Kronologi</label>
          <textarea class="form-control" name="chronology" id="chronology" aria-label="With textarea"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
      </form>
    <?php else: ?>
      <p><a class="text-primary underline" href="<?= Route::createUrl('login.php'); ?>"><u>Login</u></a> untuk buat laporan.</p>
    <?php endif; ?>
  </section>
</main>

<?php include (__DIR__ . '/src/Templates/footer.php') ?>
