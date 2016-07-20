<?php
	
	$i = 0;
	
	$ImgFolder = "i\\lang\\";
	$ImgExt = ".png";
	
	//
	$LangParam[$i]["key"]   = "ua";
	$LangParam[$i]["title"] = "Українською";
	$LangParam[$i]["img"]   = $ImgFolder.$LangParam[$i]["key"].$ImgExt;
	
	//
	$LangParam[++$i]["key"] = "ru";
	$LangParam[$i]["title"] = "По-русски";
	$LangParam[$i]["img"]   = $ImgFolder.$LangParam[$i]["key"].$ImgExt;

	//
	$LangParam[++$i]["key"] = "en";
	$LangParam[$i]["title"] = "English";
	$LangParam[$i]["img"]   = $ImgFolder.$LangParam[$i]["key"].$ImgExt;

	/*
	$LangParam[++$i]["key"] = "new";
	$LangParam[$i]["title"] = "New";
	$LangParam[$i]["img"]   = $ImgFolder.$LangParam[$i]["key"].$ImgExt;
	*/
?>