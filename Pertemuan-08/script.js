// 1. Jam digital di header
function tampilJam() {
  var el = document.getElementById("jam");
  if (el) el.textContent = new Date().toLocaleString("id-ID");
}
setInterval(tampilJam, 1000);
tampilJam();

// 2. Animasi angka statistik (halaman Home)
document.querySelectorAll("[data-angka]").forEach(function (el) {
  var target = parseInt(el.getAttribute("data-angka"), 10);
  var now = 0;
  var step = Math.max(1, Math.ceil(target / 60));
  var t = setInterval(function () {
    now += step;
    if (now >= target) { now = target; clearInterval(t); }
    el.textContent = now;
  }, 25);
});

// 3. Validasi form registrasi
function cekForm(f) {
  var pesan = [];
  f.querySelectorAll("input").forEach(function (i) { i.classList.remove("salah"); });

  if (f.nama.value.trim() === "") { pesan.push("Nama wajib diisi."); f.nama.classList.add("salah"); }
  if (!/^\S+@\S+\.\S+$/.test(f.email.value)) { pesan.push("Email tidak valid."); f.email.classList.add("salah"); }
  if (!/^[0-9]{9,15}$/.test(f.hp.value)) { pesan.push("No. HP harus 9-15 angka."); f.hp.classList.add("salah"); }
  if (!f.jk.value) { pesan.push("Pilih jenis kelamin."); }
  if (f.model.value === "") { pesan.push("Pilih model mobil."); }

  if (pesan.length) { alert(pesan.join("\n")); return false; }
  return true; // lanjut dikirim ke PHP
}