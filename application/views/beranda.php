<section class="bg-white">
  <div class="container">
    <h1>Cari Jasa Kuli Terbaik Dengan Cepat dan Mudah </a>
    </h1>

    <div class="row justify-content-around">
      <?php foreach ($produk as $u) : ?>
        <div class="col-md-4 col-6">
          <div class="card shadow w-80">
            <div class="card-body">
              <div class="d-flex">
                <a href="<?= base_url('produk/dProduk/') . $u['id_produk']; ?>" class="text-center">
                  <img src="<?= base_url('assets/img/produk/') . $u['foto_produk']; ?>" alt="" class="img-fluid mb-4 shadow">
                </a>
              </div>
              <div class="text-center">
                <h3><?= $u['nama_produk']; ?></h3>
                <p>
                  Uang Muka<br>
                  Rp. <?= rupiah($u['harga']); ?> ,-
                </p>
              </div>

              <?php if ($this->session->userdata('role_id') == 2) : ?>
                <div class="d-flex justify-content-center bg-info">
                  <div class="btn btn-cart btn-dark shadow" title="Info Produk">
                    <a href="<?= base_url('produk/dProduk/') . $u['id_produk']; ?>" class="text-white">
                      <i data-feather="info" stroke-width="1"></i>
                    </a>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

</div>
</div>
</section>