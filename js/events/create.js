document.addEventListener("DOMContentLoaded", () => {
    // ====== Price Toggle ======
    const priceTypeSelect = document.getElementById("priceTypeSelect");
    const priceField = document.getElementById("priceField");

    if (priceTypeSelect && priceField) {
        const togglePriceField = () => {
            priceField.classList.toggle(
                "hidden",
                priceTypeSelect.value === "free"
            );
        };
        // initial check
        togglePriceField();
        // update on change
        priceTypeSelect.addEventListener("change", togglePriceField);
    }

    // ====== Poster Preview ======
    const posterInput = document.getElementById("posterInput");
    const posterPreview = document.getElementById("posterPreview");

    if (posterInput && posterPreview) {
        posterInput.addEventListener("change", function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    posterPreview.src = e.target.result;
                    posterPreview.classList.remove("hidden");
                };
                reader.readAsDataURL(file);
            } else {
                posterPreview.src = "";
                posterPreview.classList.add("hidden");
            }
        });
    }

    // ====== Slug Otomatis ======
    const eventName = document.getElementById("eventName");
    const eventSlug = document.getElementById("eventSlug");

    if (eventName && eventSlug) {
        eventName.addEventListener("input", function () {
            let slug = eventName.value
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, "") // hapus karakter aneh
                .trim()
                .replace(/\s+/g, "-") // spasi jadi "-"
                .replace(/-+/g, "-"); // hapus duplikat "-"
            eventSlug.value = slug;
        });
    }
});
