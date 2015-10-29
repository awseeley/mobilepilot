<?php

require_once("./common_db.php");
require_once("./session.php");
require_once("./login.php");

logout();
if(isset($_GET['continue']))
	header('Location: ' . $_GET['continue']);
else
	header('Location: index.php');
?>