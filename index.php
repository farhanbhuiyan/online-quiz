<?php include_once 'header.php'; ?>
<?php 

if (isset($_POST['add-category'])) {
  $category_name= $_POST['cat_name'];
  if ($addCategory=$usr->addCategory($category_name)) {
   $_SESSION['msg']="category Added Succesfully";
  }else{
     $_SESSION['msg']="failed to Add category";
  }
  

}
if (isset($_POST['add-question'])) {
  $question= $_POST['question'];
  $option1= $_POST['option1'];
  $option2= $_POST['option2'];
  $option3= $_POST['option3'];
  $option4= $_POST['option4'];
  $right_answer= $_POST['right_answer'];
  $category_id= $_POST['question_category'];
  if ($addQuestion=$usr->addQuestion($question,$option1,$option2,$option3,$option4,$right_answer,$category_id)) {
     $_SESSION['msg']="Question Added Succesfully";
  }else{
     $_SESSION['msg']="failed to Add Question";
  }
 
}
?>


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
       <!-- Question  add -->
      <div class="col-sm-4" id="add-question" >
        <form action="" name="add-question-form" method="post">
        <div class="form-group">
          <label for="question"> Question: </label>
            <input class="form-control"  type="text" name="question" id="question" placeholder="Enter Your Question" required="">
        </div>
        <div class="form-group">
          <label for="question"> Option 1: </label>
            <input class="form-control"  type="text" name="option1" id="option1" placeholder="Enter Your option1" required="">
        </div>
        <div class="form-group">
          <label for="question"> Option 2: </label>
            <input class="form-control"  type="text" name="option2" id="option2" placeholder="Enter Your option2" required="">
        </div>
         <div class="form-group">
          <label for="question"> Option 3: </label>
            <input class="form-control"  type="text" name="option3" id="option3" placeholder="Enter Your option3" required="">
        </div>
        <div class="form-group">
          <label for="question"> Option 4: </label>
            <input class="form-control"  type="text" name="option4" id="option4" placeholder="Enter Your option4" required="">
        </div>
        <div class="form-group">
          <label for="question">Select an Answer </label>
            <select class="form-control"  name="right_answer" id="right_answer" required="">
              <option value="1">Option 1</option>
              <option value="2">Option 2</option>
              <option value="3">Option 3</option>
              <option value="4">Option 4</option>
            </select>
        </div> 
        <div class="form-group">
          <label for="question"> Select Category </label>
          <select  class="form-control" name="question_category" id="question_category" required="">
          <?php  
            $usr->cat_shows();
            foreach($usr->cat as $category)
    { ?>
      
          
          <option value="<?php echo $category['id'] ?>"><?php echo $category['cat_name']; ?></option>
          
    <?php    }?>
    </select>
        </div>

        <input  class="form-control btn-info" type="submit" name="add-question" value="Add Question">
        </form>
      </div>
      <!-- end of Question Add -->

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