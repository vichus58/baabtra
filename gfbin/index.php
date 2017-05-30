<?php

/** 
* @author : vishnu
* @date : 27/5/17
* @last modified on :27/5/17
*/
    session_start();

//Include GP config file && User class
include_once 'gpConfig.php';
include_once 'User.php';




$_SESSION['userid']=0;

if(isset($_GET['code'])){
	$gClient->authenticate($_GET['code']);
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
	$gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
	//Get user profile data from google
	$gpUserProfile = $google_oauthV2->userinfo->get();
	
	//Initialize User class
	$user = new User();
	
	//Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        'locale'        => $gpUserProfile['locale'],
        'picture'       => $gpUserProfile['picture'],
        'link'          => $gpUserProfile['link']
    );
    $userData = $user->checkUser($gpUserData);
	
	//Storing user data into session
	$_SESSION['userData'] = $userData;
	
	//Render google profile data
    if(!empty($userData)){
        header('location:logout.php'); 
    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
} else {
	$authUrl = $gClient->createAuthUrl();

    $output = '<center><br><form align="center" action="login.php" method="POST">';
    $output .= '<input type="text" name="email" placeholder="Enter your email"> </br></br>';
    $output .= '<input type="password" name="pwd" placeholder="Enter Your Password"></br></br>';
    
    $output .= '<button name="login" type="submit">Login</button>';

    $output .= '</form>';
    $output .= '<hr><br>Or<br>';
	$output .= '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="images/glogin.png" alt="" width=150/></a>';
	$output .= '<a href="loginfb.php"><img src="images/fblog.png" alt="" width=150/></a>';
     

}
?>








<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login with Google</title>
<style type="text/css">
h1{font-family:Arial, Helvetica, sans-serif;color:#999999;}
</style>
</head>
<body>
<div>
<?php 

/**
* checking if there is any parameters passed using GET method
*/
    if(isset($_GET['status']) && $_GET['status']=='fail')
    {
        echo "<font color=red>Invalid email or password</font>";
    }
    elseif(isset($_GET['status']) && $_GET['status']=='lock')
    {
        echo "<font color=red>Your Account is locked.please check your email</font>";
    }
    elseif(isset($_GET['status']) && $_GET['status']=='unlocked')
    {
        echo "<font color=green>Your Account is active</font>";
    }
    echo $output; 
    
    ?></div>
</body>
</html>