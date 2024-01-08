<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link
    href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    .bg{
      width: 100%;
      height: 100vh;
      object-fit: cover;
      position: absolute;
    }

      .bg-glass {
        background-color: hsla(0, 0%, 100%, 0.9) !important;
        backdrop-filter: saturate(200%) blur(10px);
      }

      .row {
        margin-top: 5%;
      }

      .error input {
        border: 3px solid red;
      }

      .success input {
        border: 3px solid green;
      }

      form span.error-msg {
        color: red;
        width: 100%;
        display: flex;
        margin-left: 30%;
        margin-bottom: 20px;
      }

      form {
        padding: 20px;
      }

      form a {
        margin-left: 25%;
        text-decoration: none;
      }
    </style>
<body>
  <section class="overflow-hidden">
    <img src="/Wiki/public/img/gallery-10.jpg" class="bg">
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
      <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
          <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
            Welcome To Wiki <br />
            <span style="color: white">All on One Platform</span>
          </h1>
          <p class="mb-4 opacity-70" style="color: white">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Temporibus, expedita iusto veniam atque, magni tempora mollitia
            dolorum consequatur nulla, neque debitis eos reprehenderit quasi
            ab ipsum nisi dolorem modi. Quos?
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
          <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

          <div class="card bg-glass">
            <div class="card-body px-4 py-5 px-md-5">
              <?php
              if (isset($_SESSION['error_message'])) {
                echo '<div class="alert alert-danger" role="alert">';
                echo $_SESSION['error_message'];
                echo '</div>';
                unset($_SESSION['error_message']); 
              }
              ?>
              <form action="signin" method="POST" id="form">
                <div class="form-outline mb-4">
                  <input type="email" id="email" class="form-control" placeholder="Email" name="email"
                    value="<?php echo isset($_COOKIE['user_email']) ? $_COOKIE['user_email'] : ''; ?>" />
                  <p class="email-error text-danger"></p>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="password" class="form-control" placeholder="Password" name="password" />
                  <p class="password-error text-danger"></p>
                </div>

                <button type="submit" class="btn btn-primary btn-block mb-4 col-12" name="login">
                  Login
                </button>
                <a type="submit" class="mb-4 col-12 register" name="submit" href="signup">
                  Dont have an account Register
                </a>

                <!-- Register buttons -->
                <div class="text-center">
                  <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class='bx bxl-meta'></i>
                  </button>

                  <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class='bx bxl-google'></i>
                  </button>

                  <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class='bx bxl-linkedin'></i>
                  </button>

                  <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class='bx bxl-github'></i>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="/Wiki/public/js/login.js"></script>
    <script src="/Wiki/public/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>


</body>



<script>
  AOS.init();
</script>

</html>