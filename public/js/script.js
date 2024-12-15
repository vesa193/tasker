console.log("iw works");

function toggleModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.toggle("hidden");
}

function handleDeleteModal(modalId) {
    console.log("this", this);
    const deleteButton = document.getElementById(modalId);
    const modal = document.getElementById(modalId);
    modal.classList.toggle("hidden");
}
