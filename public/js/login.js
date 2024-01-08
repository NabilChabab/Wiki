document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("form");

    form.addEventListener("submit", function (event) {
      let valid = true;

      // Clear previous error messages and remove red borders
      document.querySelectorAll(".text-danger").forEach(function (error) {
        error.textContent = "";
      });

      document.querySelectorAll(".error").forEach(function (element) {
        element.classList.remove("error");
      });

      // Validate email
      const emailInput = document.getElementById("email");
      const emailError = document.querySelector(".email-error");
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      const email = emailInput.value.trim();
      if (!email) {
        emailError.textContent = "Email is required";
        emailInput.style.border = '2px solid red';
        valid = false;
      } else if (!emailPattern.test(email)) {
        emailError.textContent = "Invalid email format";
        emailInput.style.border = '2px solid red';
        valid = false;
      }

      // Validate password
      const passwordInput = document.getElementById("password");
      const passwordError = document.querySelector(".password-error");
      const password = passwordInput.value.trim();

      if (!password) {
        passwordError.textContent = "Password is required";
        passwordInput.style.border = '2px solid red';
        valid = false;
      }

      // If any validation fails, prevent form submission
      if (!valid) {
        event.preventDefault();
      }
    });
  });