document.addEventListener("DOMContentLoaded", function () {
    // === Multi-step Form ===
    const steps = document.querySelectorAll(".step");
    const stepCount = document.getElementById("stepCount");
    const nextBtn = document.getElementById("nextBtn");
    const prevBtn = document.getElementById("prevBtn");
    const submitBtn = document.getElementById("submitBtn");

    let currentStep = 0;

    // === Tampilkan Step ===
    function showStep(step) {
        steps.forEach((s, i) => s.classList.toggle("hidden", i !== step));
        stepCount.textContent = step + 1;

        prevBtn.classList.toggle("hidden", step === 0);
        nextBtn.classList.toggle("hidden", step === steps.length - 1);
        submitBtn.classList.toggle("hidden", step !== steps.length - 1);
    }

    // === Validasi Step ===
    function validateStep(stepIndex) {
        const currentFields = steps[stepIndex].querySelectorAll(
            "input[required], select[required], textarea[required]"
        );
        let valid = true;

        currentFields.forEach((field) => {
            const parent = field.parentElement;

            // Hapus pesan error lama
            const oldError = parent.querySelector(".error-message");
            if (oldError) oldError.remove();

            // Cek jika kosong
            if (!field.value.trim()) {
                valid = false;
                field.classList.add("border-red-500", "focus:ring-red-500");

                // Tambahkan pesan error di bawah input
                const errorText = document.createElement("p");
                errorText.className = "error-message text-red-500 text-sm mt-1";
                errorText.textContent = "Field ini wajib diisi.";
                parent.appendChild(errorText);
            } else {
                field.classList.remove("border-red-500", "focus:ring-red-500");
            }

            // Validasi khusus email
            if (field.type === "email" && field.value.trim()) {
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(field.value)) {
                    valid = false;
                    field.classList.add("border-red-500", "focus:ring-red-500");
                    const errorText = document.createElement("p");
                    errorText.className =
                        "error-message text-red-500 text-sm mt-1";
                    errorText.textContent = "Masukkan alamat email yang valid.";
                    parent.appendChild(errorText);
                }
            }

            // Validasi khusus nomor HP
            if (field.name === "phone" && field.value.trim()) {
                if (!/^628\d{8,13}$/.test(field.value)) {
                    valid = false;
                    field.classList.add("border-red-500", "focus:ring-red-500");
                    const errorText = document.createElement("p");
                    errorText.className =
                        "error-message text-red-500 text-sm mt-1";
                    errorText.textContent =
                        "Nomor HP harus diawali 628 dan minimal 10 digit.";
                    parent.appendChild(errorText);
                }
            }
        });

        return valid;
    }

    // === NEXT Button ===
    nextBtn?.addEventListener("click", () => {
        if (currentStep < steps.length - 1) {
            if (!validateStep(currentStep)) return; // Stop kalau invalid
            currentStep++;
            showStep(currentStep);
        }
    });

    // === PREV Button ===
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
    const paymentEventPrice = document.getElementById("paymentEventPrice");

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
});
