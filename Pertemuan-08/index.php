<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bavaria Sport Motors - Home</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="wrapper">

  <!-- HEADER -->
  <div id="header">
    <div class="logo"><img src="images/logo.jpg" alt="Logo"></div>
    <div>
      <h1>Bavaria <span>Sport</span> Motors</h1>
      <div id="jam"></div>
    </div>
  </div>

  <div id="tengah">

    <!-- NAVIGASI -->
    <div id="navigasi">
      <ul>
        <li><a href="index.html" class="aktif">Home</a></li>
        <li><a href="profile.html">Profile</a></li>
        <li><a href="registrasi.html">Registrasi</a></li>
      </ul>
    </div>

    <!-- KONTEN -->
    <div id="konten">
      <h2>Selamat Datang di Bavaria Sport Motors</h2>

      <div class="foto"><img src="images/m2.jpg" alt="BMW M2"></div>

      <p><b>Bavaria Sport Motors</b> adalah showroom yang menjual mobil BMW sport baru maupun bekas berkualitas, dengan performa tinggi dan desain agresif.</p>
      <p>Layanan kami: penjualan unit, test drive, tukar tambah, kredit fleksibel, serta perawatan dan modifikasi performa.</p>

      <h3>Mobil Melaju</h3>
      <div class="jalan"><img src="images/mobil.svg" alt="Animasi mobil"></div>

      <h3>Galeri Koleksi</h3>
      <div class="galeri">
        <div><img src="images/m3.png" alt="M3"><p>BMW M3</p></div>
        <div><img src="images/m4-racing.webp" alt="M4"><p>BMW M4 Racing</p></div>
        <div><img src="images/konsep.png" alt="Konsep"><p>Concept Coupe</p></div>
      </div>

      <h3>Daftar Model</h3>
      <table class="data">
        <tr><th>No</th><th>Model</th><th>Mesin</th><th>Tenaga</th></tr>
        <tr><td>1</td><td>BMW M2 Coupe</td><td>3.0L Twin-Turbo</td><td>460 hp</td></tr>
        <tr><td>2</td><td>BMW M3 Competition</td><td>3.0L Twin-Turbo</td><td>510 hp</td></tr>
        <tr><td>3</td><td>BMW M4 Coupe</td><td>3.0L Twin-Turbo</td><td>510 hp</td></tr>
        <tr><td>4</td><td>BMW M5</td><td>4.4L V8 Twin-Turbo</td><td>600 hp</td></tr>
      </table>
    </div>
  </div>

  <!-- FOOTER -->
  <div id="footer">&copy;2622500030_Danis Dwi Saputra_SI1A_ UTS Pemrograman Web Dasar.</div>

</div>
<script src="script.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bavaria Sport Motors - Profile</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="wrapper">

  <!-- HEADER -->
  <div id="header">
    <div class="logo"><img src="images/logo.jpg" alt="Logo"></div>
    <div>
      <h1>Bavaria <span>Sport</span> Motors</h1>
      <div id="jam"></div>
    </div>
  </div>

  <div id="tengah">

    <!-- NAVIGASI -->
    <div id="navigasi">
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="profile.html" class="aktif">Profile</a></li>
        <li><a href="registrasi.html">Registrasi</a></li>
      </ul>
    </div>

    <!-- KONTEN -->
    <div id="konten">
      <h2>Biodata</h2>
      <div class="profil">
        <img src="images/foto.png" alt="Foto Danis">
        <table>
          <tr><td>Nama</td><td>: Danis Dwi Saputra</td></tr>
          <tr><td>NIM</td><td>: 2622500030</td></tr>
          <tr><td>Kelas</td><td>: SI1A</td></tr>
          <tr><td>Program Studi</td><td>: Sistem Informasi</td></tr>
          <tr><td>Tempat, Tgl Lahir</td><td>: ..........</td></tr>
          <tr><td>Jenis Kelamin</td><td>: Laki-laki</td></tr>
          <tr><td>Alamat</td><td>: ..........</td></tr>
          <tr><td>Email</td><td>: 2622500030@mahasiswa.atmaluhur.ac.id</td></tr>
          <tr><td>Hobi</td><td>: ..........</td></tr>
        </table>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <div id="footer">&copy;2622500030_Danis Dwi Saputra_SI1A_ UTS Pemrograman Web Dasar.</div>

</div>
<script src="script.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bavaria Sport Motors - Registrasi</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="wrapper">

  <!-- HEADER -->
  <div id="header">
    <div class="logo"><img src="images/logo.jpg" alt="Logo"></div>
    <div>
      <h1>Bavaria <span>Sport</span> Motors</h1>
      <div id="jam"></div>
    </div>
  </div>

  <div id="tengah">

    <!-- NAVIGASI -->
    <div id="navigasi">
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="profile.html">Profile</a></li>
        <li><a href="registrasi.html" class="aktif">Registrasi</a></li>
      </ul>
    </div>

    <!-- KONTEN -->
    <div id="konten">
      <h2>Form Registrasi Test Drive</h2>
      <form onsubmit="return kirimForm(this)">
        <div class="baris"><label>Nama Lengkap</label><input type="text" name="nama" required></div>
        <div class="baris"><label>Email</label><input type="email" name="email" required></div>
        <div class="baris"><label>No. HP</label><input type="tel" name="hp" pattern="[0-9]{9,15}" required></div>
        <div class="baris"><label>Tanggal Lahir</label><input type="date" name="tgl" required></div>
        <div class="baris pilih"><label>Jenis Kelamin</label>
          <label><input type="radio" name="jk" required> Laki-laki</label>
          <label><input type="radio" name="jk"> Perempuan</label>
        </div>
        <div class="baris"><label>Model Diminati</label>
          <select name="model" required>
            <option value="">-- Pilih --</option>
            <option>BMW M2 Coupe</option><option>BMW M3 Competition</option>
            <option>BMW M4 Coupe</option><option>BMW M5</option>
          </select>
        </div>
        <div class="baris pilih"><label>Pembayaran</label>
          <label><input type="checkbox"> Tunai</label>
          <label><input type="checkbox"> Kredit</label>
          <label><input type="checkbox"> Tukar Tambah</label>
        </div>
        <div class="baris"><label>Catatan</label><textarea name="pesan" rows="3"></textarea></div>
        <button type="submit">Daftar</button>
        <button type="reset">Reset</button>
      </form>
    </div>
  </div>

  <!-- FOOTER -->
  <div id="footer">&copy;2622500030_Danis Dwi Saputra_SI1A_ UTS Pemrograman Web Dasar.</div>

</div>
<script src="script.js"></script>
</body>
</html>
