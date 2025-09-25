// === Handle Submit Loading ===
const form = document.getElementById("multiStepForm");
const submitText = document.getElementById("submitText");
const loadingSpinner = document.getElementById("loadingSpinner");

form?.addEventListener("submit", function () {
    // Disable tombol
    submitBtn.disabled = true;

    // Ubah text tombol
    if (submitText) {
        submitText.textContent = "Processing...";
    }

    // Tampilkan spinner
    if (loadingSpinner) {
        loadingSpinner.classList.remove("hidden");
    }
});
