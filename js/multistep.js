// === Multi-step Form ===
const steps = document.querySelectorAll(".step");
const stepCount = document.getElementById("stepCount");
const nextBtn = document.getElementById("nextBtn");
const prevBtn = document.getElementById("prevBtn");
const submitBtn = document.getElementById("submitBtn");
let currentStep = 0;
function showStep(step) {
    steps.forEach((s, i) => s.classList.toggle("hidden", i !== step));
    stepCount.textContent = step + 1;
    prevBtn.classList.toggle("hidden", step === 0);
    nextBtn.classList.toggle("hidden", step === steps.length - 1);
    submitBtn.classList.toggle("hidden", step !== steps.length - 1);
}

nextBtn?.addEventListener("click", () => {
    if (currentStep < steps.length - 1) {
        currentStep++;
        showStep(currentStep);
    }
});

prevBtn?.addEventListener("click", () => {
    if (currentStep > 0) {
        currentStep--;
        showStep(currentStep);
    }
});

showStep(currentStep);

// === Show Event Price ===
const eventSelect = document.getElementById("eventSelect");
const eventPrice = document.getElementById("eventPrice");
const paymentEventPrice = document.getElementById("paymentEventPrice"); // 👈 Tambahan untuk Step 3

eventSelect?.addEventListener("change", function () {
    const selectedOption = this.options[this.selectedIndex];
    const price = selectedOption.getAttribute("data-price");

    if (price) {
        const formattedPrice = Number(price).toLocaleString("id-ID", {
            style: "currency",
            currency: "IDR",
            minimumFractionDigits: 0,
        });

        // Tampilkan harga di Step 2
        eventPrice.textContent = `Harga: ${formattedPrice}`;
        eventPrice.classList.remove("hidden");

        // Tampilkan harga di Step 3
        if (paymentEventPrice) {
            paymentEventPrice.textContent = `Harga: ${formattedPrice}`;
        }
    } else {
        eventPrice.textContent = "";
        eventPrice.classList.add("hidden");

        if (paymentEventPrice) {
            paymentEventPrice.textContent = "Harga: Rp 0";
        }
    }
});

// === Handle Submit Loading ===
const form = document.getElementById("multiStepForm");
const submitText = document.getElementById("submitText");
const loadingSpinner = document.getElementById("loadingSpinner");

form?.addEventListener("submit", function () {
    // Disable tombol
    submitBtn.disabled = true;

    // Ubah text tombol
    if (submitText) submitText.textContent = "Processing...";

    // Tampilkan spinner
    if (loadingSpinner) loadingSpinner.classList.remove("hidden");
});

