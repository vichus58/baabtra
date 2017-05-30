<?php
require_once __DIR__ . '\fb\vendor\autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '{app-id}', // Replace {app-id} with your app id
  'app_secret' => '{app-secret}',
  'default_graph_version' => 'v2.2',
  ]);
if(!session_id()) {
    session_start();
}
$_SESSION['ambig']=$fb;

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost/baabtra/gfbin/fb-callback.php', $permissions);

header('Location:'.$loginUrl);

?>