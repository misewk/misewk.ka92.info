<?php	
	$LangCount = count($LangParam);
	
	$ActivePage = $_GET["p"];
	$lan = $_SESSION["Lang"];
	
	for ($i = 0; $i < $LangCount; $i++)
	{
		if ($lan != $LangParam[$i]["key"])
		{
			$obj->assign("LANG_ACTION", $ActivePage."&Lang=".$LangParam[$i]["key"]);
			//$obj->assign("LANG_PICTURE", $LangParam[$i]["img"]);
			$obj->assign("LANG_NAME", $LangParam[$i]["title"]);
			
			$obj->parse("MENU_LANG_ITEM", "link_lang");
			//$obj->assign("MENU_LANG_ITEM", $LangParam[$i]["title"]);
			$obj->parse("LangMenu", ".mli");
			
			// temporary
			$obj->assign("LangMenu", "");
		}
	}
?>