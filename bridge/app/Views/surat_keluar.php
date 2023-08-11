<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href=<?= base_url('images/logos.jpg') ?>>

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href=<?= base_url('css/dashboard.css') ?>>
    <link rel="stylesheet" href=<?= base_url('css/surat_keluar.css') ?>>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    include('sidebar.php');
    ?>

    <section class="home-section">
        <div class="text">Surat Keluar</div>
        <div class="book">
            <form action=<?= base_url('PlusData') ?> method="post">
                <div class="two-field">
                    <div class="form-group">
                        <label for="suratDari">Kategori</label>
                        <div class="wrapper">
                            <div class="select-container">
                                <select class="form-control" id="kategori" name="kategori">
                                    <option></option>
                                    <option>Surat</option>
                                    <option>Undangan</option>
                                    <option>Permintaan Data</option>
                                    <option>Permohonan</option>
                                    <option>Lamaran pekerjaan</option>
                                    <option>Perijinan</option>
                                    <option>Surat pengantar</option>
                                    <option>Pengaduan</option>
                                    <option>Berita Acara</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanggalSurat">Tanggal Diterima</label>
                        <input type="date" class="form-control" id="tanggalterima" name="tanggalterima" required>
                    </div>
                </div>
                <div class="two-field">
                    <div class="form-group">
                        <label for="suratDari">Tujuan</label>
                        <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Masukkan Tujuan" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggalSurat">Tanggal Surat</label>
                        <input type="date" class="form-control" id="tanggalsurat" name="tanggalsurat" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nomorSurat">Perihal</label>
                    <textarea class="form-control" id="perihal" name="perihal" placeholder="perihal" rows="3" cols="50"></textarea>
                </div>



                <button type="submit">Tambahkan Data</button>



            </form>
        </div>
    </section>

</body>

</html>