const sourceSelect = document.getElementById("sourceSelect");
const socialMediaSelect = document.getElementById("socialMediaSelect");
const otherSourceInput = document.getElementById("otherSourceInput");

sourceSelect.addEventListener("change", function () {
    // Reset dulu
    socialMediaSelect.classList.add("hidden");
    otherSourceInput.classList.add("hidden");

    if (this.value === "social_media") {
        socialMediaSelect.classList.remove("hidden");
    } else if (this.value === "other") {
        otherSourceInput.classList.remove("hidden");
    }
});
