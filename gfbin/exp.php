<?php
session_start();
include("include.php");
$query="SELECT * FROM tbl_exp WHERE fk_int_user_id=$userid";


$result=mysqli_query($con,$query);


?>

<table border='1'>
<tr>
	<td>
		period
	</td>
	<td>company</td>
</tr>
	
<?php
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
?>
</table>