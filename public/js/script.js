console.log("it works");

function toggleModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.toggle("hidden");
}

function handleDeleteModal(modalId, event) {
    const targetElement = event.target;
    const modal = document.getElementById(modalId);
    const modalTitle = modal.querySelector("h5");
    const boardId = targetElement.getAttribute("data-id");
    const boardName = targetElement.getAttribute("data-name");
    modalTitle.textContent = boardName;
    const deleteBoard = document.getElementById("deleteBoard");
    deleteBoard.setAttribute("action", `/boards/${boardId}`);
    modal.classList.toggle("hidden");
}

function handleEditModal(modalId, event) {
    const targetElement = event.target;
    const modal = document.getElementById(modalId);
    const boardId = targetElement.getAttribute("data-id");
    const boardName = targetElement.getAttribute("data-name");
    const editBoardForm = document.getElementById("editBoard");
    const editBoardInput = editBoardForm.querySelector("input#name");
    const submitButton = editBoardForm.querySelector("button[type='submit']");
    submitButton.disabled = true;
    submitButton.classList.add("bg-gray-600", "cursor-default", "disabled");
    editBoardForm.oninput = (event) => {
        onChangeBoardName(event, submitButton, boardName);
    };

    editBoardInput.value = boardName;
    editBoardForm.setAttribute("action", `/boards/${boardId}`);
    modal.classList.toggle("hidden");
}

function onChangeBoardName(event, submitButton, boardName) {
    const value = event.target.value;

    if (value === "" || value === boardName) {
        submitButton.disabled = true;
        submitButton.classList.add(
            "bg-gray-600",
            "cursor-default",
            "disabled",
            "pointer-events-none",
            "hover:none"
        );
    } else {
        submitButton.disabled = false;
        submitButton.classList.remove(
            "bg-gray-600",
            "cursor-default",
            "disabled"
        );
    }
}

function handleLogout(event) {
    const form = event.currentTarget.querySelector("form");

    form && form.submit();
}
