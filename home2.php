<?php
include("header.php");
include("class/users.php");
require 'config.php';
$email=$_SESSION['email'];
$profile= new users;
//extract($_POST);
$profile->users_profile($email);
if (isset($_POST['submitCategory'])) {
$qus= new users;
 $cat=$_POST['cat'];
 $cat_id=$_POST['cat'];
 $cat_name= $qus->cat_name($cat_id);
 $category=$_POST['cat'];
 $qus->qus_show($cat);
 $QuestionCount=$qus->num_rows_qus_show($cat);
 $_SESSION['cat']=$cat;
 $_SESSION['category_name']=$cat_name;
	
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
		<div class="container question">
			<div class="col-xs-12 col-sm-8 col-md-8 col-xs-offset-4 col-sm-offset-3 col-md-offset-3">
				<p>
			     Online Quiz: <b> <?php echo $cat_name;?> </b>
				</p>
				<hr>
				<form class="form-horizontal" role="form" id='login' method="post" action="answer.php">
					<?php 
					
					// $res = mysqli_query("select * from questions where category_id='$category' ORDER BY RAND()") or die(mysqli_error());
          // $res = mysqli_query($link,"select * from questions where cat_id='$category' ORDER BY RAND()");
                    $rows = $QuestionCount;
					$i=1;
                	if ($qus->qus) {
		  
		  foreach($qus->qus as $result)
		  { ?> 
		  	<input type="hidden" name="cat_id" value="<?php echo $result['cat_id']; ?>"> 

                    <?php if($i==1){?>         
                    <div id='question<?php echo $i;?>' class='cont'>
                    <p class='questions' id="qname<?php echo $i;?>"> <?php echo $i?>.<?php echo $result['question'];?></p>

                    <input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['ans1'];?>
                   <br/>
                    <input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['ans2'];?>
                    <br/>
                    <input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['ans3'];?>
                    <br/>
                    <input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['ans4'];?>
                    <br/>
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>
                    <input type="radio" checked="checked" style="display:none"value="no_attempt" name="<?php echo $result['id']; ?>">                                                                      
                    <br/>
                    <button id='next<?php echo $i;?>' class='next btn btn-success' type='button'>Next</button>
                    </div>     

                     <?php }elseif($i<1 || $i<$rows){?>

                       <div id='question<?php echo $i;?>' class='cont'>
                    <p class='questions' id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $result['question'];?></p>
                    <input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['ans1'];?>
                    <br/>
                    <input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['ans2'];?>
                    <br/>
                    <input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['ans3'];?>
                    <br/>
                    <input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['ans4'];?>
                    <br/>
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>

                    <input type="radio" checked="checked" style="display:none"value="no_attempt" name="<?php echo $result['id']; ?>">                                                                      
                    <br/>
                    <button id='pre<?php echo $i;?>' class='previous btn btn-success' type='button'>Previous</button>                    
                    <button id='next<?php echo $i;?>' class='next btn btn-success' type='button'>Next</button>
                    </div>

                   <?php }elseif($i==$rows){?>
                    <div id='question<?php echo $i;?>' class='cont'>
                    <p class='questions' id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $result['question'];?></p>
                    <input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['ans1'];?>
                    <br/>
                    <input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['ans2'];?>
                    <br/>
                    <input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['ans3'];?>
                    <br/>
                    <input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['ans4'];?>
                    <br/>
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>

                    <input type="radio" checked="checked" style="display:none"value="no_attempt" name="<?php echo $result['id']; ?>">                                                                      
                    <br/>

                    <button id='pre<?php echo $i;?>' class='previous btn btn-success' type='button'>Previous</button>                    
                    <button id='next<?php echo $i;?>' class='next btn btn-success' type='submit'>Finish</button>
                    </div>
					<?php } $i++;} ?>

				</form>
			</div>
		</div>
		<!-- End of Question Div -->
	<?php } }else{
		// echo '<h1> No question Available </h1>';
	} ?>

</div>
<!-- end of second div of container -->

</div>
<!-- end of main container -->
</div>

</div>


		<script>
			console.log(<?php echo $rows; ?>);
		$('.cont').addClass('hide');
		count=$('.questions').length;
		 $('#question'+1).removeClass('hide');

		 $(document).on('click','.next',function(){
		     element=$(this).attr('id');
		     last = parseInt(element.substr(element.length - 1));
		     nex=last+1;
		     $('#question'+last).addClass('hide');

		     $('#question'+nex).removeClass('hide');
		 });

		 $(document).on('click','.previous',function(){
             element=$(this).attr('id');
             last = parseInt(element.substr(element.length - 1));
             pre=last-1;
             $('#question'+last).addClass('hide');

             $('#question'+pre).removeClass('hide');
         });

		</script>
</body>
</html>
