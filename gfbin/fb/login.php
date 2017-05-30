<?php
require_once __DIR__ . '\vendor\autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '726437707527497', // Replace {app-id} with your app id
  'app_secret' => 'baaf77a634dab7d557b9309aa4f73a85',
  'default_graph_version' => 'v2.2',
  ]);
if(!session_id()) {
    session_start();
}
$_SESSION['ambig']=$fb;

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost/baabtra/gfbin/fb/fb-callback.php', $permissions);

header('Location:'.$loginUrl);

?>