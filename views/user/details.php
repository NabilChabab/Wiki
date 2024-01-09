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

  <header id="header" class="fixed-top d-flex align-items-center header-transparent" style="background-color:rgba(1, 3, 91, 0.9);">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.html"><span>Wiki Wiki</span></a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li class="dropdown"><a href="#features"><span>Categories</span> <i class="bi bi-chevron-down"></i></a>
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
                    <article class="article">
                        <div class="article-img">
                            <img src="/Wiki/public/img/gallery/<?= $wiki['image']?>" title="" alt="">
                        </div>
                        <div class="article-title">
                            <h6><a href="#"><?= $wiki['created_at']?></a></h6>
                            <h2><?= $wiki['title']?></h2>
                            <div class="media d-flex">
                                <div class="avatar ">
                                    <img src="/Wiki/public/img/<?=$wiki['user_profil']?>" title="" alt="">
                                </div>
                                <div class="media-body">
                                    <label><?= $wiki['user_name']?></label>
                                    <span><?= $wiki['user_email']?></span>
                                </div>
                            </div>
                        </div>
                        <div class="article-content">
                            <p><?= $wiki['description']?></p>
                            
                        </div>
                        <div class="nav tag-cloud">
                            <a href="#"><?= $wiki['tag_name']?></a>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 m-15px-tb blog-aside">
                    <!-- Author -->
                    <div class="widget widget-author">
                        <div class="widget-title">
                            <h3>Author</h3>
                        </div>
                        <div class="widget-body">
                            <div class="media align-items-center d-flex">
                                <div class="avatar">
                                    <img src="/Wiki/public/img/<?= $wiki['user_profil']?>" title="" alt="">
                                </div>
                                <div class="media-body">
                                    <h6>Hello, I'm<br><?= $wiki['user_name']?></h6>
                                </div>
                            </div>
                            <p>I design and develop services for customers of all sizes, specializing in creating stylish, modern websites, web services and online stores</p>
                        </div>
                    </div>
                    <!-- End Author -->
                    <!-- Trending Post -->
                    <div class="widget widget-post">
                        <div class="widget-title">
                            <h3>Trending Now</h3>
                        </div>
                        <div class="widget-body">

                        </div>
                    </div>
                    <!-- End Trending Post -->
                    <!-- Latest Post -->
                    <div class="widget widget-latest-post">
                        <div class="widget-title">
                            <h3>Latest Wikis</h3>
                        </div>
                        <div class="widget-body">
                            
                            <?php $counter = 0; foreach($wikis as $wiki) : ?>
                            <div class="latest-post-aside media d-flex justify-content-between">
                                <div class="lpa-left media-body">
                                    <div class="lpa-title">
                                        <h5><a href="#"><?= $wiki['created_at'] ?></a></h5>
                                    </div>
                                    <div class="lpa-meta">
                                        <a class="name" href="#">
                                            <?= $wiki['title']?>
                                        </a>
                                        <a class="date" href="#">
                                            <?= $wiki['category_name']?>
                                        </a>
                                    </div>
                                </div>
                                <div class="lpa-right">
                                    <a href="wiki_details?id=<?= base64_encode($wiki['id'])?>">
                                        <img src="/Wiki/public/img/gallery/<?= $wiki['image']?>" title="" alt="">
                                    </a>
                                </div>
                            </div>
                                <?php
                                $counter++;
                                    if($counter >= 5){
                                        break;
                                    }
                            endforeach; ?>
                        </div>
                    </div>
                    <!-- End Latest Post -->
                    <!-- widget Tags -->
                    <div class="widget widget-tags">
                        <div class="widget-title">
                            <h3>Your Permissions</h3>
                        </div>
                        <div class="widget-body">
                            <div class="nav tag-cloud">
                                <a href="#">Update Your Wiki</a>
                                <a href="#" style="background-color:red;">Delete Your Wiki</a>
                            </div>
                        </div>
                    </div>
                    <!-- End widget Tags -->
                </div>
            </div>
        </div>
    </div>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contact</h2>
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
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>Bootslander</h3>
              <p class="pb-3"><em>Qui repudiandae et eum dolores alias sed ea. Qui suscipit veniam excepturi quod.</em>
              </p>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Bootslander</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

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