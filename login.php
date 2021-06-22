
<?php
// error_reporting(0);
include("class/users.php");
include("messages.php");
// include("header.php");
$usr=new users;

if (isset($_POST['loginBtn'])) {
	$email=$_POST['email'];
	$password=$_POST['password'];
	if (empty($email) || empty($password)) {
			echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Field Empty')
    window.location.href='../login.php';
    </SCRIPT>");
		
	}
	else{
		$usr->signin($email,$password);
	}

}
if (isset($_POST['signUpBtn'])) {
	// var_dump($_POST);
	$name=$_POST['namesignup'];
	$email=$_POST['emailsignup'];
	$password=$_POST['passwordsignup'];
	$confirm_password=$_POST['passwordsignup_confirm'];
	// $img=$_POST['signupImg'];
	$img=$_FILES["signupImg"]["name"];
	//Pic
	$permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['signupImg']['name'];
    $file_size = $_FILES['signupImg']['size'];
    $file_temp = $_FILES['signupImg']['tmp_name'];
    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "user/".$unique_image;
	//Pic

	if (empty($email) || empty($confirm_password) || empty($password) || empty($img)) {
		$_SESSION['errormsg']="Field Empty";
		
	}elseif ($password!=$confirm_password) {
		$_SESSION['errormsg']="Confirmation password do not matched!!";
	}
	else{
	if ($usr->signup($name,$email,$password,$unique_image)) {
	
   move_uploaded_file($file_temp,"img/".$uploaded_image);
		}
		
	}

}
?>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
 
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login and Registration Form with HTML5 and CSS3</title>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="css/login.css" />
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		
    </head>
    <body>
        <div class="container">
           
            <header>
                <h1>Login and Registration Form</h1>
				
            </header>
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form method="post"  action="login.php" autocomplete="on"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="email" class="uname" > Your email</label>
                                    <input id="email" name="email" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label>
								</p>
								<span style="color: red"><?php echo $error; ?></span>
                                <p class="login button"> 
                                   <!-- <a href="http://cookingfoodsworld.blogspot.in/" target="_blank" ></a> -->
                                   <input id="loginBtn" name="loginBtn" type="submit" value="login"/> 
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Join us</a>
									
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  method="post" action="login.php" autocomplete="on" enctype="multipart/form-data"> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="namesignup" class="uname" >Your name</label>
                                    <input id="namesignup" name="namesignup" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail"  > Your email</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" >Your password </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" >Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" >Choose a Photo </label>
                 
                                    <input type="file" class="form-control" id="signupImg" name="signupImg" >
                                </p>
                                <p class="signin button"> 
									<input name="signUpBtn" type="submit" value="Signup"/> 
								</p>
								<span style="color: red"><?php echo $error; ?></span>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>