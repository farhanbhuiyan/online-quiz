<?php 
include_once('header.php') ;
include_once('class/users.php');
$usr= new users();

?>
<div class="container d-flex justify-content-center" style="margin: 30px;">
	
	<table>
<!-- start of ans code -->


<?php
			$i=1;
		
			$cat_id=$_GET['cat_id'];
			$getQues=$usr->qus_show_new($cat_id);
			// var_dump($getQues);
			while ($questionFetched=$getQues->fetch_assoc())
	  { 
	  
	  	?>

			<tr>

				<td colspan="2">
				 <h4> Question:  <?php echo $i; ?> : <?php echo $questionFetched['question'];?></h4>
				</td>
			</tr>

			

			<tr>
					
					<?php
					if ($questionFetched['ans']=='1') {
					
						echo '<td colspan="2">'.'<input type="radio" checked="checked" class="viewOption"/>'."<span style='color:blue'>".$questionFetched['ans1']."</span>".'</td>';
						echo "<tr></tr>";
						echo '<td>'.'<input type="radio" class="viewOption"/>'.$questionFetched['ans2'].'</td>';
						echo "<tr></tr>";
						echo '<td>'.'<input type="radio" class="viewOption"/>'.$questionFetched['ans3'].'</td>';
						echo "<tr></tr>";
						echo '<td>'.'<input type="radio" class="viewOption"/>'.$questionFetched['ans4'].'</td>';
					
					}

					if($questionFetched['ans']=='2')
					{

						
						echo '<td>'.'<input type="radio" />'.$questionFetched['ans1'].'</td>';
						echo "<tr></tr>";
						echo '<td>'.'<input type="radio"  checked="checked"/>'."<span style='color:blue'>".$questionFetched['ans2']."</span>";
						echo "<tr></tr>";
						echo '<td>'.'<input type="radio" />'.$questionFetched['ans3'].'</td>';
						echo "<tr></tr>";
						echo '<td>'.'<input type="radio" />'.$questionFetched['ans4'].'</td>';
						

					}
					if($questionFetched['ans']=='3')
					{
						// echo "<td>";
						echo '<td>'.'<input type="radio" />'.$questionFetched['ans1'].'</td>';
						echo "<tr></tr>";
						echo '<td>'.'<input type="radio" />'.$questionFetched['ans2'].'</td>';
						echo "<tr></tr>";
						echo '<td>'.'<input type="radio" checked="checked"/>'."<span style='color:blue'>".$questionFetched['ans3']."</span>".'</td>';
						echo "<tr></tr>";
						echo '<td>'.'<input type="radio" "/>'.$questionFetched['ans4'].'</td>';

						
					}
                    if($questionFetched['ans']=='4')
					{
		
						echo '<td>'.'<input type="radio" />'.$questionFetched['ans1'].'</td>';
						echo "<tr></tr>";
						echo '<td>'.'<input type="radio" />'.$questionFetched['ans2'].'</td>';
						echo "<tr></tr>";
						echo '<td>'.'<input type="radio" />'.$questionFetched['ans3'].'</td>';
						echo "<tr></tr>";
						echo '<td>'.'<input type="radio" checked="checked" />'."<span style='color:blue'>".$questionFetched['ans4']."</span>".'</td>';


					}
					 if($questionFetched['ans']=='0')
					{
		
						echo '<td>'.'<input type="radio" />'.$questionFetched['ans1'].'</td>';
						echo "<tr></tr>";
						echo '<td>'.'<input type="radio" />'.$questionFetched['ans2'].'</td>';
						echo "<tr></tr>";
						echo '<td>'.'<input type="radio" />'.$questionFetched['ans3'].'</td>';
						echo "<tr></tr>";
						echo '<td>'.'<input type="radio" />'.$questionFetched['ans4'].'</td>';
						echo "<tr></tr>";
						
						echo '<td>'.'<input type="radio" checked="checked" />'."<span style='color:red'>'Answer Not Provided'</span>".'</td>';


					}

					  ?>

				<!-- </td> -->
			</tr>
			<?php $i++;}  ?>
			<!-- End of ans code -->
		</table>
			</div>