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
	
	public function addCategory($category_name)
	{
		$query="insert into category values('','$category_name')";
		$result=$this->conn->query($query);
		if ($result) {
		return true;
		}else{
			return false;
		}


	}
	public function addQuestion($question,$option1,$option2,$option3,$option4,$right_answer,$category_id)
	{
		
		$query="INSERT INTO `questions` (`id`, `question`, `ans1`, `ans2`, `ans3`, `ans4`, `ans`, `cat_id`) VALUES (NULL, '$question', '$option1 ', '$option2 ', '$option3 ', '$option4 ', '$right_answer', '$category_id');";
		
		$result=$this->conn->query($query);
		if ($result) {
		return true;
		}else{
			return false;
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
	
	public function signin($email,$password)
	{
		//echo"$email";
		$query=$this->conn->query("select * from admin where email='$email' and password='$password'");
		$query->fetch_array(MYSQLI_ASSOC);

		$query2=$this->conn->query("select * from admin where email='$email' and password='$password'");
		$result=$query2->fetch_array(MYSQLI_ASSOC);
		// var_dump($result);
		if($query->num_rows>0)
		{
			$_SESSION['login']=true;
			$_SESSION['name']=$result['name'];
			$_SESSION['email']=$result['email'];
			// $_SESSION['photo']=$result['img'];
			$_SESSION['admin_id']=$result['id'];
			header("Location: index.php");
			
		}
		
		
		
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