<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Wiki Wiki</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/Wiki/public/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link href="/Wiki/public/vendor/aos/aos.css" rel="stylesheet">
    <link href="/Wiki/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Wiki/public/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/Wiki/public/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/Wiki/public/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/Wiki/public/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="/Wiki/public/css/style.css" rel="stylesheet">
    <link href="/Wiki/public/css/details.css" rel="stylesheet">


</head>

<body>

    <header id="header" class="fixed-top d-flex align-items-center header-transparent"
        style="background-color:rgba(1, 3, 91, 0.9);">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo d-flex justify-content-center align-items-center">
                <a href="home"><i class="ri-arrow-left-s-line me-5" style="font-size :30px; color:white;"></i></a>
                <h1><a href="index.html"><span>Wiki Wiki</span></a></h1>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li class="dropdown"><a href="#features"><span>Categories</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Technology</a></li>
                            <li><a href="#">Science</a></li>
                            <li><a href="#">Health and Wellness</a></li>
                            <li><a href="#">Travel</a></li>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Business and Finance</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="#gallery">Wikis</a></li>
                    <li><a class="nav-link scrollto" href="#team">About us</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    <?php
                    if (isset($_SESSION['role']) == 2) {
                        echo '<li class="dropdown"><a href=""><img src="/Wiki/public/img/' . $_SESSION['user_image'] . '"style="width:45px;height:45px;border-radius:50%;margin-left:60%;"></a>
            <ul>
            <li><a href="#">View Profil</a></li>
            <li><a href="logout">Logout</a></li>
          </ul>
            </li>';
                    } else {
                        echo '<li><a class="text-white" href="signin" style="margin-left:60%;">Sign In</a></li>';
                    }
                    ?>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header>

    <main id="main">

        <div class="blog-single gray-bg">
            <div class="container">
                <div class="row align-items-start">
                    <div class="col-lg-8 m-15px-tb">
                        <article class="article justify-content-center align-items-center d-flex flex-column">
                            <div class="article-img">
                                <img src="/Wiki/public/img/<?= $_SESSION['user_image'] ?>"
                                    style="width:200px;height:200px;border-radius:20px">
                            </div>
                            <div class="article-title justify-content-center align-items-center d-flex flex-column ">
                                <h2><?= $_SESSION['user_name'] ?></h2>
                                <h5 class="mb-5"><?= $_SESSION['user_email'] ?></h5>
                                <p class="text-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, beatae quidem iusto exercitationem non tenetur molestiae vitae rem nostrum aspernatur. Porro labore ullam quae quasi ratione, obcaecati non corrupti optio?</p>
                                <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis accusantium, suscipit quibusdam quisquam fugiat reprehenderit similique nemo neque dolor atque dolorem pariatur sint excepturi ea officia aperiam quaerat quasi soluta!</p>
                            </div>
                            <div class="article-content">
                                <p><?= $_SESSION['user_address'] ?></p>

                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 m-15px-tb blog-aside">
                        <div class="widget widget-latest-post">
                            <div class="widget-title">
                                <h3>Your Latest Wikis</h3>
                            </div>
                            <div class="widget-body">

                                <?php $counter = 0;
                                foreach ($userwikis as $wiki): ?>
                                    <div class="latest-post-aside media d-flex justify-content-between">
                                        <div class="lpa-left media-body">
                                            <div class="lpa-title">
                                                <h5><a href="#">
                                                        <?= $wiki['created_at'] ?>
                                                    </a></h5>
                                            </div>
                                            <div class="lpa-meta">
                                                <a class="name" href="#">
                                                    <?= $wiki['title'] ?>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="lpa-right">
                                            <a href="wiki_details?id=<?= base64_encode($wiki['id']) ?>">
                                                <img src="/Wiki/public/img/gallery/<?= $wiki['image'] ?>" title="" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <a href="update?id=<?= base64_encode($wiki['id']) ?>" class="btn btn-primary">Update</a>
                                        <a href="delete?id=<?= base64_encode($wiki['id']) ?>" class="btn btn-danger">Delete</a>
                                    </div>
                                    <?php
                                    $counter++;
                                    if ($counter >= 5) {
                                        break;
                                    }
                                endforeach; ?>
                            </div>
                        </div>
                        <!-- End Latest Post -->

                        <!-- End widget Tags -->
                    </div>
                </div>
            </div>
        </div>
        <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <p>Contact Support Team</p>
        </div>

        <div class="row">

          <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>

              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section>

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/Wiki/public/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/Wiki/public/vendor/aos/aos.js"></script>
    <script src="/Wiki/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/Wiki/public/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/Wiki/public/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/Wiki/public/js/main.js"></script>

</body>

</html>