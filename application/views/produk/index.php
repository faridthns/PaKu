<section class="container mt-n5">
  <div class="d-flex justify-content-between">
    <h2 class="text-bold text-uppercase mb-3">Daftar Kuli</h2>

    <a href="<?= base_url('produk/tambahproduk'); ?>" class="btn btn-sm btn-outline-light mb-2" data-toggle="tooltip" data-placement="top" title="Tambah Kuli" id="tambah">
      <i data-feather="plus"></i>
    </a>
  </div>

  <div class="row">
    <div class="col-12">
      <?= $this->session->flashdata('pesan'); ?>
    </div>
    <div class="card col-12" style="overflow: auto;">
      <div class="card-body">
        <table class="table table-borderless text-dark" id="dataTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Gambar</th>
              <th>Nama Kuli</th>
              <th>Harga</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php $i = 1;
            foreach ($produk as $p) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td>
                  <img src="assets/img/produk/<?= $p['foto_produk']; ?>" alt="<?= $p['foto_produk']; ?>" class="shadow" width="100px" />
                </td>
                <td><?= $p['nama_produk']; ?></td>
                <td>Rp. <?= rupiah($p['harga']); ?> ,-</td>
                <td>
                  <a href="<?= base_url('produk/editProduk/') . $p['id_produk']; ?>" class="btn btn-sm btn-outline-warning mb-2" data-toggle="tooltip" data-placement="top" title="Edit Produk" id="edit">
                    <i data-feather="edit"></i>
                  </a>

                  <button type="button" class="btn btn-sm btn-outline-danger mb-2 hapus-produk" data-toggle="modal" data-target="#dl-produk" data-id="<?= $p['id_produk']; ?>">
                    <a href="#" class="text-danger hapus-produk" data-toggle="tooltip" data-placement="top" title="Hapus Kuli" id="hapus">
                      <i data-feather="trash"></i>
                    </a>
                  </button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <div>
          <a href="<?= base_url('produk/cetak_produk'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Print </a>
          <a href="<?= base_url('produk/laporan_produk_pdf'); ?>" class="btn btn-warning mb-3"><i class="far fa-file-pdf"></i> PDF </a>

        </div>
      </div>
    </div>
  </div>

  </div>
</section>

<!-- modal for delete category -->
<div class="modal fade" id="dl-produk" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="lead">Yakin mau dihapus?</p>
      </div>
      <div class=" modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Tutup
        </button>
        <a href="#" class="btn btn-danger" id="hapus-produk">Hapus</a>
      </div>
    </div>
  </div>
</div>