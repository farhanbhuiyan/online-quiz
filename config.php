<?php
define('BASE_PATH','http://localhost/project/');
define('DB_HOST', 'localhost');
define('DB_NAME', 'quiz2');
define('DB_USER','root');
define('DB_PASSWORD','');

// $con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
// $db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

// $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQLI: " . mysqli_error());
// $con = mysqli_connect(DB_HOST,"root","",DB_NAME);
// $mysqli = new mysqli("localhost", "root", "", "quiz2");
// $conn = mysqli_connect("localhost", "root","");
// $db=mysqli_select_db("quiz2",$conn);
$link = mysqli_connect("localhost", "root", "", "quiz2");

mysqli_select_db($link, "quiz2");

?>