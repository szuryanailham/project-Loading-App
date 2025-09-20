/**
 * Alerts.js
 * Script untuk handle alert (flash message)
 * - Bisa ditutup manual dengan tombol silang
 * - Otomatis hilang setelah 5 detik
 */

// Handle tombol close pada setiap alert
document.querySelectorAll(".close-btn").forEach((button) => {
    button.addEventListener("click", () => {
        const alert = button.parentElement;
        alert.style.transition = "opacity 0.5s"; // animasi fade out
        alert.style.opacity = 0;
        setTimeout(() => alert.remove(), 500); // hapus dari DOM setelah animasi
    });
});

// Auto-hide alert setelah 5 detik
document.querySelectorAll(".alert").forEach((alert) => {
    setTimeout(() => {
        alert.style.transition = "opacity 0.5s";
        alert.style.opacity = 0;
        setTimeout(() => alert.remove(), 500);
    }, 5000);
});
