<?php
//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '{client-id'; //Google client ID
$clientSecret = '{client-secret}'; //Google client secret
$redirectURL = 'your redirect url'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('login with google');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>