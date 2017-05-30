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
  'app_id' => '{app-id}', // Replace {app-id} with your app id
  'app_secret' => '{app-secret}',
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