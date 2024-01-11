var modalTag = document.getElementById("addTagModal");
var addButtonTag = document.querySelectorAll(".btn")[1]; // Selecting the second .btn element
var spanTag = document.querySelectorAll(".close")[1]; // Selecting the second .close element

addButtonTag.onclick = function() {
    modalTag.style.display = "block";
};

spanTag.onclick = function() {
    closeModalTag();
};

window.onclick = function(event) {
    if (event.target == modalTag) {
        closeModalTag();
    }
};

function closeModalTag() {
    modalTag.style.display = "none";
}

document.addEventListener("DOMContentLoaded", function() {
    var modal = document.getElementById("addCategoryModal");
    var updateModal = document.getElementById("updateCategoryModal");
    var span = document.querySelector(".close");
    var modals = document.querySelectorAll(".modal");

    // Open addCategoryModal
    var addButton = document.querySelector(".btn");
    addButton.onclick = function() {
        modal.style.display = "block";
    };

    span.onclick = function() {
        closeModal();
    };

    window.onclick = function(event) {
        if (event.target == modal) {
            closeModal();
        }
    };

    function openUpdateModal(categoryId) {
        updateModal.style.display = "block";
    }

    function closeUpdateModal() {
        updateModal.style.display = "none";
    }

    var updatePencilIcons = document.querySelectorAll(".update-category");
    updatePencilIcons.forEach(function(icon) {
        icon.addEventListener("click", function() {
            var categoryId = icon.dataset.id;
            openModal("updateCategoryModal" + categoryId);
        });
    });

    function openModal(modalId) {
        var modal = document.getElementById(modalId);
        modal.style.display = "block";
    }

    function closeModal(modalId) {
        var modal = document.getElementById(modalId);
        modal.style.display = "none";
    }
    var updateCloseButton = document.querySelector(".update-close-btn");
    updateCloseButton.onclick = function() {
        closeUpdateModal();
    };

    function closeModal() {
        modal.style.display = "none";
    }
});