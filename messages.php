<?php 
if(isset($_SESSION["errormsg"])) {
    $error = $_SESSION["errormsg"];
    unset($_SESSION['errormsg']);
    
} else {
    $error = "";
}

// echo $error;
 ?>