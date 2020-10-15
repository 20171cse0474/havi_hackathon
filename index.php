<?php
session_start();
error_reporting(0);
include("dbconnection.php");
if(isset($_POST['login']))
{
  $adminusername=$_POST['username'];
  $pass=md5($_POST['password']);
$ret=mysqli_query($con,"SELECT * FROM admin WHERE username='$adminusername' and password='$pass'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="manage-users.php";
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
echo "<script>window.location.href='".$extra."'</script>";
exit();
}
else
{
$_SESSION['action1']="*Invalid username or password";
$extra="index.php";
echo "<script>window.location.href='".$extra."'</script>";
exit();
}
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
   <title>Admin | Login</title>
<style>
#login-page{
  border-radius: 24px;
    box-shadow: 2px 5px 9px #5c5d7b;
    width: 20%;
    height: 259px;
    margin-top: 13%;
    margin-left: 39%;
}
#h2{
  margin-left: 33%;
    position: relative;
    top: 20px;
}
#l1{
  position: relative;
    left: 24px;
    top: 30px;
}
#l2{
  position: relative;
    left: 26px;
    top: 9px;
}
#t2{
  position: relative;
    left: 114px;
    top: -5px;
}
#t3{
  position: relative;
    left: 114px;
    top: -27px;
}
#submit{
  position: relative;
    left: 218px;
}
#adminh{
  margin-left: 41%;
    position: relative;
    top: 75px;
}
</style>

  </head>

  <body>
  <h1 id="adminh">ADMIN LOGIN</h2>
	  <div id="login-page">
	  	
      
	  	
		      <form class="form-login" action="" method="post">
		        <h2 id="h2">Sign In</h2>
                
                    <?php echo $_SESSION['action1'];?><?php echo $_SESSION['action1']="";?></p>
                    <p id="l1">User ID</p>
		            <input type="text" name="username" id="t2"  placeholder="User ID" autofocus>
		            <br>
                <p id="l2">Password </p>
		            <input type="password" name="password" id="t3" placeholder="Password"><br >
		            <input id="submit" name="login" class="btn" type="submit">
		         
		        </div>
		      </form>	  	
	  	
	  	</div>
	  </div>
   


  </body>
</html>
