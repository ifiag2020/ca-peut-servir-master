<?php
session_start();
if (isset($_SESSION["session_login"])) {
	unset($_SESSION);
	session_destroy();
	echo "<script type='text/javascript'>window.location ='index.php';</script>";



}



?>