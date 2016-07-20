<?php

	if (isset($_GET["Lang"]))
	{
		$_SESSION["Lang"] = $_GET["Lang"];
	}
	else
	{
		$_SESSION["Lang"] = "ru";
	}
	
	$lan = $_SESSION["Lang"];
		
	$langfile = "localization/".$lan.".php";
		
	if (!is_file($langfile))
	{
		$langfile = "localization/ua.php";
	}
	
	include($langfile);
?>