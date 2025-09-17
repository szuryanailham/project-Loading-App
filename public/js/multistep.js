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

eventSelect?.addEventListener("change", function () {
    const selectedOption = this.options[this.selectedIndex];
    const price = selectedOption.getAttribute("data-price");

    if (price) {
        const formattedPrice = Number(price).toLocaleString("id-ID", {
            style: "currency",
            currency: "IDR",
            minimumFractionDigits: 0,
        });

        eventPrice.textContent = `Harga: ${formattedPrice}`;
        eventPrice.classList.remove("hidden");
    } else {
        eventPrice.textContent = "";
        eventPrice.classList.add("hidden");
    }
});
