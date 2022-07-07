<section class="container mt-n5">
  <h2 class="text-bold text-uppercase">Kuli Favorit saya</h2>

  <?= $this->session->flashdata('pesan'); ?>

  <div class="row justify-content-around mt-5">
    <?php if (empty($favorit)) : ?>
      <p class="text-light lead">Anda belum memfavoritkan Kuli</p>
    <?php endif; ?>
    <?php foreach ($favorit as $f) : ?>
      <div class="col-lg-3 col-md-4 col-sm-4 col-6">
        <div class="card shadow w-80">
          <div class="card-body">

            <div class="d-flex justify-content-center">
              <img src="<?= base_url('assets/img/produk/') . $f['foto_produk'] ?>" alt="" class="img-fluid mb-4 shadow">
            </div>
            <div class="text-center">
              <h3><?= $f['nama_produk']; ?></h3>
            </div>

            <div class="d-flex justify-content-center">
              <div class="btn btn-cart btn-dark">
                <a href="produk/d-produk.php" class="text-white">
                  <i data-feather="shopping-cart"></i>
                </a>
              </div>
            </div>

          </div>

          <div class="d-flex justify-content-center">
            <a href="<?= base_url('favorit/delete/') . $f['id_favorit']; ?>" class="btn btn-sm btn-danger btn-delete" data-toggle="tooltip" data-placement="right" title="Hapus dari Favorit" id="info">
              <i data-feather="trash"></i>
            </a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

</section>