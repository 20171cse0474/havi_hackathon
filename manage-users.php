<?php
session_start();
include'dbconnection.php';
// checking session is valid for not 
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

// for deleting user
if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($con,"delete from users where id='$adminid'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
}
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin | Manage Users</title>
<style>
    table  {
    border-collapse: collapse;
    width: 100%;
    color: #588c7e;
    font-family: monospace;
    font-size: 20px;
    text-align: left;
}
th{
   background-color:#588c7e;
   color: white;
}
tr:nth-child(even){
   background-color:#f2f2f2;
}
#adminh{
    margin-left: 35%;
}
#logout{
    text-decoration: none;
    font-size: 22px;
    font-weight: bold;
    margin-left: 90%;
    }
#h4{
        font-size: 21px;
    position: relative;
    top: 20px;
    }
#edit{
    text-decoration: none;
    position: relative;
    left: 24px;
}
</style>
</head>
<body>
    <h1 id="adminh">ADMIN DASHBOARD</h1>
    <a id="logout" href="logout.php">Logout</a>
    
    <table>
	                  	  	  <h4 id="h4"> All User Details </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Sno.</th>
                                  <th class="hidden-phone">First Name</th>
                                  <th> Last Name</th>
                                  <th> Email Id</th>
                                  <th>Contact no.</th>
                                  <th>Reg. Date</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $ret=mysqli_query($con,"select * from users");
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['fname'];?></td>
                                  <td><?php echo $row['lname'];?></td>
                                  <td><?php echo $row['email'];?></td>
                                  <td><?php echo $row['contactno'];?></td>  <td><?php echo $row['posting_date'];?></td>
                                  <td>
                                     
                                     
                                     <a id="edit"href="manage-users.php?id=<?php echo $row['id'];?>"> 
                                     <button class="btndel" onclick="return confirm('Do you really want to delete');" style="display: none;"></button>Delete</a>
                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                          </table>
                      

  </body>
</html>
<?php } ?>