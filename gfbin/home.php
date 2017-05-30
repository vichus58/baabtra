<html>
<body>

<?php

/** 
* @author : vishnu
* @date : 27/5/17
* @last modified on :27/5/17
*/

session_start();
	//check wheather the user logged in using normal account
	if(isset($_GET['account']) && $_GET['account']=='normal')
	{
		$fpt='<table align="right">
	<tr>
		<td><a href="home.php?account=normal">HOME</a></td>
		<td><a href="exp.php?account=normal">EXPERIENCE</a></td>
		<td><a href="quali.php">QUALIFICATION</a></td>
		<td><a href="index.php">LOGOUT</a></td>	

	</tr>
		
	</table>';
	echo $fpt;
	}
	//check wheather the user is logged in using google account
	elseif(isset($_GET['account']) && $_GET['account']=='google')
	{
		$userData=$_SESSION['userData'];

			$fpt='<table align="right">
	<tr>
		<td><a href="home.php?account=google">HOME</a></td>
		<td><a href="exp.php?account=google">EXPERIENCE</a></td>
		<td><a href="quali.php?account=google">QUALIFICATION</a></td>
		<td><a href="logout.php?account=google">LOGOUT</a></td>	

	</tr>
		
	</table>';
		$output =$fpt.'<h1>Google+ Profile Details </h1>';
        $output .= '<img src="'.$userData['picture'].'" width="300" height="220">';
        $output .= '<br/>Google ID : ' . $userData['oauth_uid'];
        $output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
        $output .= '<br/>Email : ' . $userData['email'];
        $output .= '<br/>Locale : ' . $userData['locale'];
        $output .= '<br/>Logged in with : Google';
        $output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Google+ Page</a>';
        $output .= '<br/>Logout from <a href="logout.php">Google</a>'; 
        echo $output;


	}
	
	
	?>
	
</body>
</html>