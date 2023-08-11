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
        <div class="text">Data Nota Dinas</div>
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
                        <th>Tanggal Nota</th>
                        <th>Nota Dari</th>
                        <th>Nomor Surat</th>
                        <th>Perihal</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($account as $users) : ?>
                        <tr>
                            <td style="text-align: center;"><?= $users['id_nota']; ?></td>
                            <td><?= $users['tgl_nota']; ?></td>
                            <td><?= $users['nota_dari']; ?></td>
                            <td><?= $users['nomor_surat']; ?></td>
                            <td><?= $users['perihal']; ?></td>
                            <td style="width: 400px;"><?= $users['keterangan']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


            <div class="pagination">
                <?= $pager->only(['page'])->links() ?>
            </div>
            <br>
            <div style="display: flex;">
                <form action=<?= base_url('ExportNota') ?> method="post">
                    <button type="submit" class="button-download">Download</button>
                </form>
            </div>
        </div>
        </div>
    </section>

</body>

</html>