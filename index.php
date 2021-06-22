<?php 
include 'header.php'; 
include("class/users.php");
$profile= new users;
$rank_details=$profile->rank_details();
// session_start();
?>
<header>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url('img/bgs1.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <h3 class="display-4">Online Quiz</h3>
          <p class="lead">Online quiz will help you to increase your knowledge.</p>
        </div>
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('img/bgs2.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <h3 class="display-4">Online Quiz</h3>
          <p class="lead">Many Test available.</p>
        </div>
      </div>
      <!-- Slide Three - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('img/bgs3.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <h3 class="display-4">Online Quiz</h3>
          <p class="lead">This is a description for the third slide.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
  </div>
</header>

<!-- Page Content -->
<!-- <section class="py-5">
  <div class="container">
    <h1 class="font-weight-light">Half Page Image Slider</h1>
    <p class="lead">The background images for the slider are set directly in the HTML using inline CSS. The images in this snippet are from <a href="https://unsplash.com">Unsplash</a>!</p>
  </div>
</section> -->
<section class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <span>Top Student</span>
        <ul class="list-group">
 
        <?php if ($rank_details){
          while ($row=$rank_details->fetch_assoc()) {
            // var_dump($row);
           ?>
            <li>  </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
    <?php echo $row['name']; ?>
    <span class="badge badge-primary badge-pill"><?php echo $row['totalScore']; ?></span>
  </li>
          <?php }
        } ?>
      </ul>
          
      </div>
      <div class="col-md-4">
        <h1 class="font-weight-light">Online Quiz System</h1>
    <p class="lead">You can test your  <strong>skills</strong> with our Quiz.!u will get 1 point for each correct answer. At the end of the Quiz, your total score will be displayed. Maximum score is 5 points. <a href="home.php"><strong>start now</strong></a>!</p>
      </div>
    </div>
  </div>
</section>
</body>
</html>
