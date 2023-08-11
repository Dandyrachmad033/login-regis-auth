<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="icon" href=<?= base_url('images/logos.jpg') ?>>
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href=<?= base_url('css/dashboard.css') ?>>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php
  include('sidebar.php');
  ?>
  <section class="home-section">
    <div class="text">Surat P2PM</div>
    <div style="padding-bottom: 1rem">
      <div class=" book">
        <form action=<?= base_url('AddData') ?> method="post">
          <div class="two-field">
            <div class="form-group">
              <label for="suratDari">Surat Dari</label>
              <input type="text" class="form-control" id="suratDari" name="suratDari" placeholder="Masukkan Nama Surat Dari" required>
            </div>
            <div class="form-group">
              <label for="nomorSurat">Nomor Surat</label>
              <input type="text" class="form-control" id="nomorSurat" name="nomorSurat" placeholder="Masukkan Nomor Surat" required>
            </div>
          </div>
          <div class="two-field">
            <div class="form-group">
              <label for="tanggalSurat">Tanggal Surat</label>
              <input type="date" class="form-control" id="tanggalsurat" name="tanggalsurat" required>
            </div>
            <div class="form-group">
              <label for="tanggalSurat">Tanggal Terima</label>
              <input type="date" class="form-control" id="tanggalterima" name="tanggalterima" required>
            </div>
          </div>
          <div class="two-field">
            <div class="form-group">
              <label for="suratDari">Nomor Kendali</label>
              <input type="text" class="form-control" id="kendali" name="kendali" placeholder="Masukkan Nomor Kendali" required>
            </div>
            <div class="form-group">
              <label for="suratDari">Tujuan Kadin</label>
              <input type="text" class="form-control" id="tujudisposisi" name="tujudisposisi" placeholder="Masukkan Tujuan" required>
            </div>
          </div>
          <div class="two-field">
            <div class="form-group">
              <label for="suratDari">Disposisi Kadin</label>
              <input type="text" class="form-control" id="Disposisi" name="Disposisi" placeholder="Masukkan Disposisi" required>
            </div>
            <div class="form-group">
              <label for="nomorSurat">Masukkan Tanggal</label>
              <input type="date" class="form-control" id="tgldisposisi" name="tgldisposisi" placeholder="Masukkan Terusan" required>
            </div>
          </div>
          <div class="two-field">
            <div class="form-group">
              <label for="nomorSurat">Perihal</label>
              <textarea class="form-control" id="perihal" name="perihal" placeholder="perihal" rows="4" cols="50"></textarea>
            </div>
          </div>
      </div>
      <div class="book">

        <div class="radio-container">
          <label>
            <input type="checkbox" name="option" value="kabid" />
            Kabid
          </label>
          <label>
            <input type="checkbox" name="option" value="kasubag" />
            Kasubag
          </label>
          <label>
            <input type="checkbox" name="option" value="kasi" />
            Kasi
          </label>
          <label>
            <input type="checkbox" name="option" value="sekre" />
            Sekretaris
          </label>
        </div>
        <div class="hidden-form-container" id="formkabid">
          <div class="two-field">
            <div class="form-group">
              <label for="tanggalSurat">Kabid</label>
              <input type="text" class="form-control" style="width: 250px;" id="formkabid" name="formkabid" placeholder="Masukkan ">
            </div>
            <div class="form-group">
              <label for="tanggalSurat">Tanggal </label>
              <input type="date" class="form-control" style="width: 250px;" id="tanggalkabid" name="tanggalkabid">
            </div>
            <div class="form-group">
              <label for="tanggalSurat">Tujuan Kabid</label>
              <input type="text" class="form-control" style="width: 280px;" id="tujukabid" name="tujukabid" placeholder="Masukkan Tujuan ">
            </div>
          </div>
        </div>
        <div class="hidden-form-container" id="formkasubag">
          <div class="two-field">
            <div class="form-group">
              <label for="tanggalSurat">Kasubag</label>
              <input type="text" class="form-control" style="width: 250px;" id="formkasubag" name="formkasubag" placeholder="Masukkan " size="2">
            </div>
            <div class="form-group">
              <label for="tanggalSurat">Masukkan Tanggal </label>
              <input type="date" class="form-control" style="width: 250px;" id="tanggalkasubag" name="tanggalkasubag">
            </div>
            <div class="form-group">
              <label for="tanggalSurat">Tujuan Kasubag</label>
              <input type="text" class="form-control" style="width: 280px;" id="tujukasubag" name="tujukasubag" placeholder="Masukkan Tujuan ">
            </div>
          </div>
        </div>
        <div class="hidden-form-container" id="formkasi">
          <div class="two-field">
            <div class="form-group">
              <label for="tanggalSurat">Kasi</label>
              <input type="text" class="form-control" style="width: 250px;" id="formkasi" name="formkasi" placeholder="Masukkan ">
            </div>
            <div class="form-group">
              <label for="tanggalSurat">Masukkan Tanggal </label>
              <input type="date" class="form-control" style="width: 250px;" id="tanggalkasi" name="tanggalkasi">
            </div>
            <div class="form-group">
              <label for="tanggalSurat">Tujuan Kasi</label>
              <input type="text" class="form-control" style="width: 280px;" id="tujukasi" name="tujukasi" placeholder="Masukkan Tujuan ">
            </div>
          </div>
        </div>
        <div class="hidden-form-container" id="formsekre">
          <div class="two-field">
            <div class="form-group">
              <label for="tanggalSurat"> Sekdin</label>
              <input type="text" class="form-control" style="width: 250px;" id="formsekre" name="formsekre" placeholder="Masukkan">
            </div>
            <div class="form-group">
              <label for="tanggalSurat">Masukkan Tanggal </label>
              <input type="date" class="form-control" style="width: 250px;" id="tanggalsekre" name="tanggalsekre">
            </div>
            <div class="form-group">
              <label for="tanggalSurat">Tujuan Sekdin</label>
              <input type="text" class="form-control" style="width: 280px;" id="tujusekre" name="tujusekre" placeholder="Masukkan tujuan ">
            </div>
          </div>
        </div>
        <button type="submit">Tambahkan Data</button>
        </form>
      </div>
    </div>
  </section>
  <script>
    const checkboxes = document.querySelectorAll('.radio-container input[type="checkbox"]');
    const formContainers = document.querySelectorAll('.hidden-form-container');

    checkboxes.forEach(checkbox => {
      checkbox.addEventListener('change', () => {
        const value = checkbox.value;
        const formContainer = document.getElementById('form' + value);

        if (checkbox.checked) {
          formContainer.classList.add('visible');
        } else {
          formContainer.classList.remove('visible');
        }
      });
    });
  </script>
</body>

</html>