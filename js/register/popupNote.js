window.showNotes = function (notes) {
    Swal.fire({
        title: "Catatan",
        text: notes,
        confirmButtonText: "Tutup",
        confirmButtonColor: "#ef4444",
        customClass: {
            popup: "rounded-xl shadow-lg",
        },
    });
};
