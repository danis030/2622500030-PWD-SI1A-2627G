<?php
// Halaman yang diizinkan (whitelist) agar aman
$halaman = ['home' => 'Home', 'profile' => 'Profile', 'registrasi' => 'Registrasi'];
$page = $_GET['page'] ?? 'home';
if (!isset($halaman[$page])) { $page = 'home'; }

// Proses form registrasi (PHP)
$hasil = null;
$error = [];
if ($page === 'registrasi' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama  = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $hp    = trim($_POST['hp'] ?? '');
    $tgl   = $_POST['tgl'] ?? '';
    $jk    = $_POST['jk'] ?? '';
    $model = $_POST['model'] ?? '';
    $bayar = $_POST['bayar'] ?? [];
    $pesan = trim($_POST['pesan'] ?? '');

    if ($nama === '') $error[] = 'Nama wajib diisi.';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $error[] = 'Format email tidak valid.';
    if (!preg_match('/^[0-9]{9,15}$/', $hp)) $error[] = 'No. HP harus 9-15 angka.';
    if ($jk === '') $error[] = 'Jenis kelamin wajib dipilih.';
    if ($model === '') $error[] = 'Model mobil wajib dipilih.';

    if (!$error) {
        $hasil = compact('nama', 'email', 'hp', 'tgl', 'jk', 'model', 'bayar', 'pesan');
    }
}
function e($s) { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bavaria Sport Motors - <?= e($halaman[$page]) ?></title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="wrapper">

  <!-- ===== HEADER ===== -->
  <header id="header">
    <div class="logo"><img src="images/logo.jpg" alt="Logo Bavaria Sport Motors"></div>
    <div class="judul">
      <h1>Bavaria <span>Sport</span> Motors</h1>
      <p>Showroom Mobil BMW Sport &bull; <span id="jam"></span></p>
    </div>
  </header>

  <div id="tengah">

    <!-- ===== NAVIGASI (tag list) ===== -->
    <nav id="navigasi">
      <ul>
        <?php foreach ($halaman as $key => $label): ?>
          <li><a href="?page=<?= $key ?>" class="<?= $page === $key ? 'aktif' : '' ?>"><?= $label ?></a></li>
        <?php endforeach; ?>
      </ul>
    </nav>

    <!-- ===== KONTEN ===== -->
    <main id="konten">

<?php if ($page === 'home'): ?>

      <section class="hero">
        <div class="hero-teks">
          <small>THE ULTIMATE DRIVING MACHINE</small>
          <h2>Rasakan Sensasi <em>Sheer Driving Pleasure</em></h2>
          <p>Showroom BMW sport terpercaya: unit baru, bekas berkualitas, kredit ringan, dan layanan performa lengkap.</p>
          <a class="tombol" href="?page=registrasi">Booking Test Drive</a>
        </div>
        <div class="hero-gambar"><img src="images/m2.jpg" alt="BMW M2"></div>
      </section>

      <section class="statistik">
        <div><b data-angka="250">0</b><span>Unit Terjual</span></div>
        <div><b data-angka="12">0</b><span>Tahun Pengalaman</span></div>
        <div><b data-angka="98">0</b><span>% Pelanggan Puas</span></div>
        <div><b data-angka="24">0</b><span>Jam Layanan</span></div>
      </section>

      <h3>Tentang Usaha Kami</h3>
      <p><b>Bavaria Sport Motors</b> adalah usaha showroom di bidang penjualan mobil BMW sport. Kami menghadirkan mobil berperforma tinggi dengan desain agresif, kondisi terawat, dan surat lengkap.</p>
      <ul class="layanan">
        <li>Penjualan unit baru &amp; bekas</li>
        <li>Test drive gratis</li>
        <li>Tukar tambah &amp; kredit fleksibel</li>
        <li>Servis &amp; modifikasi performa</li>
      </ul>

      <h3>Koleksi Unggulan</h3>
      <div class="kartu-wrap">
        <article class="kartu"><div class="kartu-img"><img src="images/m3.png" alt="BMW M3"></div>
          <h4>BMW M3 Competition</h4><p>510 hp &bull; 0-100 km/jam 3,5 dtk</p></article>
        <article class="kartu"><div class="kartu-img"><img src="images/m4-racing.webp" alt="BMW M4 Racing"></div>
          <h4>BMW M4 Racing</h4><p>Livery M Power edisi balap</p></article>
        <article class="kartu"><div class="kartu-img"><img src="images/konsep.png" alt="Concept Coupe"></div>
          <h4>Concept Sport Coupe</h4><p>Desain futuristik &amp; aerodinamis</p></article>
      </div>

      <h3>Mobil Melaju</h3>
      <div class="jalan"><img src="images/mobil.svg" alt="Animasi mobil"></div>

      <h3>Daftar Model &amp; Spesifikasi</h3>
      <table class="data">
        <tr><th>No</th><th>Model</th><th>Mesin</th><th>Tenaga</th><th>0-100 km/jam</th></tr>
        <tr><td>1</td><td>BMW M2 Coupe</td><td>3.0L Twin-Turbo 6-Silinder</td><td>460 hp</td><td>4,1 dtk</td></tr>
        <tr><td>2</td><td>BMW M3 Competition</td><td>3.0L Twin-Turbo 6-Silinder</td><td>510 hp</td><td>3,5 dtk</td></tr>
        <tr><td>3</td><td>BMW M4 Coupe</td><td>3.0L Twin-Turbo 6-Silinder</td><td>510 hp</td><td>3,5 dtk</td></tr>
        <tr><td>4</td><td>BMW M5</td><td>4.4L Twin-Turbo V8</td><td>600 hp</td><td>3,3 dtk</td></tr>
      </table>

<?php elseif ($page === 'profile'): ?>

      <h2 class="judul-hal">Biodata Pemilik</h2>
      <div class="profil">
        <div class="profil-foto">
          <img src="images/foto.png" alt="Foto Danis Dwi Saputra">
          <h4>Danis Dwi Saputra</h4>
          <span>Founder &amp; Owner</span>
        </div>
        <table>
          <tr><td>Nama Lengkap</td><td>: Danis Dwi Saputra</td></tr>
          <tr><td>NIM</td><td>: 2622500030</td></tr>
          <tr><td>Kelas</td><td>: SI1A</td></tr>
          <tr><td>Program Studi</td><td>: Sistem Informasi</td></tr>
          <tr><td>Tempat, Tgl Lahir</td><td>: Bandung, 15 Maret 2000</td></tr>
          <tr><td>Jenis Kelamin</td><td>: Laki-laki</td></tr>
          <tr><td>Alamat</td><td>: Paris</td></tr>
          <tr><td>Email</td><td>: 2622500030@mahasiswa.atmaluhur.ac.id</td></tr>
          <tr><td>Hobi</td><td>: Playing Video Games</td></tr>
          <tr><td>Motto</td><td>: "Drive your passion."</td></tr>
        </table>
      </div>

<?php else: ?>

      <h2 class="judul-hal">Form Registrasi Test Drive</h2>

      <?php if ($error): ?>
        <div class="alert merah"><b>Periksa kembali:</b>
          <ul><?php foreach ($error as $er): ?><li><?= e($er) ?></li><?php endforeach; ?></ul>
        </div>
      <?php endif; ?>

      <?php if ($hasil): ?>
        <div class="alert hijau"><b>Registrasi berhasil!</b> Data Anda sudah kami terima.</div>
        <table class="data">
          <tr><th colspan="2">Data Registrasi</th></tr>
          <tr><td>Nama</td><td><?= e($hasil['nama']) ?></td></tr>
          <tr><td>Email</td><td><?= e($hasil['email']) ?></td></tr>
          <tr><td>No. HP</td><td><?= e($hasil['hp']) ?></td></tr>
          <tr><td>Tanggal Lahir</td><td><?= e($hasil['tgl']) ?></td></tr>
          <tr><td>Jenis Kelamin</td><td><?= e($hasil['jk']) ?></td></tr>
          <tr><td>Model</td><td><?= e($hasil['model']) ?></td></tr>
          <tr><td>Pembayaran</td><td><?= e(implode(', ', $hasil['bayar']) ?: '-') ?></td></tr>
          <tr><td>Catatan</td><td><?= e($hasil['pesan'] ?: '-') ?></td></tr>
        </table>
      <?php endif; ?>

      <form method="post" action="?page=registrasi" onsubmit="return cekForm(this)">
        <div class="baris"><label for="nama">Nama Lengkap</label>
          <input type="text" id="nama" name="nama" value="<?= e($_POST['nama'] ?? '') ?>" placeholder="Nama lengkap"></div>
        <div class="dua">
          <div class="baris"><label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= e($_POST['email'] ?? '') ?>" placeholder="nama@email.com"></div>
          <div class="baris"><label for="hp">No. HP / WhatsApp</label>
            <input type="tel" id="hp" name="hp" value="<?= e($_POST['hp'] ?? '') ?>" placeholder="08xxxxxxxxxx"></div>
        </div>
        <div class="dua">
          <div class="baris"><label for="tgl">Tanggal Lahir</label>
            <input type="date" id="tgl" name="tgl" value="<?= e($_POST['tgl'] ?? '') ?>"></div>
          <div class="baris pilih"><label>Jenis Kelamin</label>
            <label><input type="radio" name="jk" value="Laki-laki"> Laki-laki</label>
            <label><input type="radio" name="jk" value="Perempuan"> Perempuan</label></div>
        </div>
        <div class="baris"><label for="model">Model yang Diminati</label>
          <select id="model" name="model">
            <option value="">-- Pilih Model --</option>
            <?php foreach (['BMW M2 Coupe','BMW M3 Competition','BMW M4 Coupe','BMW M5'] as $m): ?>
              <option <?= (($_POST['model'] ?? '') === $m) ? 'selected' : '' ?>><?= $m ?></option>
            <?php endforeach; ?>
          </select></div>
        <div class="baris pilih"><label>Metode Pembelian</label>
          <label><input type="checkbox" name="bayar[]" value="Tunai"> Tunai</label>
          <label><input type="checkbox" name="bayar[]" value="Kredit"> Kredit</label>
          <label><input type="checkbox" name="bayar[]" value="Tukar Tambah"> Tukar Tambah</label></div>
        <div class="baris"><label for="pesan">Catatan</label>
          <textarea id="pesan" name="pesan" rows="3" placeholder="Tulis pesan Anda..."><?= e($_POST['pesan'] ?? '') ?></textarea></div>
        <button type="submit" class="tombol">Daftar Sekarang</button>
        <button type="reset" class="tombol abu">Reset</button>
      </form>

<?php endif; ?>

    </main>
  </div>

  <!-- ===== FOOTER ===== -->
  <footer id="footer">&copy;2622500030_Danis Dwi Saputra_SI1A_ UTS Pemrograman Web Dasar.</footer>

</div>
<script src="script.js"></script>
</body>
</html>