document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("form");

    form.addEventListener("submit", function(event) {
        let valid = true;

        document.querySelectorAll(".text-danger").forEach(function(error) {
            error.textContent = "";
        });

        document.querySelectorAll(".error").forEach(function(element) {
            element.classList.remove("error");
        });

        // Validation FullName
        const fullnameInput = document.getElementById("fullname");
        const fullnameError = document.querySelector(".fname-error");

        const fullname = fullnameInput.value.trim();
        if (!fullname) {
            fullnameError.textContent = "FullName is required";
            fullnameInput.style.border = "2px solid red";
            valid = false;
        }

        const addressInput = document.getElementById("address");
        const addressError = document.querySelector(".address-error");

        const address = addressInput.value.trim();
        if (!address) {
            addressError.textContent = "Address is required";
            addressInput.style.border = "2px solid red";
            valid = false;
        }

        // Validation email
        const emailInput = document.getElementById("email");
        const emailError = document.querySelector(".email-error");
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        const email = emailInput.value.trim();
        if (!email) {
            emailError.textContent = "Email is required";
            emailInput.style.border = "2px solid red";
            valid = false;
        } else if (!emailPattern.test(email)) {
            emailError.textContent = "Invalid email format";
            emailInput.style.border = "2px solid red";
            valid = false;
        }

        // Validation password
        const passwordInput = document.getElementById("password");
        const passwordError = document.querySelector(".password-error");
        const password = passwordInput.value.trim();

        if (!password) {
            passwordError.textContent = "Password is required";
            passwordInput.style.border = "2px solid red";
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
        }
    });
});