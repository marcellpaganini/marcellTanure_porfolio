<?php
$pageTitle = "Home";
    include 'includes/header.php';
?>
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <div class="hero-container" data-aos="fade-in">
        <h2 style="color: white">Marcell <span class="orangeText">Tanure</span></h2>
        <h2 style="color: white"><span class="orangeText">Web & Mobile </span>App Developer</h2>
        <div class="container"><br />
      <?php
        if(isset($_SESSION['userName'])){
          echo "<strong>Welcome, ", $_SESSION['userName'], "</strong>.";
        }
      ?>
    </div>
        </div>
        
    </section>    
<?php
    include 'includes/footer.php';
?>