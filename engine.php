<?php
    session_start();

    // Create template
    include("class.FastTemplate.php");

    //
    $obj = new FastTemplate("tpl");

    //
    $obj->define(array(
                        "index"      => "index.tpl.html",
                        "link"       => "link.tpl",
                        "link_lang"  => "link_lang.tpl.html",
                        "mi"         => "menu_item.tpl",
                        "mli"        => "menu_lang_item.tpl",
                        "eil"        => "external_img_link.tpl.html",
                        "counter"    => "counter.tpl.html",
                        "main_table" => "main_table.tpl.html"
                        ));

    // Language settings
    include("localization/lang.php");
    include("localization/select_lang.php");

    include("langmenu.php");
    include("mainmenu.php");
    include("assign.php");

    //
    //bj->assign("HolidayBanner", "<img src=\"../i/23.png\" border=\"1\">");
    $obj->assign("HolidayBanner", "");
    //

    $Count = count($MainMenu);

    for ($i = 0; $i < $Count; $i++)
    {
        if ($_GET["p"] != $MainMenu[$i]["link"])
        {
            $obj->assign("P_ACTION", $MainMenu[$i]["link"]);
            $obj->assign("ACTION", "<font color=#666666>".$MainMenu[$i]["text"]."</font>");
            //$obj->assign("ACTION", "<div class=\"menu_color\">".$MainMenu[$i]["text"]."</div>");
            //$obj->assign("ACTION", $MainMenu[$i]["text"]);

            $obj->parse("MENU_ITEM", "link");
        }
        else
        {
            $obj->assign("MENU_ITEM", "<b>".$MainMenu[$i]["text"]."</b>");
        }

        $obj->parse("MainMenuHeader", ".mi");
        $obj->parse("MainMenuFooter", ".mi");

    /*
        if ($_GET["p"] == $MainMenu[$i]["link"])
        {
            $obj->assign("MENU_ITEM", "<b>".$MainMenu[$i]["text"]."</b>");
        }
        else
        {
            $obj->assign("P_ACTION", $MainMenu[$i]["link"]);
            $obj->assign("ACTION", $MainMenu[$i]["text"]);

            $obj->parse("MENU_ITEM", "link");
        }
        */

    }

    $obj->assign("SiteCaption", "Футбол для друзей");
    $obj->assign("MainCaption", "Футбольный тотализатор");
    $obj->assign("TopBannerImg", "<img src=\"/i/euro2016-logo.png\" alt=\"Евро 2016\">");
    $obj->assign("TopBanner", "<div class=\"size45\">ЧЕ 2016 Франция.</div>");

    $ActivePage = $_GET["p"];

    $TableTitle = "";
    $TableFill = "";

    if (isset($Assign[$ActivePage]))
    {
        include($Assign[$ActivePage]);
    }
    else
    {
        include($Assign["no"]);
    }

    $obj->assign("EX_ACTION", "http://notepad-plus.sourceforge.net");
    $obj->assign("EX_TITLE",  "Notepad++");
    $obj->assign("EX_IMG", "../i/npp.logo4.png");

    //$obj->parse("Banner", ".eil");

    //$Npp = "<a href=http://notepad-plus.sourceforge.net title=Notepad++ target=new><img src= border=1></a>";

    $Counter = <<<HTML
<a href="http://freehost.com.ua" title="Надежный украинский хостинг: UNIX & WINDOWS">
<script language="JavaScript">
<!--
r=Math.random();
ref=document.referrer;x=screen.width;y=screen.height;
bps=screen.colorDepth;lng=navigator.systemLanguage;
document.write("<img src=\"http://tools.freehost.com.ua/cnt.php?&ct=1&cid=3609&");
document.write("ref="+escape(ref)+"&x="+x+"&y="+y+"&bps="+bps+"&lng="+lng+"&r="+r+"\" ");
document.write("border=0>");
//-->
</script>
</a>
<a href="http://www.jetbrains.com/phpstorm/" style="display:block; background:#fff url(http://www.jetbrains.com/phpstorm/documentation/phpstorm_banners/phpstorm1/phpstorm468x60_white.gif) no-repeat 10px 50%; border:solid 1px #5854b5; margin:0;padding:0;text-decoration:none;text-indent:0;letter-spacing:-0.001em; width:466px; height:58px" alt="Smart IDE for PHP development with HTML, CSS &amp; JavaScript support" title="Smart IDE for PHP development with HTML, CSS &amp; JavaScript support"><span style="margin: 3px 0 0 65px;padding: 0;float: left;font-size: 12px;cursor:pointer;  background-image:none;border:0;color: #5854b5; font-family: trebuchet ms,arial,sans-serif;font-weight: normal;text-align:left;">Developed with</span><span style="margin:0 0 0 185px;padding:18px 0 2px 0; line-height:13px;font-size:13px;cursor:pointer;  background-image:none;border:0;display:block; width:270px; color:#5854b5; font-family: trebuchet ms,arial,sans-serif;font-weight: normal;text-align:left;">Smart IDE for PHP development with HTML, CSS &amp; JavaScript support</span></a>
HTML;

    //$obj->parse("Banner", ".eil");
    //$obj->parse("Banner", ".counter");
    $obj->assign("Banner", "");

    // $Lan["Auth"]
    $obj->assign("Author", "2006-2016 Михаил Сидоренко");

    // parse template "index" and store in handler "result"
    $obj->parse("result", "index");

    // print contents of handler "result"
    $obj->FastPrint("result");

    /*
    {LangMenu}

    {MainCaption}

    {TopBanner}

    {MainMenuHeader}

    {BodyCaption}
    {BodyMenu}
    {Body}

    {MainMenuFooter}

    {Banner}

    {Author}
    */
?>