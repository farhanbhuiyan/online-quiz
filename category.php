<?php 

if (isset($_POST['add-category'])) {
  $category_name= $_POST['cat_name'];
  if ($addCategory=$usr->addCategory($category_name)) {
   $_SESSION['msg']="category Added Succesfully";
  }else{
     $_SESSION['msg']="failed to Add category";
  }
  

}
?>

<?php include_once 'header.php'; ?>

      <div class="container-fluid">
        <h1 class="mt-4">Online Quiz</h1>
      </div>
<div class="container-fluid mb-5" id="allformDiv" name="allformDiv"> 
  <?php if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) {
    $msg = $_SESSION["msg"];
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>" . $msg . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button></div>";
    unset($_SESSION['msg']);
} ?>
  <div class="row">
      <!-- Category add -->
      <div class="col-sm-4" id="add-category" >
        <form action="" name="add-category-form" method="post">
        <div class="form-group">
          <label for="cat_name"> Category Name: </label>
            <input class="form-control"  type="text" name="cat_name" id="cat_name" placeholder="Enter Category Name" required="">
        </div>
        <input  class="form-control btn-info" type="submit" name="add-category" value="Add Category">
        </form>
      </div>
      <!-- end of Cat Add -->
       <!-- Cat List  add -->
      <div class="col-sm-4" id="category" >
        <table class="table table-hover table-responsive">
          <!-- <td><button type="button" data-toggle="modal" data-target="#edit" data-uid="2" class="update btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td> -->
                <!-- <td><button type="button" data-toggle="modal" data-target="#delete" data-uid="2" class="delete btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button></td> -->
           
          <thead>
            <th>SL#</th>
            <th>Category</th>
            <th>Actions</th>
          </thead>
          <tbody>
            <?php  
            $usr->cat_shows();
            $i=1;
            foreach($usr->cat as $category)
    { ?>
      <tr>
      
          
          <td><?php echo $i; ?></td>
          <td><?php echo $category['cat_name']; ?></td>
          <td><a href="" type="button">Edit</a></td>
          <!-- <td><a class="btn-btn-primary" href="?action=category-delete" type="button">Delete</a></td> -->
          <td><a type="button" data-toggle="modal" data-target="#edit" data-uid="2" class="update btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a></td>
            </tr>
          
    <?php   $i++; }?>
          </tbody>
        </table>
        
      </div>
      <!-- end of Catehory Add -->


      </div>
      <!-- end of row -->
      </div>
      <!-- end of all form Div -->
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>