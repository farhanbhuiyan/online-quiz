<?php 
session_start();
// var_dump($pageSlug);
// if(isset($_SESSION["login"])) {
// if ($_SESSION['login']==true) {
//  header("Location: home.php");
// }else{
//      header("Location: login.php");
// }

// }
 ?>
 <?php 
 if (isset($_GET['action']) && $_GET['action']=='logout') {
    session_destroy();
    $_SESSION['login']=false;
    header("Location:index.php");
    exit;
   } ?>
   
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Quiz System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- bootstrap min.css -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- customcsshomepage -->
  <link rel="stylesheet" href="css/home.css" crossorigin="anonymous">
 
  <!-- popper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <!-- bootstrapmin.js -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <!-- <link rel="stylesheet" href="css/profile.css" crossorigin="anonymous"> -->

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">


</head>
<body style="font-size: 20px !important;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">Online Quiz</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="home.php">Quiz_1</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="home2.php">Quiz_2</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">Profile</a>
        </li>
        <li class="nav-item">
            <?php 
            if (isset($_SESSION['login']) && ($_SESSION['login']==true) ) {
             ?>
          
            <a class="nav-link" href="?action=logout">Logout</a>
      <?php }else{ ?>
            <a class="nav-link" href="login.php">Login</a>
      <?php } ?>

        </li>
      </ul>
    </div>
  </div>
</nav>
