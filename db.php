<?php 
require 'lib/rb.php';
R::setup( 'mysql:host=127.0.0.1;dbname=site','root', 'root' ); 

if ( !R::testconnection() )
{
	exit ('Нет соединения с базой данных');
}

session_start();

$user;

if (isset($_SESSION['logged_user']) ) {
     $user = R::findOne('users', 'email = ?', array($_SESSION['logged_user']));
     if (! $user ) {
     	// Critical error
     	unset($_SESSION['logged_user']);
     }
}

$url = $_SERVER['REQUEST_URI'];

$url = explode('?', $url);

$url = $url[0];

 
if($url != "/test.php" && $url != "/check.php" && isset($_SESSION['logged_user']) ) {
	if($user->ans != 0) {
		$user->ans = 0;
	}
	if($user->control != 0) {
		$user->control = 0;
	}
	R::store($user);
}