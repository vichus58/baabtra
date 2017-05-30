<?php

// $logoutUrl='https://www.facebook.com/logout.php?next=http://localhost/baabtra/gfbin/index.php&access_token='.$token;

// header('Location: '.$logo);
require_once __DIR__ . '\fb\vendor\autoload.php';



if(!isset($_COOKIE['token'])) {
    echo "Cookie named '" . $token . "' is not set!";
} else {
    $token= $_COOKIE['token'];
}


$fb = new Facebook\Facebook([
  'app_id' => '726437707527497', // Replace {app-id} with your app id
  'app_secret' => 'baaf77a634dab7d557b9309aa4f73a85',
  'default_graph_version' => 'v2.2',
  ]);
if(isset($token))
{
	$helper = $fb->getRedirectLoginHelper();

$permissions = ['email'];
$loginUrl = $helper->getLogoutUrl($token,'http://localhost/baabtra/gfbin/index.php', $separator='&');


header('Location:'.$loginUrl);
}
else
{
	 header('Location:index.php');	
}

?>