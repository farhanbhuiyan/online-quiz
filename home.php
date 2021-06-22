<?php
include("header.php");
include("class/users.php");
$email=$_SESSION['email'];
$profile= new users;


//extract($_POST);
$profile->users_profile($email);
// print_r($profile->data);
if (isset($_POST['submitCategory'])) {
	 $qus= new users;
 $cat=$_POST['cat'];
 $qus->qus_show($cat);
 $cat_name=$qus->cat_name($cat);
$_SESSION['cat']=$cat;
	
}

?>
<?php 
if ($_SESSION['login']!=true) {
	header("Location: login.php");
}
 ?>
<div style="margin: 5px; background-color:!important;    color: #212529;">
<div style="width: 30%; float:left;">
  <img src="img/bg.png" alt="" height="70%" width="100%">
</div>

<div style="width: 70%; float:right" style="background-color:!important;    color: #212529;">
  


<div class="row" style="margin: 5px; background-color: #!important;    color: #212529;" >


	<div class="col-sm-8 mt-5">
	  <form method="post" action="">
	  	<label for=""><strong>Select any Subject from the List</strong></label>
	  
	  <select class="form-control" name="cat">
	  <option >Select Subject</option>
	  <?php 
	  $profile->cat_shows();

	  foreach($profile->cat as $category)
	  { ?>
		  
					
					<option value="<?php echo $category['id'] ?>"><?php echo $category['cat_name']; ?></option>
					
	  <?php 									}
	  ?>
				  </select><br>
				  <center><input type="submit" name="submitCategory" value="submit" class="btn btn-primary"></center>
				  </form>
	  </div>
	<!-- end of category div -->
	<?php if (isset($_POST['submitCategory'])) { ?>
	<!-- ..,New Div -->
	<div class="col-sm-8">
		 <label for="">Subject : <?php echo $cat_name; ?></label> 
		<!-- justify-content-center -->
		
		 
		<form method="post" action="answer.php" id="form1"> 
			<table class="table table-bordered" id="questionTable">
		  <?php 
		  $i=1;
		  if ($qus->qus) {
		  
		  foreach($qus->qus as $qust)
		  {
			 ?>
			 <input type="hidden" name="cat_id" value="<?php echo $qust['cat_id']; ?>">
						   
		 
			<tbody>
			  <tr class="danger">
			  
			   <td>	  <?php echo $i; ?>	<?php echo $qust['question']; ?>			</td>
					
			  </tr>
			  <?php 
			  if(isset($qust['ans1']))
			  {?>
					<tr class="info">
					<td>&nbsp;1&emsp;<input type="radio" value="1" name="<?php echo $qust['id']; ?>">&nbsp;<?php echo $qust['ans1']; ?> </td>
					</tr>
			  <?php } ?>
			  
			  <?php 
			  if(isset($qust['ans1']))
			  {?>
					<tr class="info">
					<td>&nbsp;2&emsp;<input type="radio"value="2" name="<?php echo $qust['id']; ?>"> &nbsp;<?php echo $qust['ans2']; ?></td>
					</tr>
					 <?php } ?>
					 <?php 
			  if(isset($qust['ans1']))
			  {?>
					<tr class="info">
					<td>&nbsp;3&emsp;<input type="radio" value="3" name="<?php echo $qust['id']; ?>">&nbsp;<?php echo $qust['ans3']; ?></td>
					</tr>
					 <?php } ?>
					 <?php 
			  if(isset($qust['ans1']))
			  {?>
					<tr class="info">
					<td>&nbsp;4&emsp;<input type="radio" value="4" name="<?php echo $qust['id']; ?>">&nbsp;<?php echo $qust['ans4']; ?></td>
					</tr>
					<?php } ?>	
					<tr class="info">
					<td><input type="radio" checked="checked" style="display:none"value="no_attempt" name="<?php echo $qust['id']; ?>"></td>
					</tr>
			   </tbody>
		  <?php $i++; }?>
		  </table>
		  <input type="submit" name="submitAnswer"  value="Submit Answer" class="btn btn-success">
		<?php } else{
			echo '<h4> No Question Available! Please select another subject</h4>';

		}?>
  </form>


<!-- end of quesh show div -->
<?php } ?>

</div>
<!-- end of second div of container -->

</div>
<!-- end of main container -->
</div>

</div>
</body>
</html>
