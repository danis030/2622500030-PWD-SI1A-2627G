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

// 4. Efek muncul halus saat di-scroll
(function () {
  document.documentElement.classList.add("js");
  var sel = "#konten > section, #konten > h2, #konten > h3, #konten > p, #konten > ul, #konten > table, " +
            "#konten > div, #konten > form, .kartu, .kat-kartu, .kontak-info, .kontak-form, .profil-foto, .profil table";
  var items = document.querySelectorAll(sel);
  if (!("IntersectionObserver" in window)) return;
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (en) {
      if (!en.isIntersecting) return;
      var el = en.target;
      el.classList.add("tampil");
      io.unobserve(el);
      // lepas class setelah selesai, supaya efek hover tidak bentrok
      setTimeout(function () { el.classList.remove("reveal", "tampil"); el.style.transitionDelay = ""; }, 1200);
    });
  }, { threshold: 0.08 });
  items.forEach(function (el, i) {
    el.classList.add("reveal");
    el.style.transitionDelay = ((i % 4) * 0.08) + "s";
    io.observe(el);
  });
})();

// 5. Filter katalog
(function () {
  var wrap = document.getElementById("filter");
  if (!wrap) return;
  var kartu = document.querySelectorAll(".kat-kartu");
  var kosong = document.getElementById("kosong");
  wrap.addEventListener("click", function (ev) {
    var btn = ev.target.closest("button");
    if (!btn) return;
    wrap.querySelectorAll("button").forEach(function (b) { b.classList.remove("aktif"); });
    btn.classList.add("aktif");
    var kat = btn.getAttribute("data-kat"), ada = 0;
    kartu.forEach(function (k) {
      var cocok = (kat === "Semua" || k.getAttribute("data-kat") === kat);
      k.classList.toggle("sembunyi", !cocok);
      if (cocok) ada++;
    });
    kosong.hidden = ada > 0;
  });
})();

// 6. Kalkulator cicilan (bunga flat)
(function () {
  var model = document.getElementById("c_model");
  if (!model) return;
  var dp = document.getElementById("c_dp"), tenor = document.getElementById("c_tenor"), bunga = document.getElementById("c_bunga");
  function rp(n) { return "Rp " + Math.round(n).toLocaleString("id-ID"); }
  function hitung() {
    var harga = parseFloat(model.value);
    var persen = parseFloat(dp.value);
    var bulan = parseInt(tenor.value, 10);
    var b = parseFloat(bunga.value) || 0;
    var uangMuka = harga * persen / 100;
    var pokok = harga - uangMuka;
    var totalBunga = pokok * (b / 100) * (bulan / 12);
    var cicilan = (pokok + totalBunga) / bulan;
    document.getElementById("c_dp_tampil").textContent = persen;
    document.getElementById("h_dp").textContent = rp(uangMuka);
    document.getElementById("h_pokok").textContent = rp(pokok);
    document.getElementById("h_cicilan").textContent = rp(cicilan);
  }
  [model, dp, tenor, bunga].forEach(function (el) { el.addEventListener("input", hitung); });
  hitung();
})();