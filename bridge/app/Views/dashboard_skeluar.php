<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href=<?= base_url('images/logos.jpg') ?>>

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href=<?= base_url('css/dashboard.css') ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

    <?php
    include('sidebar.php');
    ?>

    <section class="home-section">
        <div class="text">Data Surat Keluar</div>
        <div class="book">
            <p>Page <?= $currentpage ?> of <?= $totalpages ?></p>
            <form action="<?= base_url('Load') ?>" method="post" enctype="multipart/form-data">
                <input type="file" name="excelFile" accept=".xlsx, .xls">
                <input type="submit" value="Upload">
            </form>
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Kategori</th>
                        <th>Tanggal Diterima</th>
                        <th>Tujuan</th>
                        <th>Tanggal Surat</th>
                        <th>Perihal</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($account as $users) : ?>
                        <tr>
                            <td style="text-align: center;"><?= $users['id_suratkeluar']; ?></td>
                            <td><?= $users['kategori']; ?></td>
                            <td><?= $users['tgl_terima']; ?></td>
                            <td><?= $users['tujuan']; ?></td>
                            <td><?= $users['tgl_surat']; ?></td>
                            <td style="width: 400px;"><?= $users['perihal']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br>
            <div style="display: flex;">
                <form action=<?= base_url('ExportKeluar') ?> method="post">
                    <button type="submit" class="button-download">Download</button>
                </form>
            </div>
            <br>


        </div>
        <div class="pagination">
            <?= $pager->only(['page'])->links() ?>
        </div>
        </div>
    </section>

</body>

</html>