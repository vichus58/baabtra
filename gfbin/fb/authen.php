<?php
require_once __DIR__ . '\vendor\autoload.php';

session_start();


$fb=$_SESSION['ambig'];
$mp=$_SESSION['fb_access_token'];
try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,name,gender,email', $mp);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$user = $response->getGraphUser();

echo 'Name: ' . $user['name'];
var_dump($user);
// OR
// echo 'Name: ' . $user->getName();



?>