<section class="container">
  <h2 class="text-bold text-uppercase">Konfirmasi Pembayaran</h2>

  <div class="row justify-content-between">
    <div class="col-12 col-md-6 my-3">
      <div class="d-flex">
        <img src="<?= base_url('assets/img/produk/') . $produk['foto_produk']; ?>" alt="<?= $produk['foto_produk'] ?>" class="img-fluid p-produk">

        <div class="text-white ml-3 my-auto">
          <h2 class="text-bold text-uppercase mb-0"><?= $produk['nama_produk']; ?></h2>
          <p class="mb-0">Rp. <?= rupiah($produk['harga']); ?> ,-</p>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-6">
      <div class="card">
        <div class="card-body m-2">
          <h2 class="text-uppercase mb-3">Alamat penerima</h2>

          <form method="POST" action="">
            <input type="hidden" name="id_keranjang" value="<?= $produk['id_keranjang'] ?>">
            <input type="hidden" name="ukuran_produk" value="<?= $produk['ukuran']; ?>">
            <input type="hidden" name="jml_beli" value="<?= $produk['jml_beli']; ?>">
            <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
            <div class="form-group">
              <select class="custom-select" id="konfirmasi-alamat" name='alamat'>
                <option value="">Pilih Alamat</option>
                <?php foreach ($alamat as $al) : ?>
                  <?php $sort_address = explode(',', $al['alamat']); ?>
                  <option value="<?= $al['id_alamat']; ?>"><?= $sort_address[0]; ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('alamat', '<small class="text-danger pl-2">', '</small>'); ?>
            </div>


            

              <h2 class="text-uppercase mt-4 mb-2">Pembayaran</h2>

              <div class="d-flex">
                <?php foreach ($bank as $b) : ?>
                  <div class="form-check mr-3">
                    <input type="radio" name="bank" id="<?= $b['nama_bank']; ?>" class="form-check-input" value="<?= $b['id_bank']; ?>">
                    <label for="<?= $b['nama_bank']; ?>"><?= $b['nama_bank']; ?></label>
                  </div>
                <?php endforeach; ?>
              </div>

              <br>
              <div class="d-flex justify-content-between">
                <p>Subtotal</p>
                <?php $subtotal = $produk['harga'] ?>
                <p>Rp. <?= rupiah($subtotal); ?> ,-</p>
              </div>

              <div class="d-flex justify-content-between mb-3">
                <p>Total Bayar</p>
                <p>Rp. <?= rupiah($subtotal); ?> ,-</p>
                <input type="hidden" name="total_bayar" value="<?= $subtotal; ?>">
              </div>

              <button type="submit" class="btn btn-dark-mediun float-right">Bayar</button>
              <!-- <a href="bayar.html" class="btn btn-dark-mediun float-right">Bayar</a> -->
          </form>
        </div>
      </div>
    </div>
  </div>
</section>