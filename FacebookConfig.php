<?php

if(!session_id())
    session_start();

require_once "Facebook/autoload.php";

$app_id = "2634309480212645";
$app_secret = "9447e197ee837979f4efc312ff52e3b8";
$callback_url = "http://localhost/Workspace%20HTML/MoviePassTP/fb-callback.php";

$fb = new Facebook\Facebook([
  'app_id' => $app_id,
  'app_secret' => $app_secret,
  'default_graph_version' => 'v8.0',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl($callback_url, $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
?>