<?php

//find the session

session_start();

//unset all the session variables

$_SESSION =array();

//destroy the session cookie

if (isset($_COOKIE[session_name()])) {
	setcookie(session_name(), '',time()-42000, '/');

	//destroy the session

	session_destroy();

	header("Location: login.php");
}

?>

<<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>

</body>
</html>