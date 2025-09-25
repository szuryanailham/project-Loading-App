document
    .getElementById("copyAccountBtn")
    .addEventListener("click", async function () {
        const number = this.getAttribute("data-number");
        try {
            await navigator.clipboard.writeText(number);
            this.textContent = "Tersalin!";
            setTimeout(() => {
                this.textContent = "Salin";
            }, 1500);
        } catch (err) {
            alert("Gagal menyalin. Silakan salin manual.");
        }
    });
