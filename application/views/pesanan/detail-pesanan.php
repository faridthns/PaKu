<section class="container mt-n5">
  <div class="d-flex justify-content-between">
    <h2 class="text-bold text-uppercase mb-3">detail pemesanan</h2>

    <a href="<?= base_url('pesanan'); ?>" class="btn btn-sm btn-outline-light mb-5" data-toggle="tooltip" data-placement="top" title="Kembali" id="tambah">
      <i data-feather="arrow-left"></i>
    </a>
  </div>

  <div class="card mt-3">
    <div class="card-body">
      <div class="row justify-content-around p-4">
        <div class="col-md-4 col-12 mb-5 ">
          <div class="form-group">
            <label>Penerima</label>
            <p><?= $pesanan['username']; ?></p>
          </div>
        </div>

        <div class="col-md-4 col-12 mb-5">
          <div class="form-group">
            <label>Lokasi Pembangunan</label>
            <p><?= $pesanan['alamat']; ?></p>
          </div>
        </div>

        <div class="col-md-4 col-12 mb-5">
          <div class="form-group">
            <label>No telepon</label>
            <p><?= $pesanan['telepon_penerima']; ?></p>
          </div>
        </div>

        <div class="col-md-4 col-12 mb-5">
          <div class="form-group">
            <label>Pembayaran</label>
            <p><?= $pesanan['nama_bank']; ?></p>
          </div>
        </div>

        <div class="col-md-4 col-12 mb-5">
          <div class="form-group">
            <label>No Telepon kuli </label>
            <p>
              <?php if (empty($pesanan['resi_pengiriman'])) : ?>
                Belum Ditambahkan
              <?php else : ?>
                <?= $pesanan['resi_pengiriman']; ?>
              <?php endif; ?>
            </p>
          </div>
        </div>

        <div class="col-md-4 col-12 mb-5">
          <div class="form-group">
            <label>Grup Kuli</label>
            <p><?= $pesanan['nama_produk']; ?></p>
          </div>
        </div>

        <div class="col-md-4 col-12 mb-5">
          <div class="form-group">
            <label>Total Pembayaran</label>
            <p>Rp. <?= rupiah($pesanan['total_bayar']); ?>,-</p>
          </div>
        </div>

        <div class="col-md-4 col-12 mb-5">
          <div class="form-group">
            <label>Bukti Transfer</label>
            <img src="<?= base_url('assets/img/transfer/') . $pesanan['bukti_transfer']; ?>" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
