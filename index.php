<?php session_start();
require_once('dbconnection.php');


if(isset($_POST['signup']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$contact=$_POST['contact'];
	$enc_password=$password;
$sql=mysqli_query($con,"select id from users where email='$email'");
$row=mysqli_num_rows($sql);
if($row>0)
{
	echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
} else{
	$msg=mysqli_query($con,"insert into users(fname,lname,email,password,contactno) values('$fname','$lname','$email','$enc_password','$contact')");

if($msg)
{
	echo "<script>alert('Register successfully');</script>";
}
}
}


if(isset($_POST['login']))
{
$password=$_POST['password'];
$dec_password=$password;
$useremail=$_POST['uemail'];
$ret= mysqli_query($con,"SELECT * FROM users WHERE email='$useremail' and password='$dec_password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="welcome.php";
$_SESSION['login']=$_POST['uemail'];
$_SESSION['id']=$num['id'];
$_SESSION['name']=$num['fname'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
echo "<script>alert('Invalid username or password');</script>";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');

exit();
}
}




?>
<!DOCTYPE html>
<html>
<head>
<title>Login System</title>
<style>

#reg{
	border-radius: 24px;
    box-shadow: 2px 5px 9px #5c5d7b;
    width: 20%;
    height: 447px;
	margin-left: 276px;
    margin-top: 112px;
}
#t{
	
	position: relative;
    left: 117px;
    top: 24px;
}
#p1{
	position: relative;
    left: 12px;
    top: 60px;
}
#p2{
	position: relative;
    left: 12px;
    top: 60px;
}
#p3{
	position: relative;
    left: 12px;
    top: 60px;
}
#p4{
	position: relative;
    left: 12px;
    top: 60px;
}
#p5{
	position: relative;
    left: 12px;
    top: 60px;
}
#btn{
	position: absolute;
	top: 78%;
    left: 23%;
}
#btn2{
	position: absolute;
	top: 78%;
    left: 30%;
}
#h1{
	position: absolute;
    top: 169px;
    font-size: 20px;
    left: 25%;
}
#h2{
	position: absolute;
    top: 255px;
    font-size: 20px;
    left: 58%;
}
#login{
	border-radius: 24px;
    box-shadow: 2px 5px 9px #5c5d7b;
    width: 20%;
    height: 259px;
    margin-left: 49%;
    margin-top: -24%;
}
#loginform{
	position: absolute;
    top: 33%;
    right: 37%;
}
#l1{
	position: relative;
    left: 34px;
    top: 70px;
}
#l2{
	position: relative;
    left: 34px;
    top: 42px;
}
#t2{
	position: relative;
    left: 133px;
    top: 34px;
}
#t3{
	position: relative;
    left: 133px;
    top: 6px;
}
#submit{
	position: relative;
    left: -18px;
    top: 60px;
}
#mainh{
	margin-left: 43%;
}
</style>
</head>
<body>
<h1 id="mainh">Register/Login</h1>
<div class="main">
		<h1 id="h1">Register</h1>
	 
			  	 
			
					
						<div id="reg">
							<form name="registration" method="post" action="" enctype="multipart/form-data">
								<p id="p1">First Name </p>
								<input type="text" id="t" value=""  name="fname" required >
								<p id="p2">Last Name </p>
								<input type="text" id="t" value="" name="lname"  required >
								<p id="p3">Email Address </p>
								<input type="text" id="t" value="" name="email"  >
								<p id="p4">Password </p>
								<input id="t" type="password" value="" name="password" required>
										<p id="p5">Contact No. </p>
								<input id="t" type="text" value="" name="contact"  required>
								<div class="sign-up">
									<input id="btn"  type="reset" value="Reset">
									<input id="btn2" type="submit" name="signup"  value="Sign Up" >
									<div class="clear"> </div>
								</div>
							</form>

						</div>
					</div>
				</div>		
			
							 <div id="login">
							
							<h2 id="h2">login</h2>
							<form id="loginform"name="login" action="" method="post" >
							<p id="l1">Email</p>
								<input type="text" id="t2" name="uemail" value="" placeholder="Enter your registered email"  >
								<p id="l2">Password </p>
								<input type="password" id="t3" value="" name="password" placeholder="Enter valid password" >

								
								
									<input id="submit" type="submit" name="login" value="LOG IN" >
									
									<div class="clear"> </div>
								</div>

							</form>
					</div>
				</div> 
			</div> 			        					 
				
							
				         	</div>           	      
				        </div>	
				     </div>	
		        </div>
	        </div>
	     </div>

</body>
</html>