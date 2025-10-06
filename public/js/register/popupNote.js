function showNotes(notes) {
    document.getElementById("notesContent").textContent = notes;
    document.getElementById("notesModal").classList.remove("hidden");
}

function closeNotes() {
    document.getElementById("notesModal").classList.add("hidden");
}
