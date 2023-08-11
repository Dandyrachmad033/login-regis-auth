<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href=<?= base_url('images/logos.jpg') ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href=<?= base_url('css/dashboard.css') ?>>


</head>

<body>
    <?php
    include('sidebar.php');
    ?>

    <section class="home-section">
        <div class="text">Siarvi Convert</div>
        <div class="book">
            <div class="pagination-info">
                <p>Page <?= $currentpage ?> of <?= $totalpages ?></p>
            </div>
            <div class="scroll-table fixed_header">

                <center>
                    <form action="Upload" method="post" enctype="multipart/form-data">
                        <input type="file" name="excelFile" accept=".xlsx, .xls">
                        <input type="submit" value="Upload">
                    </form>
                    <br>

                    <div class="setara">

                        <form action="Delete" method="post" enctype="multipart/form-data">
                            <input type="submit" value="Delete">
                        </form>
                        <form action="Export" method="post" enctype="multipart/form-data">
                            <input type="submit" value="Download siarvi">
                        </form>

                    </div>

                    <table border="2" style="width: 100%;">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pemeriksaan</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Nama ibu</th>
                            <th>Alamat(KTP)</th>
                            <th>Alamat Domisili</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                        </tr>

                        <?php foreach ($records as $record) : ?>
                            <tr>
                                <td><?php echo $record['id']; ?></td>
                                <td><?php echo $record['tanggal_pemeriksaan']; ?></td>
                                <td><?php echo $record['nama']; ?></td>
                                <td><?php echo $record['NIK']; ?></td>
                                <td><?php echo $record['nama_ibu_kandung']; ?></td>
                                <td><?php echo $record['alamat']; ?></td>
                                <td><?php echo $record['alamat_domisili']; ?></td>
                                <td><?php echo $record['tanggal_lahir']; ?></td>
                                <td style="width: fit-content;"><?php echo $record['jenis_kelamin']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>



                </center>
            </div>
            <center>

                <div class="pagination">
                    <?= $pager->links() ?>
                </div>
            </center>
        </div>


    </section>

    <script>
        // Fungsi untuk mengganti query parameter 'page' pada URL dan berpindah halaman
        function goToPage(pageNumber) {
            const currentURL = new URL(window.location.href);
            currentURL.searchParams.set('page', pageNumber);
            window.location.href = currentURL.href;
        }
    </script>
</body>

</html>