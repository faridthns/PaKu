<section class="container mt-n5">
  <div class="d-flex justify-content-between mb-3">
    <h2 class="text-bold text-uppercase mb-3">Tambah Kuli</h2>

    <a href="<?= base_url('produk'); ?>" class="btn btn-sm btn-outline-light mb-3" data-toggle="tooltip" data-placement="top" title="Kembali" id="tambah">
      <i data-feather="arrow-left"></i>
    </a>
  </div>
  <?= $this->session->flashdata('pesan'); ?>
  <div class="card">
    <div class="card-body p-4">
      <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group pb-3">
          <label for="nama-produk">Kuli</label>
          <input type="text" name="nama_produk" id="nama-produk" class="form-control 
          <?php
          echo form_error('nama_produk') ? "border-danger" : null;
          ?>
          " value="<?= $produk['nama_produk']; ?>" />
          <?= form_error('nama_produk', '<small class="pl-2 text-danger">', '</small>'); ?>
        </div>

        <div class="form-group pb-3">
          <label for="deskripsi">deskripsi produk</label>
          <textarea name="deskripsi" id="deskripsi"><?= $produk['deskripsi_produk']; ?></textarea>
          <?= form_error('deskripsi', '<small class="pl-2 text-danger">', '</small>'); ?>
        </div>

        <div class="form-group pb-3">
          <label for="harga">Harga</label>
          <input type="number" name="harga" id="harga" class="form-control
          <?php
          echo form_error('harga') ? "border-danger" : null;
          ?>
          " value="<?= $produk['harga']; ?>" />
          <?= form_error('harga', '<small class="pl-2 text-danger">', '</small>'); ?>
        </div>

        <div class="form-group">
          <label for="foto">Foto produk</label>
          <input type="file" name="foto" id="foto" class=" form-control-file" onchange="loadFile(event)">
        </div>

        <div class="row">
          <div class="col-md-6 col-12">
            <div class="form-group mt-5">
              <button type="submit" class="btn btn-dark">Simpan</button>
            </div>
          </div>

          <div class="col-md-6 col-12">
            <img id="img" class="img-fluid shadow" src="<?= base_url('assets/img/produk/') . $produk['foto_produk']; ?>">
          </div>
        </div>
      </form>
    </div>
  </div>
</section>