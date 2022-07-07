<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css">

  <!-- My CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/main.css">

  <!-- icon -->
  <link rel="shortcut icon" href="<?= base_url('assets/'); ?>img/logo.png" type="image/x-icon">
  <title><?= $judul; ?></title>
</head>

<body>

  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light mt-0">
    <div class="container-md">
      <a href="<?= base_url(); ?>" class="navbar-brand"><img src="<?= base_url('assets/'); ?>img/Logo-Text-putih.png" alt="logo" width="150px"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="#nav" aria-expanded="false" aria-label="Toggle navigation" id="btn-nav">
        <!-- <span class=" navbar-toggler-icon"></span> -->
        <i data-feather="menu" id="show"></i>
        <i data-feather="x" id="hidden" class="d-none"></i>
      </button>

      <div class="collapse navbar-collapse" id="nav">
        <div class="navbar-nav ml-auto">
          <a href="<?= base_url('tamu'); ?>" class="nav-item nav-link text-white">Beranda</a>
        </div>
      </div>

      <div class="collapse navbar-collapse float-right" id="nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="<?= base_url('auth') ?>" id="menuProfile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span data-feather="user" stroke-width="1"></span>
            </a>

            <div class="dropdown-menu" aria-labelledby="menuProfile">
              <a class="dropdown-item" href="<?= base_url('auth') ?>">
                Login
              </a>
              <hr>
              <a class="dropdown-item" href="<?= base_url('auth/registrasi') ?>">
                Registrasi
              </a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- end navbar -->

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
                  <a href="<?= base_url('produk/dProduk'); ?>" class="text-center">
                    <img src="<?= base_url('assets/img/produk/') . $u['foto_produk']; ?>" alt="" class="img-fluid mb-4 shadow">
                  </a>
                </div>
                <div class="text-center">
                  <h3><?= $u['nama_produk']; ?></h3>
                  <p>Rp. <?= rupiah($u['harga']); ?> ,-</p>
                </div>

                <?php if (!$this->session->userdata('role_id') == 1) : ?>
                  <div class="d-flex justify-content-center bg-info">
                    <div class="btn btn-cart btn-dark shadow">
                      <a href="<?= base_url('auth'); ?>" class="text-white">
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

  <footer>
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-md-6">
          <h2>PAKU</h2>
          <p><?= $kontak['alamat']; ?></p>
        </div>
        <div class="col-md-6">
          <h2>Social Media</h2>

          <a href="<?= $kontak['facebook']; ?>" class="mr-3">
            <i data-feather="facebook"></i>
          </a>
          <a href="<?= $kontak['instagram']; ?>">
            <i data-feather="instagram"></i>
          </a>
        </div>

        <div class="col-md-6 mt-5">
          <h2>Kontak Kami</h2>

          <div class="d-flex flex-column">
            <div class="mb-3">
              <i data-feather="phone" class="mr-2"></i>
              <?= $kontak['telepon']; ?>
            </div>
            <div class="mb-3">
              <img src="<?= base_url('assets/'); ?>img/line.png" width="25px" class="mr-2">
              <?= $kontak['line']; ?>
            </div>
            <div class="mb-3">
              <i data-feather="mail" class="mr-2"></i>
              <?= $kontak['email']; ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </footer>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="<?= base_url('assets/'); ?>js/jquery-3.5.1.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/popper.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/feather.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/froala_editor.pkgd.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/datatables.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/main.js"></script>


</body>

</html>