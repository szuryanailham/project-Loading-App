// Ambil semua tombol close
document.querySelectorAll(".close-btn").forEach((button) => {
    button.addEventListener("click", () => {
        alert("saasas");
        const alert = button.parentElement;
        alert.style.transition = "opacity 0.5s"; // animasi hilang
        alert.style.opacity = 0;
        setTimeout(() => alert.remove(), 500); // hapus dari DOM
    });
});

// Auto hide setelah 5 detik
document.querySelectorAll(".alert").forEach((alert) => {
    setTimeout(() => {
        alert.style.transition = "opacity 0.5s";
        alert.style.opacity = 0;
        setTimeout(() => alert.remove(), 500);
    }, 5000);
});
