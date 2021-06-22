<?php 

session_start();
class users {
	public $host="localhost";
	public $username= "root";
	public $pass="";
	public $db_name= "quiz";
	public $conn;
	public $data;
	public $cat;
	public $exam_history;
	public $options;
	public $qus;
	public function __construct()
	{

		$this->conn=new mysqli($this->host,$this->username,$this->pass,$this->db_name);
		if($this->conn->connect_errno)
		{
			die("database connection failed".$this->conn->connect_errno);
		}
	}
	public function insert_result($cat_id,$score)
	{

	   $user_id= $_SESSION['user_id'];
		$query="insert into score values('','$user_id','$cat_id',$score','')";
		$result=$this->conn->query($query);
		if ($result) {
		return true;
		}


	}
	public function signup($name,$email,$password,$img)
	{
	$query=$this->conn->query("select email from signup where email='$email' ");
		$query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0)
		{
			$_SESSION['errormsg']="Email Allready Exist";
			return false;


		}
		else{
		$query="insert into signup values('','$name','$email','$password','$img')";
		$query=$this->conn->query($query);
		if ($query) {
			$_SESSION['errormsg']="Added Succesfully";
			return true;
		}


	}



	}
	
	public function signin($email,$pass)
	{
		//echo"$email";
		$query=$this->conn->query("select * from signup where email='$email' and pass='$pass'");
		$query->fetch_array(MYSQLI_ASSOC);

		$query2=$this->conn->query("select * from signup where email='$email' and pass='$pass'");
		$result=$query2->fetch_array(MYSQLI_ASSOC);
		// var_dump($result);
		if($query->num_rows>0)
		{
			$_SESSION['login']=true;
			$_SESSION['name']=$result['name'];
			$_SESSION['user_id ']=$result['id'];
			$_SESSION['email']=$result['email'];
			$_SESSION['photo']=$result['img'];
			$_SESSION['user_id']=$result['id'];
			// return true;
			echo ("<SCRIPT LANGUAGE='JavaScript'>
			    window.alert('Succesfully Login')
			    window.location.href='index.php';
			    </SCRIPT>");
		}
		else
		{
			
			$_SESSION['errormsg']="Email Password Do not Matched";
			header("Location: login.php");
		}
		
		
		
	}
	public function users_profile($email)
	{
		// echo $email;
		$query=$this->conn->query("select * from signup where email='$email'");
		$row=$query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0)
		{
			
			$this->data[]=$row;
		}
		return $this->data;
		

		
	}
	public function cat_shows()
	{
		//echo $email;
		$query=$this->conn->query("select * from category");
		while($row=$query->fetch_array(MYSQLI_ASSOC))
		{
			$this->cat[]=$row;
		}
		
		return $this->cat;
		
	}

	// public function farhan_qus_shows()
	// {
	// 	//echo $email;
	// 	$query=$this->conn->query("select * from questions where cat_id='$qus'");
	// 	while($row=$query->fetch_array(MYSQLI_ASSOC))
	// 	{
	// 		$this->cat[]=$row;
	// 	}
		
	// 	return $this->cat;
		
	// }
	
  public function qus_show($qus)
  {     
  	// echo $qus;
	  $query=$this->conn->query("select * from questions where cat_id='$qus'");
		while($row=$query->fetch_array(MYSQLI_ASSOC))
		{
			$this->qus[]=$row;
		}
		
		return $this->qus;
	  
  } 
  public function num_rows_qus_show($qus)
  {    
   // echo $qus;
	  $query=$this->conn->query("select * from questions where cat_id='$qus'");
		$rows = mysqli_num_rows($query);
		return $rows;
	  
  } 
   public function cat_name($cat_id)
  {     
  	// $cat_id=$_SESSION['cat'];
	$query2=$this->conn->query("select * from category  where id='$cat_id'");
	$result=$query2->fetch_array(MYSQLI_ASSOC);
	 $cat_name=$result['cat_name'];

	 // var_dump($cat_name);
	  return $cat_name;
	  
  }
  public function qus_show_new($qus)
  {     
	  $query=$this->conn->query("select * from questions where cat_id='$qus'");
	  return $query;
	  
  }  
 //  public function exam_history()
 //  {     
	//   $query=$this->conn->query("SELECT * FROM `score` as s
	// INNER JOIN category as cat ON s.cat_id=cat.id
	// INNER JOIN signup as u ON s.u_id = u.id
	// where u_id = '".$_SESSION['user_id']."'");
	//   // return $query;
	//   while($row=$query->fetch_array(MYSQLI_ASSOC))
	// 	{
	// 		$this->exam_history[]=$row;
	// 	}
		
	// 	return $this->exam_history;
	  
 //  } 
  public function exam_history()
  {     
	 $query=$this->conn->query("SELECT * FROM `score` as s
	 INNER JOIN category as cat ON s.cat_id=cat.id
	 INNER JOIN signup as u ON s.u_id = u.id
	 where u_id = '".$_SESSION['user_id']."'");
     return $query;
	  
  } 
   public function rank_details()
  {    

	 $query=$this->conn->query("SELECT score.u_id, signup.id, 
signup.name, SUM( score.score ) AS totalScore 
FROM score INNER JOIN signup ON signup.id = score.u_id
GROUP BY signup.id ORDER BY totalScore DESC LIMIT 5");
     return $query;
	  
  }
  public function answer($data)
  {
	  // var_dump($data['cat_id']);
	  $ans=implode("",$data);
	  // var_dump($ans);
	  $right=0;
	  $wrong=0;
	  $no_answer=0;
	  
	  // $query=$this->conn->query("select id,ans from questions where cat_id='".$_SESSION['cat']."'");
	  $query=$this->conn->query("select id,ans from questions where cat_id='".$data['cat_id']."'");
		while($qust=$query->fetch_array(MYSQLI_ASSOC))
		{
				if($qust['ans']==$_POST[$qust['id']])
				{
					$right++;
				}
				elseif($_POST[$qust['id']]=="no_attempt")
				{
					$no_answer++;
				}
				else 
				{
					$wrong++;
				}
		}
		
		/* echo "right Answer".$right."<br>";
		echo "No Answer".$no_answer."<br>";
		echo "Wrong Answer".$wrong."<br>"; */
  $array=array();
$array['right']=$right;
$array['wrong']=$wrong;
$array['no_answer']=$no_answer;
         $user_id= $_SESSION['user_id'];
		 $sql = "INSERT INTO score(u_id,cat_id,score)VALUES ('$user_id','".$data["cat_id"]."','$right')";
		$result=$this->conn->query($sql);
		if ($result) {
			return $array;
		}
		else{

		}


  }
  public function url($url)
	{
		header("location:".$url);
	}
	
	public function add_quiz($r)
	
	{
	   $row=$this->conn->query($r);
		 return true; 
		//print_r($r);
		//echo $r;
	}
	
	
}

 ?>