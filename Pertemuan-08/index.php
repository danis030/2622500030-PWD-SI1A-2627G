<?php
// Halaman yang diizinkan (whitelist) agar aman
$halaman = ['home' => 'Home', 'katalog' => 'Katalog', 'profile' => 'Profile', 'registrasi' => 'Registrasi', 'kontak' => 'Kontak'];

// Data katalog (harga bersifat ilustrasi untuk tugas)
$mobil = [
  ['nama' => 'BMW i8',            'foto' => 'i8.jpg',  'kat' => 'Hybrid',  'mesin' => '1.5L Turbo + Motor Listrik', 'hp' => 362, 'akselerasi' => '4,4 dtk', 'harga' => 3800000000],
  ['nama' => 'BMW M5',            'foto' => 'bm5.jpg', 'kat' => 'Sedan',   'mesin' => '4.4L Twin-Turbo V8',         'hp' => 600, 'akselerasi' => '3,4 dtk', 'harga' => 4500000000],
  ['nama' => 'BMW M8 Gran Coupe', 'foto' => 'm8.jpg',  'kat' => 'Coupe',   'mesin' => '4.4L Twin-Turbo V8',         'hp' => 600, 'akselerasi' => '3,3 dtk', 'harga' => 5200000000],
  ['nama' => 'BMW Z4',            'foto' => 'z4.jpg',  'kat' => 'Roadster','mesin' => '3.0L Turbo 6-Silinder',      'hp' => 340, 'akselerasi' => '4,5 dtk', 'harga' => 1900000000],
];
function rupiah($n) { return 'Rp ' . number_format($n, 0, ',', '.'); }
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
// Proses form kontak (PHP)
$kontakOk = null;
$kontakErr = [];
if ($page === 'kontak' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $k_nama  = trim($_POST['k_nama'] ?? '');
    $k_email = trim($_POST['k_email'] ?? '');
    $k_pesan = trim($_POST['k_pesan'] ?? '');
    if ($k_nama === '') $kontakErr[] = 'Nama wajib diisi.';
    if (!filter_var($k_email, FILTER_VALIDATE_EMAIL)) $kontakErr[] = 'Format email tidak valid.';
    if (strlen($k_pesan) < 10) $kontakErr[] = 'Pesan minimal 10 karakter.';
    if (!$kontakErr) { $kontakOk = ['nama' => $k_nama, 'email' => $k_email, 'pesan' => $k_pesan]; }
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
    <div class="logo"><img src="logo.jpg" alt="Logo Bavaria Sport Motors"></div>
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
        <div class="hero-gambar"><img src="back.jpg" alt="BMW sport"></div>
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
        <article class="kartu"><div class="kartu-img"><img src="i8.jpg" alt="BMW i8"></div>
          <h4>BMW i8</h4><p>Plug-in hybrid sport &bull; 362 hp</p></article>
        <article class="kartu"><div class="kartu-img"><img src="bm5.jpg" alt="BMW M5"></div>
          <h4>BMW M5</h4><p>Sedan performa &bull; V8 Twin-Turbo</p></article>
        <article class="kartu"><div class="kartu-img"><img src="m8.jpg" alt="BMW M8 Gran Coupe"></div>
          <h4>BMW M8 Gran Coupe</h4><p>Flagship M &bull; V8 Twin-Turbo</p></article>
        <article class="kartu"><div class="kartu-img"><img src="z4.jpg" alt="BMW Z4"></div>
          <h4>BMW Z4</h4><p>Roadster sport &bull; Open top</p></article>
      </div>

      <h3>Mobil Melaju</h3>
      <div class="jalan"><img src="animasi.jpg" alt="Animasi mobil sport"></div>

      <h3>Daftar Model &amp; Spesifikasi</h3>
      <table class="data">
        <tr><th>No</th><th>Model</th><th>Mesin</th><th>Tenaga</th><th>0-100 km/jam</th></tr>
        <tr><td>1</td><td>BMW i8</td><td>1.5L Turbo + Motor Listrik</td><td>362 hp</td><td>4,4 dtk</td></tr>
        <tr><td>2</td><td>BMW M5</td><td>4.4L Twin-Turbo V8</td><td>600 hp</td><td>3,4 dtk</td></tr>
        <tr><td>3</td><td>BMW M8 Gran Coupe</td><td>4.4L Twin-Turbo V8</td><td>600 hp</td><td>3,3 dtk</td></tr>
        <tr><td>4</td><td>BMW Z4</td><td>3.0L Turbo 6-Silinder</td><td>340 hp</td><td>4,5 dtk</td></tr>
      </table>
      <p><small>*Spesifikasi bersifat ilustrasi untuk keperluan tugas.</small></p>

      <div class="cta">
        <div><b>Ingin tahu cicilan per bulan?</b><br>Coba kalkulator cicilan di halaman Katalog.</div>
        <a class="tombol" href="?page=katalog#kalkulator">Hitung Cicilan</a>
      </div>

<?php elseif ($page === 'katalog'): ?>

      <h2 class="judul-hal">Katalog Mobil BMW Sport</h2>
      <p>Pilih kategori untuk menyaring daftar mobil.</p>

      <div class="filter" id="filter">
        <button type="button" class="aktif" data-kat="Semua">Semua</button>
        <?php foreach (array_unique(array_column($mobil, 'kat')) as $kat): ?>
          <button type="button" data-kat="<?= e($kat) ?>"><?= e($kat) ?></button>
        <?php endforeach; ?>
      </div>

      <div class="kat-grid" id="katGrid">
        <?php foreach ($mobil as $m): ?>
          <article class="kat-kartu" data-kat="<?= e($m['kat']) ?>">
            <div class="kartu-img"><img src="<?= e($m['foto']) ?>" alt="<?= e($m['nama']) ?>"></div>
            <div class="kat-isi">
              <span class="lencana"><?= e($m['kat']) ?></span>
              <h4><?= e($m['nama']) ?></h4>
              <ul>
                <li>Mesin: <?= e($m['mesin']) ?></li>
                <li>Tenaga: <?= $m['hp'] ?> hp</li>
                <li>0-100 km/jam: <?= e($m['akselerasi']) ?></li>
              </ul>
              <div class="harga"><?= rupiah($m['harga']) ?></div>
              <a class="tombol kecil" href="?page=registrasi">Booking Test Drive</a>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
      <p id="kosong" class="kosong" hidden>Tidak ada mobil di kategori ini.</p>
      <p><small>*Harga dan spesifikasi bersifat ilustrasi untuk keperluan tugas.</small></p>

      <h3 id="kalkulator">Kalkulator Cicilan</h3>
      <form class="kalkulator" onsubmit="return false">
        <div class="dua">
          <div class="baris"><label for="c_model">Pilih Mobil</label>
            <select id="c_model">
              <?php foreach ($mobil as $m): ?>
                <option value="<?= $m['harga'] ?>"><?= e($m['nama']) ?> - <?= rupiah($m['harga']) ?></option>
              <?php endforeach; ?>
            </select></div>
          <div class="baris"><label for="c_dp">Uang Muka (DP): <b id="c_dp_tampil">20</b>%</label>
            <input type="range" id="c_dp" min="10" max="70" step="5" value="20"></div>
        </div>
        <div class="dua">
          <div class="baris"><label for="c_tenor">Lama Cicilan</label>
            <select id="c_tenor">
              <option value="12">1 tahun (12 bulan)</option>
              <option value="24">2 tahun (24 bulan)</option>
              <option value="36" selected>3 tahun (36 bulan)</option>
              <option value="48">4 tahun (48 bulan)</option>
              <option value="60">5 tahun (60 bulan)</option>
            </select></div>
          <div class="baris"><label for="c_bunga">Bunga per tahun (%)</label>
            <input type="number" id="c_bunga" value="6" min="0" max="30" step="0.5"></div>
        </div>
        <div class="hasil-cicilan">
          <div><span>Uang Muka</span><b id="h_dp">-</b></div>
          <div><span>Pokok Pinjaman</span><b id="h_pokok">-</b></div>
          <div class="besar"><span>Cicilan per Bulan</span><b id="h_cicilan">-</b></div>
        </div>
        <small>*Perhitungan bunga flat, hanya simulasi dan bukan penawaran resmi.</small>
      </form>

<?php elseif ($page === 'kontak'): ?>

      <h2 class="judul-hal">Hubungi Kami</h2>

      <div class="kontak-grid">
        <div class="kontak-info">
          <h3>Alamat Showroom</h3>
          <p>Bavaria Sport Motors<br>Jl. Raya Bekasi No. 88<br>Bekasi, Jawa Barat 17111</p>

          <h3>Kontak</h3>
          <p>Telepon: (021) 555-0188<br>WhatsApp: 0812-3456-7890<br>Email: info@bavariasport.test</p>

          <h3>Jam Buka</h3>
          <table class="data">
            <tr><th>Hari</th><th>Jam</th></tr>
            <tr><td>Senin - Jumat</td><td>09.00 - 18.00</td></tr>
            <tr><td>Sabtu</td><td>09.00 - 16.00</td></tr>
            <tr><td>Minggu</td><td>10.00 - 14.00 (dengan janji)</td></tr>
          </table>
        </div>

        <div class="kontak-form">
          <h3>Kirim Pesan</h3>

          <?php if ($kontakErr): ?>
            <div class="alert merah"><b>Periksa kembali:</b>
              <ul><?php foreach ($kontakErr as $er): ?><li><?= e($er) ?></li><?php endforeach; ?></ul>
            </div>
          <?php endif; ?>
          <?php if ($kontakOk): ?>
            <div class="alert hijau"><b>Terima kasih, <?= e($kontakOk['nama']) ?>!</b> Pesan Anda sudah kami terima dan akan dibalas ke <?= e($kontakOk['email']) ?>.</div>
          <?php endif; ?>

          <form method="post" action="?page=kontak">
            <div class="baris"><label for="k_nama">Nama</label>
              <input type="text" id="k_nama" name="k_nama" value="<?= $kontakOk ? '' : e($_POST['k_nama'] ?? '') ?>" placeholder="Nama Anda"></div>
            <div class="baris"><label for="k_email">Email</label>
              <input type="email" id="k_email" name="k_email" value="<?= $kontakOk ? '' : e($_POST['k_email'] ?? '') ?>" placeholder="nama@email.com"></div>
            <div class="baris"><label for="k_pesan">Pesan</label>
              <textarea id="k_pesan" name="k_pesan" rows="5" placeholder="Tulis pesan Anda..."><?= $kontakOk ? '' : e($_POST['k_pesan'] ?? '') ?></textarea></div>
            <button type="submit" class="tombol">Kirim Pesan</button>
          </form>
        </div>
      </div>

<?php elseif ($page === 'profile'): ?>

      <h2 class="judul-hal">Biodata Pemilik</h2>
      <div class="profil">
        <div class="profil-foto">
          <img src="foto.png" alt="Foto Danis Dwi Saputra">
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
            <?php foreach (['BMW i8','BMW M5','BMW M8 Gran Coupe','BMW Z4'] as $m): ?>
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