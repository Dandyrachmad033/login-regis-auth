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
    <div class="text">Data Surat Masuk</div>
    <div class="book">
      <p>Page <?= $currentpage ?> of <?= $totalpages ?></p>
      <form action="<?= base_url('Load') ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="excelFile" accept=".xlsx, .xls">
        <input type="submit" value="Upload">
      </form>
      <div class="scroll-table fixed_header" id="header-container">
        <table>
          <thead>
            <tr>
              <th>NO</th>
              <th style="max-width: 250px;">Asal Surat</th>
              <th>No.surat</th>
              <th style="max-width: 500px; ">Tanggal Surat</th>
              <th style="max-width: 500px; ">Tanggal Terima</th>
              <th style="max-width: 500px; word-wrap: break-word;">No.Kendali</th>
              <th>Perihal</th>
              <th style="max-width: 500px; word-wrap: break-word;">Tujuan Kadin</th>
              <th style="max-width: 500px; word-wrap: break-word;">Disposisi Kadin</th>
              <th style="max-width: 500px; ">Tanggal Disposisi</th>
              <th style="max-width: 500px; word-wrap: break-word;">Tujuan Kabid</th>
              <th style="max-width: 500px; word-wrap: break-word;">Disposisi Kabid</th>
              <th style="max-width: 500px; ">Tanggal Kabid</th>
              <th style="max-width: 500px; word-wrap: break-word;">Tujuan Kasubag</th>
              <th style="max-width: 500px; word-wrap: break-word;">Disposisi Kasubag</th>
              <th style="max-width: 500px; ">Tanggal Kasubag</th>
              <th style="max-width: 500px; word-wrap: break-word;">Tujuan Kasi</th>
              <th>Disposisi kasi</th>
              <th style="max-width: 500px; ">Tanggal Kasi</th>
              <th style="max-width: 500px; word-wrap: break-word;">Tujuan sekdin</th>
              <th style="max-width: 500px; word-wrap: break-word;">Disposisi Sekdin</th>
              <th style="max-width: 500px; ">Tanggal Sekretaris</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($account as $users) : ?>
              <tr>
                <td style="text-align: center;"><?= $users['id']; ?></td>
                <td style="max-width:600px word-wrap: break-word;"><?= $users['surat_dari']; ?></td>
                <td style="max-width: 600px word-wrap: break-word;"><?= $users['nomor_surat']; ?></td>
                <td style="max-width: 500px; word-wrap: break-word: "><?= $users['tgl_surat']; ?></td>
                <td style="max-width:600px "><?= $users['tgl_terima']; ?></td>
                <td><?= $users['nomor_kendali']; ?></td>
                <td style="max-width: 300px; word-wrap: break-word"><?= $users['perihal']; ?></td>
                <td style="max-width:600px word-wrap: break-word;"><?= $users['tuju_kadin']; ?></td>
                <td style="word-wrap: break-word; max-width: 20px"><?= $users['disposisi']; ?></td>
                <td style="max-width:600px "><?= $users['tgl_disposisi']; ?></td>
                <td style="max-width:600px word-wrap: break-word;"><?= $users['tuju_kabid']; ?></td>
                <td style=" max-width:600px word-wrap: break-word; "><?= $users['kabid']; ?></td>
                <td style="max-width:600px "><?= $users['tgl_kabid']; ?></td>
                <td style="max-width:600px word-wrap: break-word;"><?= $users['tuju_kasubag']; ?></td>
                <td style=" max-width:600px word-wrap: break-word;"><?= $users['kasubag']; ?></td>
                <td style="max-width:600px "><?= $users['tgl_kasubag']; ?></td>
                <td style="max-width:600px word-wrap: break-word;"><?= $users['tuju_kasi']; ?></td>
                <td style="word-wrap: break-word;"><?= $users['kasi']; ?></td>
                <td style="max-width:600px "><?= $users['tgl_kasi']; ?></td>
                <td style="max-width: 600px word-wrap: break-word;"><?= $users['tuju_sekdin']; ?></td>
                <td style="max-width:600px word-wrap: break-word;"><?= $users['sekre']; ?></td>
                <td style="max-width:600px "><?= $users['tgl_sekre']; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <br>
      <div style="display: flex;">
        <form action=<?= base_url('Download') ?> method="post">
          <button type="submit" class="button-download">Download</button>
        </form>

      </div>
      <div class="pagination">
        <?= $pager->only(['page'])->links() ?>
      </div>

    </div>
  </section>
  <script src="<?= base_url('js/script.js') ?>"></script>
</body>

</html>