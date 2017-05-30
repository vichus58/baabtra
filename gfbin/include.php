<?php


/** 
* @author : vishnu
* @date : 27/5/17
* @last modified on :27/5/17
*/
$userid=$_SESSION['userid'];

$con=mysqli_connect("localhost","root","123","login") or die("error");
?>
<table align="right">
	<tr>
		<td><a href="home.php">HOME</td>
		<td><a href="exp.php">EXPERIENCE</td>
		<td><a href="quali.php">QUALIFICATION</td>
		<td><a href="login.php">LOGOUT</td>	

	</tr>
		
</table>