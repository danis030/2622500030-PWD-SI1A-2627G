const navToggle = document.getElementById("navToggle");
const navMenu = document.getElementById("navMenu");

navToggle.addEventListener("click", () => {
    const isOpen = navMenu.classList.toggle("open"); // sesuaikan dengan class di CSS kamu
    navToggle.setAttribute("aria-expanded", isOpen);
    navToggle.setAttribute("aria-label", isOpen ? "Close menu" : "Open menu");
});

const contactForm = document.getElementById("contactForm");
const formFeedback = document.getElementById("formFeedback");

const nameInput = document.getElementById("name");
const emailInput = document.getElementById("email");
const semesterInput = document.getElementById("semester");
const dateInput = document.getElementById("date");
const prodiInput = document.getElementById("prodi");
const messageInput = document.getElementById("message");

contactForm.addEventListener("submit", (event) => {
    event.preventDefault();

    formFeedback.className = "form-feedback-error";

    const nama = nameInput.value.trim();
    if (nama.length < 3 || nama.length > 50) {
        formFeedback.textContent = "Nama harus 3 sampai 50 karakter.";
        return;
    }

    const email = emailInput.value.trim();
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        formFeedback.textContent = "Email tidak valid.";
        return;
    }

    const semester = Number(semesterInput.value.trim());
    if (semester < 1 || semester > 16) {
        formFeedback.textContent = "Semester harus diisi dan berada dalam rentang 1 hingga 16.";
        return;
    }

    const date = dateInput.value;
    if (date === "") {
        formFeedback.textContent = "Tanggal harus diisi.";
        return;
    }

    const messageType = document.querySelector('input[name="messagetype"]:checked');
    if (!messageType) {
        formFeedback.textContent = "Jenis pesan harus dipilih.";
        return;
    }

    const selectedTopics = document.querySelectorAll('input[name="topic"]:checked');
    if (selectedTopics.length === 0) {
        formFeedback.textContent = "Pilih minimal satu topik yang diminati.";
        return;
    }

    const prodi = prodiInput.value.trim();
    if (prodi === "") {
        formFeedback.textContent = "Program studi harus diisi.";
        return;
    }

    const message = messageInput.value.trim();
    if (message === "") {
        formFeedback.textContent = "Pesan harus diisi.";
        return;
    }

    if (message.length > 300) {
        formFeedback.textContent = "Pesan tidak boleh lebih dari 300 karakter.";
        return;
    }

    formFeedback.textContent = "Form berhasil divalidasi.";
    formFeedback.className = "form-feedback-success";
});

contactForm.addEventListener("reset", () => {
    formFeedback.textContent = "";
    formFeedback.className = "form-feedback";
});

contactForm.addEventListener("input", () => {
    formFeedback.textContent = "";
});