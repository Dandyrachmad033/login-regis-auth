<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href=<?= base_url('images/logos.jpg') ?>>

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href=<?= base_url('css/dashboard.css') ?>>
    <link rel="stylesheet" href=<?= base_url('css/nota_dinas.css') ?>>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    include('sidebar.php');
    ?>

    <section class="home-section">
        <div class="text">Nota Dinas</div>
        <div class="book">

            <form action=<?= base_url('Increase') ?> method="post">
                <div class="two-field">

                    <div class="form-group">
                        <label for="tanggalSurat">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>

                    <div class="form-group">
                        <label for="suratDari">Dari</label>
                        <input type="text" class="form-control" id="dari" name="dari" placeholder="Dari" required>
                    </div>
                </div>
                <div class="two-field">
                    <div class="form-group">
                        <label for="suratDari">Perihal</label>
                        <input type="text" class="form-control" id="perihal" name="perihal" placeholder="Masukkan Perihal" required>
                    </div>
                    <div class="form-group">
                        <label for="suratDari">Nomor Surat</label>
                        <input type="text" class="form-control" id="nomorsurat" name="nomorsurat" placeholder="Masukkan Nomor Surat" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nomorSurat">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" placeholder="keterangan" rows="3" cols="50"></textarea>
                </div>



                <button type="submit">Tambahkan Data</button>



            </form>
        </div>
    </section>
</body>

</html>