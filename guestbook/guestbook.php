<?php

    define("GUEST_LIMIT", 10); // ���������� ��������� �� ��������

    //-------------------------------------------------
    //  ������� �������� ������ � ������ ��� ��������
    //-------------------------------------------------
    function DelGarbage($Text, $flag=0)
    {
        $Text = str_replace(array("<![CDATA[", "]]>"), "", $Text);
        $trans = get_html_translation_table(HTML_ENTITIES , ENT_QUOTES);
        $trans = array_flip($trans);
        $Text = strtr($Text, $trans);
        
        if($flag)
            return (trim($Text));
        else
            return htmlspecialchars(trim($Text), ENT_QUOTES);
    }



    //------------------------------------------
    //   ������� ��� HTML ����
    //------------------------------------------

    function DelHTML($text)
    {
    // $document �� ������ ������ ��������� HTML-��������.
    // ���������� ������� ��� HTML-����, ������ javascript,
    // ���������� �������. ����� ���������� �������� ���������
    // HTML-�������� �� �� ����������.

    $search = array ("'<script[^>]*?>.*?</script>'si",  // �������� javaScript
                     "'(<[\/\!]*?smal>)'si",           // �������� HTML-����
                     "'<[\/\!]*?[^<>]*?>'si",           // �������� HTML-����
                     "'([\r\n])[\s]+'",                 // �������� ���������� �������
                     "'&(quot|#34);'i",                 // �������� HTML-��������
                     "'&(amp|#38);'i",
                     "'&(lt|#60);'i",
                     "'&(gt|#62);'i",
                     "'&(nbsp|#160);'i",
                     "'&(iexcl|#161);'i",
                     "'&(cent|#162);'i",
                     "'&(pound|#163);'i",
                     "'&(copy|#169);'i",
                     "'&#(\d+);'e");                    // ���������������� ��� php-���

    $replace = array ("",
                      "\\1",
                      "",
                      "\\1",
                      "\"",
                      "&",
                      "<",
                      ">",
                      " ",
                      chr(161),
                      chr(162),
                      chr(163),
                      chr(169),
                      "chr(\\1)");

    return (preg_replace($search, $replace, $text));

    }

    //��������� �������
    function PageDraw($p, $count, $limit, $Act="p=guest")
    {
    $n = ceil($count / $limit);
    $Temp = "&nbsp;&nbsp;&nbsp;��������:&nbsp;";
    $z = (($p-10)<0?10-$p:0);
    if(!$z)
        $Temp .= "&nbsp;<a href=\"engine.php?$Act&page=0\" ><u>...</u></a>&nbsp;"; 

    for($i = ($p-10); $i < ($p+10) + $z; $i++)
        {
        if($i<0) continue;
        if($i >= $n) continue;
        if($i == $p)
            {
            $Temp .= "&nbsp;<span class=\"g_nav\">".($i+1)."</span>&nbsp;";        
            }
        else
            {
            $Temp .= "&nbsp;<a href=\"?$Act&page=$i\"><u>".($i+1)."</u></a>&nbsp;";        
            }
        }
    if($p != ($n-1)) 
        $Temp .= "&nbsp;<a href=\"?$Act&page=".($n-1)."\"><u>...</u></a>&nbsp;"; 

    return $Temp;
    }


    //---------------------------------------
    //  ������� ������ �������� �����
    //---------------------------------------

    function GuestBook($DataBaseName = "ka921_ka92", $User = "ka921_ka92", $PassWord = "ghtptynfwbz", $TableName = "t_guestbook1", $Host="db2.freehost.com.ua")
    //function GuestBook($DataBaseName = "total", $User = "admin", $PassWord = "admin", $TableName = "t_guestbook1", $Host="localhost")
    {
    //echo session_id()."<br>";
    //print_r($_SESSION);
        
    // include captcha question
    include_once("captcha.php");

    //  get random question
    $NumQuestion = rand(1, count($Captcha))-1;
    
    //  check fo questuon in sessions
    if(!isset($_SESSION["Question"])) $_SESSION["Question"] = $NumQuestion;

    $p = (isset($_GET["page"])?$_GET["page"]:0);

    mysql_pconnect($Host, $User, $PassWord);
    mysql_query('SET NAMES cp1251');
    mysql_select_db($DataBaseName);
    //��������� ������� ������� 
    //$Tables = mysql_query("show tables");
    //$TableNameExits = false;
    //while($Table = mysql_fetch_row($Tables))
    //    {   
    //    if($Table[0] == $TableName)
    //        $TableNameExits = true;
    //    }
    //if($TableNameExits == false)
    //    {
    //    $create = "create table " . $TableName .
    //                "(Ident INT NOT NULL AUTO_INCREMENT ,".
    //                "s_Name VARCHAR( 255 ) NOT NULL ,".
    //                "t_Text TEXT NOT NULL ,".
    //                "i_Time INT NOT NULL ,".
    //                  "_ip VARCHAR( 255 ) ,".
    //                "PRIMARY KEY (Ident) ,".
    //                "INDEX (i_Time))";
    //  
    //    mysql_query($create);
    //    }

    $name = "";
    $text = "";
    $Text = "";
    /////////////////////////////////////////////
    if(isset($_POST["g_text"]))
        {
        // save post to log for analize
        $ff = fopen(dirname(__FILE__)."/log/".date("d.m.Y").".log", "a");
        if($ff)
            {
            fwrite($ff, "[".date("H:i:s")."] \t ".print_r($_POST, 1)."\n-----------------\n");
            fclose($ff);
            }
        
        //$name = str_replace("������ �", "����� �",DelGarbage(trim($_POST["g_name"])));    
        $name = DelGarbage(trim($_POST["g_name"]));
        $text = preg_replace("/\[img=([^\]]+)\]/i", "<img src=\$1 />", DelGarbage(DelHTML(trim($_POST["g_text"]))));
            
        if (strtolower($name) == "misewk")
            {
                $Text .= "<center style=\"color: #FF0000;\">��-��-��, ��� ����� <b>misewk</b> ���� ������ ������ � :-)!</center>";
            }   
        elseif(empty($name))
            {
                $Text .= "<center style=\"color: #FF0000;\">�������� ����</center>";
            }
        elseif(empty($text))
            {
                $Text .= "<center style=\"color: #FF0000;\">�������� ���������</center>";
            }
        else
            {
            
            if (strtolower($name) == "#misewk#") $name = "misewk";
            
            if(isset($_POST["g_ques"])) 
            {
                $answer = strtolower(DelGarbage(DelHTML(trim($_POST["g_ques"]))));

                //echo "ffff";
                //echo $Captcha[$_SESSION["Question"]]["answer"];
                if (($answer != strtolower($Captcha[$_SESSION["Question"]]["answer"])))
                {
                    $Text .= "<center style=\"color: #FF0000;\">������������ ����� �� ����������� ������</center>";
    //                $Text .= "<center style=\"color: #FF0000;\">³��� ������� �� ���������� ������� ���� ".$Captcha[$_SESSION["Question"]]["answer"]."</center>";

                }
                else
                {
                    $Text .= "<center style=\"color: #FF0000;\">��������� ���������</center>";
                    //$res = mysql_query("select Ident from $TableName where s_Name='$name' and t_Text = '$text' and i_Time > ".time()." limit 1");
            //        $res = mysql_query("select Ident from $TableName where s_Name='$name' and t_Text = '$text' limit 1");
    //            if(mysql_num_rows($res))
            //            {
    //            
    //            }
    //        else
    //            {
                    if(mysql_query("INSERT INTO $TableName (s_Name,t_Text,i_Time,_ip)VALUES('$name','$text','".(time())."', '".GetIP()."' )"))
                       {
    //            }
                    @mysql_free_result($res);
                    echo "<script language=\"JavaScript\" type=\"text/javascript\"><!--
                      window.location.href='engine.php?p=guest';
                      //--></script>";
                    //header("Location: index.php");
                    exit;
                    }
                    
                }
            }
            else
            {
                $Text .= "<center style=\"color: #FF0000;\">������������ ����� �� ����������� ������</center>";        
            }
            
            }

        }



    //////////////////����� ��� ��������

    $Text .= "<form method=\"post\" action=\"engine.php?p=guest&page=$p\">";
    $Text .= "<table border=\"0\" cellspacing=\"5\" cellpadding=\"0\" align=\"center\" frame=\"box\">";
    $Text .= "<tr><td align=\"center\" colspan=\"2\">�������� ���������</td></tr>";
    $Text .= "<tr><td align=\"right\">��� �����:</td><td><input type=\"text\" name=\"g_name\" size=\"70\" value=$name></td></tr>";
    $Text .= "<tr><td align=\"right\" valign=\"top\">��� �����:</td><td><textarea name=\"g_text\" cols=\"60\" rows=\"10\">$text</textarea></td></tr>";
    //$Text .= "<tr><td align=\"right\" valign=\"top\">Lim(sin(x)/x, x->0)=</td><td><input type=\"text\" name=\"g_ques\" cols=\"60\" rows=\"10\"></textarea></td></tr>";
    //$Text .= "<tr><td align=\"right\" valign=\"top\">x<sup>2</sup> + 1 = 0, x-?</td><td><input type=\"text\" name=\"g_ques\" cols=\"60\" rows=\"10\"></td></tr>";
    $Text .= "<tr><td align=\"right\" valign=\"top\">".$Captcha[$NumQuestion]["question"]."</td><td><input type=\"text\" name=\"g_ques\" cols=\"60\" rows=\"10\"></td></tr>";
    $Text .= "<tr align=center><td align=\"center\" colspan=\"2\"><input type=\"submit\" name=\"submit\" value=\"���������\" class=\"btn\"></td></tr>";
    $Text .= "</table>";
    $Text .= "</form>";

    /////////////////////////////////////
    if(!session_id()) session_start();
    
    //echo session_id()."<br>";
    //print_r($_SESSION);

    $_SESSION["Question"] = $NumQuestion;

    //echo "sess stop = " .$_SESSION["Question"];

    ////////////////////////////////////////////
    $query = "select sql_calc_found_rows * from ".$TableName." order by i_Time desc limit ".($p * GUEST_LIMIT).",".GUEST_LIMIT;


    $res = mysql_query($query);
    if($res)
        {
        $result = mysql_query("SELECT FOUND_ROWS();");
        $tempres = mysql_fetch_array($result);

        $count = $tempres[0];
        $Text .= PageDraw($p, $count, GUEST_LIMIT);
        $Text .= "<table width=\"96%\" cellspacing=\"2\" cellpadding=\"5\" align=\"center\" class=\"g_table\">";
        for($i=0;$i<mysql_num_rows($res);$i++)
            {
            $name = mysql_result($res,$i,"s_Name");
            $txt  = strtr(nl2br(mysql_result($res,$i,"t_Text")), array("\\\"" => "\"", "&quot;" => "\""));
            $time = mysql_result($res,$i,"i_Time");
            $IP =   mysql_result($res,$i,"_ip");
            if($i)
                $Text .= "<tr><td height=\"2\" class=\"g_sep\"></td></tr>";

            $Text .= "<tr><td class=\"g_top\" align=\"left\"><span class=\"g_date\">[".date("d.m.y H:i:s", $time)."]</span>&nbsp;&nbsp;&nbsp;<span class=\"g_nav\">$name</span><span style=\"color:#cfcfcf;\"> (".$IP.")</span></td></tr>";
            $Text .= "<tr><td colspan=\"2\" class=\"g_text\">$txt</td></tr>";
            $Text .= "<tr><td height=\"1\"></td></tr>";

            }
        $Text .= "</table>";
        $Text .= PageDraw($p, $count, GUEST_LIMIT);
        mysql_free_result($res);
        mysql_free_result($result);
        }

    return $Text;
    }

    function GetIP() 
    {
       if(isset($_SERVER['HTTP_X_REAL_IP'])) return $_SERVER['HTTP_X_REAL_IP'];

       return $_SERVER['REMOTE_ADDR'];
    }
?>  
