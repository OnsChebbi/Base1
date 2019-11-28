<?php

session_start();

	
	
	if(!$_SESSION['Username'])
	{
	 header('Location: login.php')	;
	}
?>