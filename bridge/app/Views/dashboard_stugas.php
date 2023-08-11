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
        <div class="text">Data Surat Tugas</div>
        <div class="book">
            <div class="scroll-table">

                <p>Page <?= $currentpage ?> of <?= $totalpages ?></p>
                <form action="<?= base_url('Load') ?>" method="post" enctype="multipart/form-data">
                    <input type="file" name="excelFile" accept=".xlsx, .xls">
                    <input type="submit" value="Upload">
                </form>
                <table style="width: 200%;">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>No Surat Tugas</th>
                            <th>No Dasar Surat</th>
                            <th>Nama Pegawai</th>
                            <th>Tanggal Dasar Surat</th>
                            <th>Maksud Surat</th>
                            <th>Tempat Berangkat</th>
                            <th>Tempat Tujuan</th>
                            <th>Lama Perjalanan</th>
                            <th>Tanggal Berangkat</th>
                            <th>Tanggal Pulang</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($account as $users) : ?>
                            <tr>
                                <td style="text-align: center;"><?= $users['id_stugas']; ?></td>
                                <td><?= $users['nomor_stugas']; ?></td>
                                <td><?= $users['no_dasar_stugas']; ?></td>
                                <td><?= $users['kategori']; ?></td>
                                <td><?= $users['tgl_dasarsurat']; ?></td>
                                <td><?= $users['maksud_stugas']; ?></td>
                                <td><?= $users['tempat_brkt']; ?></td>
                                <td><?= $users['tempat_tujuan']; ?></td>
                                <td><?= $users['lama_perjalanan']; ?></td>
                                <td><?= $users['tgl_berangkat']; ?></td>
                                <td><?= $users['tgl_pulang']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <br>


                <div class="pagination">
                    <?= $pager->only(['page'])->links() ?>
                </div>
            </div>
            <br>
            <div style="display: flex;">
                <form action=<?= base_url('ExportTugas') ?> method="post">
                    <button type="submit" class="button-download">Download</button>
                </form>
            </div>
        </div>
        </div>
    </section>

</body>

</html>