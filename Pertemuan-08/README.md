Nama	Danis Dwi Saputra
NIM	2622500030
Kelas	SI1A
Mata Kuliah	Pemrograman Web Dasar
Folder	Pertemuan-08
Deskripsi Singkat

webbsite ini adalah showroom mobil BMW sport. Tata letak halaman mengikuti soal: Header, Navigasi (di kiri), Konten (di kanan), dan Footer
	Ketentuan Soal	Penerapan
1	Website bertopik Bisnis/Usaha dengan layout Header, Navigasi, Konten, Footer	Layout dibuat dengan header, nav, main, footer dan CSS flexbox
2	Header berisi logo usaha dan nama website	Logo bulat dan tulisan "Bavaria Sport Motors"
3	Navigasi memakai tag list	Menu memakai <ul><li>
3a	Home: gambar dan deskripsi bisnis (boleh tabel, video, animasi)	Banner foto, deskripsi, statistik, kartu koleksi, tabel spesifikasi, animasi mobil melaju
3b	Profile: biodata dan foto	Foto dan tabel biodata
3c	Registrasi: form registrasi	Form dengan validasi JavaScript dan PHP
3d	Menu tambahan (opsional)	Katalog (kartu + filter + kalkulator cicilan) dan Kontak
4	pooter berisi tulisan ©NIM_Nama_SI1A_ UTS Pemrograman Web Dasar	©2622500030_Danis Dwi Saputra_SI1A_ UTS Pemrograman Web Dasar.
Satu file index.php dengan menu berbasis ?page=home|katalog|profile|registrasi|kontak, memakai whitelist halaman.
Animasi mobil melaju dengan CSS @keyframes.
Efek muncul halus saat halaman di-scroll (IntersectionObserver).
Jam digital dan animasi angka statistik (JavaScript).
Katalog mobil dengan filter kategori (Semua, Hybrid, Sedan, Coupe, Roadster).
Kalkulator cicilan (uang muka, lama cicilan, bunga flat).
Form Registrasi dan form Kontak: validasi JavaScript di browser dan validasi PHP di server, output disaring dengan htmlspecialchars.
Tampilan responsif (@media max-width: 760px)
kendanla and solusi
1	Gambar tidak muncul di localhost.	Nama file disamakan dengan yang ada di kode dan semua gambar ditaruh di folder yang benar.
2	Nama file foto mengandung spasi.	Di-rename lewat VS Code (F2), lalu src di index.php disesuaikan.
3	Animasi mobil berjalan mundur dan ada kotak putih.	Gambar dibalik dengan scaleX(-1) dan latar putih dihilangkan dengan mix-blend-mode: multiply.
4	Perubahan CSS tidak langsung terlihat.	Memakai hard refresh (Ctrl+F5)