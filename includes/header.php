<?php 
    include 'includes/session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $pageTitle; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/favicon.png" rel="icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="assets/img/profile.png" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.php">Marcell Tanure</a></h1>
        <div class="social-links mt-3 text-center">
          <a href="https://www.facebook.com/marcell.paganini/" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
          <a href="https://www.linkedin.com/in/marcell-paganini-tanure" class="linkedin" target="_blank"><i class="bx bxl-linkedin"></i></a>
          <a href="https://github.com/marcellpaganini" class="github" target="_blank"><i class="bx bxl-github"></i></a>
        </div>
      </div>

      <nav class="nav-menu">
      <?php
        if(isset($_SESSION['userName'])){ ?>
          <ul>
            <li><a href="index.php"><i class="bx bx-home"></i> <span>Home</span></a></li>
            <li><a href="about.php"><i class="bx bx-user"></i> <span>About</span></a></li>
            <li><a href="projects.php"><i class="bx bx-windows"></i> <span>Projects</span></a></li>
            <li><a href="allPosts.php"><i class="bx bx-book-content"></i> Blog</a></li>
            <li><a href="insertProject.php"><i class="bx bx-add-to-queue"></i> Add Project</a></li>
            <li><a href="insertPost.php"><i class="bx bx-add-to-queue"></i> Add Post</a></li>
            <li><a href="login.php"><i class="bx bx-log-in"></i> Login</a></li>
            <li><a href="logout.php"><i class="bx bx-log-out"></i> Logout</a></li>          
          </ul>  <?php
        } else { ?>
          <ul>
            <li><a href="index.php"><i class="bx bx-home"></i> <span>Home</span></a></li>
            <li><a href="about.php"><i class="bx bx-user"></i> <span>About</span></a></li>
            <li><a href="projects.php"><i class="bx bx-windows"></i> <span>Projects</span></a></li>
            <li><a href="allPosts.php"><i class="bx bx-book-content"></i> Blog</a></li>
            <li><a href="login.php"><i class="bx bx-log-in"></i> Login</a></li>
            <li><a href="logout.php"><i class="bx bx-log-out"></i> Logout</a></li>          
          </ul> <?php
        }
      ?>
      </nav>
      <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    </div>
  </header>

  