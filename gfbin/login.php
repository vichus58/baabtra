<?php

/**
* @author : vishnu
* @date : 27/5/17
* @last modified on : 27/5/17
*/

//storing email and password passed by post method into variables
$email		=$_POST['email'];
$password	=$_POST['pwd'];

//starting session
session_start();

//establishing connection with database
$con=mysqli_connect("localhost","root","123","login") or die("error");

//writing query for database operation
echo $query="SELECT * FROM tbl_users WHERE vchr_email='$email' and vchr_password='$password'";

//executing the query
$result=mysqli_query($con,$query);
$userid=0;
while ($data=mysqli_fetch_row($result)) {
	$userid=$data[0];
	$_SESSION['userid']=$userid;
	if($data[5]==1)
		$t=1;
	else
		$t=0;
}

//checking if the user is found on database or not
if($userid>0)
{
	//checking if the account is locked or not
	if($t==1)
	{
		header('location:index.php?status=lock');
	}
	else
	{
		header('location:home.php?account=normal');
		if(isset($_SESSION['attempt']))
		{
			$_SESSION['attempt']=0;
		}
	}
}
else
{
	$lock=0;
	//count the login attempts for blocking if exceeds maximum
	if(isset($_SESSION['attempt']))
	{
		$_SESSION['attempt']=$_SESSION['attempt']+1;
		echo $_SESSION['attempt'];
		if($_SESSION['attempt']>=3)
		{
			$query="UPDATE tbl_users set int_ac_lock=1 where vchr_email='$email'";

			$result=mysqli_query($con,$query);
			$lock=1;
		}
	}
	else
	{
		$_SESSION['attempt']=1;
	}
	if($lock==1)
	{
		@mail($email, "Your Account is locked");
		header('location:index.php?status=lock');
	}
	else
	{
		header('location:index.php?status=fail');
	}
	
}

?>