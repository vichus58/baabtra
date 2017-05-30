<?php
//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '394592350889-j4v05pisoikp28us9po8diiu02hogq15.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'jSxB7TgXGhAjAlcvoivMQBMM'; //Google client secret
$redirectURL = 'http://localhost/baabtra/ggle/auth.php'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('login with google');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>