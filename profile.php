<?php include 'header.php';
include("class/users.php");
$profile= new users;
$exam_history=$profile->exam_history();
if ($_SESSION['login']!=true) {
    header("Location: login.php");
}
 ?>
 <?php  
// $exam_history=$ans->exam_history();
 ?>
 <!-- container d-flex justify-content-center mt-5 pt-5 -->
 <div class="container mt-5">
 <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
    <div class="card"> 
        <!-- <div style="max-height: 50px; max-width: 80px;"> -->
            <img src="img/user/<?php echo $_SESSION['photo'] ?>" class="rounded" alt="Cinque Terre" style="max-height: 30%; max-width:100%;">
        <!-- </div> -->
       <!--  <div class="card-header">   
            <?php echo $_SESSION['name']; ?>
        </div> -->
         <div class="card-body">  
         <div class="card-text">  <?php echo $_SESSION['name']; ?> </div>
           <div class="card-text">   <?php echo $_SESSION['email']; ?> </div>
           

        </div>

    </div>
  

</div>
<!-- end of div col-sm -4 -->
<div class="col-sm-4">
  <h6> Exam History</h6>
           <table class="table-table-responsive table-bordered"> 
            <thead> 
                <td>    Category</td>
                <td>    Score</td>
                <td>    Date</td>
             </thead>

           <?php    
           while ( $row= $exam_history->fetch_assoc()) {
            // var_dump($row);
            $date = new DateTime($row['date']);
         
            ?> 
            <tbody> 
                <tr>    
                    <td> <?php echo $row['cat_name']; ?>   </td>
                    <td> <?php echo $row['score']; ?>   </td>
                    <td> <?php echo $date->format('Y-m-d'); ?>   </td>
                </tr>
            </tbody>

           <?php   
       } 
       ?>
             </table>

</div>
<!-- end of  col-sm-4 -->

</div>
<!-- end of row -->
</div>
<!-- end of container -->