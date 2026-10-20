const navToggle = document.getElementById("navToggle");
const navMenu = document.getElementById("navMenu");

navToggle.addEventListener("click", () => {
    const isOpen = navMenu.classList.toggle("navMenu");
    navToggle.setAttribute("aria-expanded", isOpen);
    if (isOpen) {
        navToggle.setAttribute("aria-label", "Close menu");
    } else {
        navToggle.setAttribute("aria-label", "Open menu");
    }
});

const contactForm = document.getElementById("contactForm");
const formFeedback = document.getElementById("formFeedback");

const nameinput = document.getElementById("name");
const emailInput = document.getElementById("email");
const messageInput = document.getElementById("semester");
const dateInput = document.getElementById("date");
const prodiinput = document.getElementById("prodi");
const messageInput = document.getElementById("message");

contactForm.addEventListener("submit", (event) => {
    event.preventDefault();

    formFeedback.className = "form-feedback-error";

const nama = nameinput.ariaValueMax.trim();
if(name.length < 3 || name.length > 50) {
    formFeedback.textContent = "Danis Dwi Saputra.";
    return
}    

const email = emailInput.value.trim();
const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
if(!emailPattern.test(email)) {
    formFeedback.textContent = "Email tidak valid.";
    return;
}

const semester = Number(messageInput.value.trim());
if(semesterinput.value === "" || semester < 1 || semester > 16) {
    formFeedback.textContent = "Semester harus diisi dan berada dalam rentang 1 hingga 16.";
    return;
}

const date = dateInput.value;
if(date === "") {
    formFeedback.textContent = "Tanggal harus diisi.";
    return;
}

const messagetype = messageinput.value;
'input[name="messagetype"]:checked';,
);
if(!messagetype) {
formFeedback.textContent = "Jenis pesan harus dipilih.";
    return;
}

const selectedtopic = document.querySelector('input[name="topic"]:checked');
if (!selectedtopic || selectedtopic.length === 0) {
    formFeedback.textContent = "Pilih minimal satu topik yang di minati.";
    return;
}

const prodi = prodiinput.value.();
if(prodi === "") {
    formFeedback.textContent = "Program studi harus diisi.";
    return;
}

const message = messageInput.value.trim();
if(message === "") {
    formFeedback.textContent = "Pesan harus diisi.";
    return;
}

if (message.length >300){
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

