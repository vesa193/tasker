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

    if (form) {
        form.submit();
    }
}

function handleInfoBoardModal(modalId, event) {
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

function handleCreateColumnModal(modalId, event) {
    const targetElement = event.target;
    const modal = document.getElementById(modalId);
    const boardId = targetElement.getAttribute("data-board-id");
    const createColumnForm = modal.querySelector("form");
    const inputboardId = createColumnForm.querySelector(
        "input[name='board_id']"
    );
    inputboardId.value = boardId;
    modal.classList.toggle("hidden");
}

function toggleColumnDropdown(dropdownId, event) {
    const targetElement = event.target;
    const dropdown = targetElement.nextElementSibling;
    dropdown.classList.toggle("hidden");
}

function handleEditColumnModal(modalId, event) {
    const targetElement = event.currentTarget;
    const columnId = targetElement.getAttribute("data-column-id");
    const modal = document.getElementById(modalId);
    const columnTitle =
        targetElement.parentElement.parentElement.querySelector("p");
    console.log("columnTitle", columnTitle);
    const editColumnForm = modal.querySelector("form");
    const columnTitleInput = editColumnForm.querySelector(
        "input[name='title']"
    );
    const columnTitleValue = columnTitle.textContent;
    columnTitleInput.value = columnTitleValue;
    editColumnForm.setAttribute("action", `/columns/${columnId}`);
    modal.classList.toggle("hidden");
    const dropdown = event.currentTarget.parentElement;
    dropdown.classList.toggle("hidden");
}

function handleDeleteColumnModal(modalId, event) {
    const targetElement = event.currentTarget;
    const columnId = targetElement.getAttribute("data-column-id");
    const modal = document.getElementById(modalId);
    const columnTitle =
        targetElement.parentElement.parentElement.querySelector("p");
    const modalTitle = modal.querySelector("h5");
    modalTitle.textContent = `Column - ${columnTitle.textContent}`;
    const deleteColumn = modal.querySelector("form");
    deleteColumn.setAttribute("action", `/columns/${columnId}`);
    modal.classList.toggle("hidden");
    const dropdown = event.currentTarget.parentElement;
    dropdown.classList.toggle("hidden");
}

function handleCreateTaskModal(modalId, event) {
    const targetElement = event.target;
    const modal = document.getElementById(modalId);
    const columnTitle = targetElement.getAttribute("data-column-title");
    modal.querySelector("h5").textContent = `Create ticket - ${columnTitle}`;
    const modalForm = modal.querySelector("form");
    const columnIdInput = modalForm.querySelector("input[name='column_id']");
    columnIdInput.value = targetElement.getAttribute("data-column-id");
    const boardIdInput = modalForm.querySelector("input[name='board_id']");
    boardIdInput.value = targetElement.getAttribute("data-board-id");
    modal.classList.toggle("hidden");
}

function handleEditTaskModal(modalId, event) {
    const targetElement = event.currentTarget;
    const taskId = targetElement.getAttribute("data-task-id");
    const modal = document.getElementById(modalId);
    const taskDescription =
        targetElement.parentElement.parentElement.querySelector("p");
    console.log("columnTitle", taskDescription);
    const editTaskForm = modal.querySelector("form");
    const taskDescriptionInput = editTaskForm.querySelector(
        "textarea[name='description']"
    );
    console.log("taskDescriptionInput", taskDescriptionInput);
    const taskDescriptionValue = taskDescription.textContent;
    taskDescriptionInput.value = taskDescriptionValue;
    editTaskForm.setAttribute("action", `/tasks/${taskId}`);

    modal.classList.toggle("hidden");
    const dropdown = event.currentTarget.parentElement;
    dropdown.classList.toggle("hidden");
}

function handleDeleteTaskModal(modalId, event) {
    const targetElement = event.currentTarget;
    const taskId = targetElement.getAttribute("data-task-id");
    const modal = document.getElementById(modalId);
    const modalTitle = modal.querySelector("h5");
    modalTitle.textContent = `Delete Task - ${taskId}`;
    const deleteTaskForm = modal.querySelector("form");
    deleteTaskForm.setAttribute("action", `/tasks/${taskId}`);
    modal.classList.toggle("hidden");
    const dropdown = event.currentTarget.parentElement;
    dropdown.classList.toggle("hidden");
}

function handleMoveTaskModal(modalId, event) {
    const targetElement = event.target;
    const taskId = targetElement.getAttribute("data-task-id");
    const columnId = targetElement.getAttribute("data-column-id");
    const columnTitle = targetElement.getAttribute("data-column-title");
    console.log("columnTitle", columnTitle, columnId, taskId);
    const modal = document.getElementById(modalId);
    const taskDescription =
        targetElement.parentElement.parentElement.querySelector("p");
    console.log("columnTitle", taskDescription);
    const moveTaskForm = modal.querySelector("form");
    const inputSelect = moveTaskForm.querySelector("select[name='column_id']");
    console.log(inputSelect);
    inputSelect.value = columnId;

    Array.from(inputSelect.options).forEach((option) => {
        if (option?.value === columnId) {
            option.disabled = true;
            option.selected = true;
            return;
        }
        option.disabled = false;
    });

    moveTaskForm.setAttribute("action", `/tasks/${taskId}`);

    modal.classList.toggle("hidden");
    const dropdown = event.currentTarget.parentElement;
    dropdown.classList.toggle("hidden");
}
