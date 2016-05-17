<?php
session_start();
require 'autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;

define('CONSUMER_KEY', 'zaAxyFJw1nMA872RS3Pbh1RHR'); // add your app consumer key between single quotes
define('CONSUMER_SECRET', 'D9p5hAfYWxhrrOU7C3uf9r8dzQyzF3hxYmpbkXF78CuIU8eSfm'); // add your app consumer secret key between single quotes
define('OAUTH_CALLBACK', 'https://codingchriss.github.io/sergeantmax/callback.php'); // your app callback URL

if (!isset($_SESSION['access_token'])) {
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
	$_SESSION['oauth_token'] = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
	$url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
	echo $url;
} else {
	$access_token = $_SESSION['access_token'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	$user = $connection->get("account/verify_credentials");
	echo $user->screen_name;
}
