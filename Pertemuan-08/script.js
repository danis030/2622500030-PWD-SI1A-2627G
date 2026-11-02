// Jam digital di header
function tampilJam() {
  var el = document.getElementById("jam");
  if (el) el.textContent = new Date().toLocaleString("id-ID");
}
setInterval(tampilJam, 1000);
tampilJam();

// Form registrasi
function kirimForm(f) {
  alert("Terima kasih, " + f.nama.value + "! Registrasi untuk " + f.model.value + " berhasil dikirim.");
  f.reset();
  return false;
}