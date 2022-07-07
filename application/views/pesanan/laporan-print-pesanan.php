<!DOCTYPE html>
<html>

<head>
    <title>Data Kuli</title>
</head>

<body>
    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            font-family: Verdana;
            padding: 10px 10px 10px 10px;
        }

        .table-data th {
            background-color: grey;
        }

        h3 {
            font-family: Verdana;
        }
    </style>
    <h3>
        <center>LAPORAN DATA KULI</center>
    </h3>
    <br />
    <table class="table-data">
        <thead>
            <tr>
                <th>Penerima</th>
                <th>Lokasi</th>
                <th>No Telpon</th>
                <th>Pembayaran</th>
                <th>No Telp Kuli</th>
                <th>Grup Kuli</th>
                <th>Total Pembayaran</th>
                <th>Bukti Transfer</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($pesanan as $p) {
            ?>
                <tr>
                    <td><?= $p['username']; ?></td>
                    <td><?= $p['alamat']; ?></td>
                    <td><?= $p['telepon_penerima']; ?></td>
                    <td><?= $p['nama_bank']; ?></td>
                    <td><?= $p['resi_pengiriman']; ?></td>
                    <td><?= $p['nama_produk']; ?></td>
                    <td><?= $p['total_bayar']; ?></td>
                    <td><?= $p['bukti_transfer']; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>