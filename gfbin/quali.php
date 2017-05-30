<?php

session_start();
/**
* @author : vishnu
* @date : 27/5/17
* @last modified on : 27/5/17
*/

//import include.php
include("include.php");

//creating query fro database operation
$query="SELECT * FROM tbl_qualification WHERE fk_int_user_id=$userid";

//executing query and storing result to variable result
$result=mysqli_query($con,$query);


?>
<table border='1'>
<tr>
	<td>
		Qulification
	</td>
	<td>percentage</td>
</tr>
	
<?php
//adding results to the table by each row 
while($fetch=mysqli_fetch_row($result))
{
	echo "<tr>";
	echo "<td>";
	echo $fetch[2];
	echo "</td>";
	echo "<td>";
	echo $fetch[3];
	echo "</td>";
	echo "</tr>";
}
