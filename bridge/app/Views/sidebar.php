<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SP2TM</title>
  <link rel="icon" href=<?= base_url('images/logos.jpg') ?>>
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href=<?= base_url('css/dashboard.css') ?>>

</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus icon'></i>
      <div class="logo_name">Dinas Kesehatan P2PM</div>
      <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href=<?= base_url('Dashback') ?>>
          <i class='bx bx-home'></i>
          <span class="links_name">Home</span>
        </a>
        <span class="tooltip">Home</span>
      </li>
      <li>
        <a href=<?= base_url('Menu-one') ?>>
          <i class='bx bx-envelope'></i>
          <span class="links_name">Surat Masuk </span>
        </a>
        <span class="tooltip">Surat Masuk </span>
      </li>

      <!-- <li>

        <i class='bx bx-user'></i>
        <span class="dropdown-btn" class="link_name">Dropdown</span>
        <span class="tooltip">Dropdown </span>
        <div class="dropdown-container">
          <a href="#">Link 1</a>
          <a href="#">Link 2</a>
          <a href="#">Link 3</a>
        </div>
      </li> -->


      <li>
        <a href="<?= base_url('Menu-tree') ?>">
          <i class='bx bx-mail-send'></i>
          <span class="links_name">Surat Keluar</span>
        </a>
        <span class="tooltip">Surat Keluar</span>
      </li>

      <li>
        <a href="<?= base_url('Menu-Five') ?>">
          <i class='bx bx-spreadsheet'></i>
          <span class="links_name">Surat Tugas</span>
        </a>
        <span class="tooltip">Surat Tugas</span>
      </li>

      <li>
        <a href="<?= base_url('Menu-four') ?>">
          <i class='bx bx-note'></i>
          <span class="links_name">Nota Dinas</span>
        </a>
        <span class="tooltip">Nota Dinas</span>
      </li>

      <li>
        <a href="<?= base_url('Menu-two') ?>">
          <i class='bx bx-sync'></i>
          <span class="links_name">Convert Siarvi</span>
        </a>
        <span class="tooltip">Convert Siarvi</span>
      </li>

      <li class="profile">
        <div class="profile-details">
          <img src=<?= base_url('images/profile.png') ?> alt="profileImg">
          <div class="name_job">
            <?php if (isset($username)) : ?>
              <div class="name"> <?= $username; ?></div>
            <?php endif; ?>
            <div class="job">Logout Button =></div>
          </div>
        </div>
        <a href=<?= base_url('Logout') ?>>
          <i class='bx bx-log-out' id="log_out"></i>
        </a>
      </li>
    </ul>
  </div>
  <script src="<?= base_url('js/script.js') ?>"></script>
</body>

</html>