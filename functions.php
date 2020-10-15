<?php
$connection = mysqli_connect("localhost","root","","havi");
if(isset($_POST['submit']))
{
    $id=$_POST['id'];
    $name=$_POST['name'];
    $result=mysqli_query($connection,"INSERT into product values('$id','$name')");
    if($result)
    {
        header("location:welcome.php");
    }
    else{
        echo "failed";
    }
}