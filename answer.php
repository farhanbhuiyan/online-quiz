<?php
include("header.php");
include("class/users.php");
if (empty($_POST)) {
	header("Location:index.php");
	// header("location:javascript://history.go(-1)");
	exit();
}
else{
 $ans= new users;
// var_dump($_SESSION['user_id']);
$answer=$ans->answer($_POST);

var_dump($answer);
$cat_id=$_POST['cat_id'];
$cat_name=$ans->cat_name($cat_id);
// var_dump($cat_name);

?>

<center>
<?php
 $total_qus=$answer['right']+$answer['wrong']+$answer['no_answer'];
 $attempt_qus=$total_qus-$answer['no_answer'];
 $score=$answer['right'];
  $insert_result=$ans->insert_result($cat_id,$score);
 // $insert_result=$ans->insert_result($answer['right']);

?>

					 <div class="col-sm-12 mt-5"  class="border border-info">
						<h2> Candidate Name: <?php echo $_SESSION['name']; ?><h2>
						<h2> Subject: <?php echo $cat_name; ?><h2>
						  <h2 style="color:red">Your Exam Result</h2>
						       </div>
						<div class="container">
						<div class="col-sm-2"></div>
						<div class="col-sm-8">

						  <table class="table table-bordered">
							<thead>
							  <tr>
								<th class="info">Total Number of Questions</th>
								<th class="info"><?php echo $total_qus?></th>
							  </tr>
							</thead>
							<tbody>
						      <tr>
								<td class="Warning">Attempt Question </td>
								<td class="Warning"><?php echo $attempt_qus;?></td>
							  </tr>
							  <tr>
								<td class="Danger">Not Attemt Question</td>
								<td class="Danger"><?php echo $answer['no_answer'] ;?></td>
							  </tr>

							  <tr>
								<td class="success"> Right Answer</td>
								<td class="success"><?php echo $answer['right'] ;?></td>
							
								<input type="hidden" name="score" value="<?php echo $answer['right'] ;?>"  >
							  </tr>
							  
							  <tr>
								<td class="danger">Wrong Answer</td>
								<td class="danger"><?php echo $answer['wrong'] ;?></td>
							  </tr>
							  <tr>
								<td class="secondary"> Your Result(%):</td>
								<td class="secondary"><?php
										$result=($answer['right']*100)/($total_qus);
										echo number_format((float)$result, 2, '.', '')."%";
										//echo $result."%";
											?></td>
							  </tr>
							</tbody>
						  </table> 
						  <a class="btn btn-info" href="view_answer.php?cat_id=<?php echo $cat_id; ?>">View Answer</a>
						</div>
						  <div class="col-sm-2"></div>
						</div>








</center>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
<?php 	} ?>
