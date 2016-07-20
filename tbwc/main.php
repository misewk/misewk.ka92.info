<?
$Title = "Играем дальше?";

$obj->assign("BodyMenu", "");
$obj->assign("BodyCaption", $Title);

include_once("info.php");

$i = 0;

$Txt = "";

$TmpArr = array();

$div = 4;

$Text = "";

$Groups = array();

$Goals = array();

$Text .= "<div class=\"ttitle\">Заполняйте прогнозы, высылайте их на: 1. <u>sergiy . andrusenko [at] gmail . com</u>   2. <u>misewk [at] gmail . com</u></div>";

$Text .= "<table width=\"96%\" align=\"center\">";

$Text .= "<tr>";


foreach($CommandsPlay as $Play => $Commands)
    {
    $Text .= "<td valign=\"top\">";

    $Text .= "<div class=\"ttitle\">".$Play."</div>";

    foreach($Commands as $Key => $vArr)
        {

        $Groups[] = $Key;

        $Goals[] = $vArr[2];
        $Goals[] = $vArr[3];
        $TmpArr[] = $vArr[0];
        $TmpArr[] = $vArr[1];

        if((($i+1)%2) == 0)
            {
            $Txt .= "<tr><td>".($TmpArr[0])." - ".($TmpArr[3])."</td><td style=\"width:70px;\" align=\"center\">".(isset($Goals[0])?$Goals[0]:"&nbsp;")."</td><td style=\"width:70px;\" align=\"center\">".(isset($Goals[3])?$Goals[3]:"&nbsp;")."</td></tr>";
            $Txt .= "<tr><td>".($TmpArr[2])." - ".($TmpArr[1])."</td><td style=\"width:70px;\" align=\"center\">".(isset($Goals[2])?$Goals[2]:"&nbsp;")."</td><td style=\"width:70px;\" align=\"center\">".(isset($Goals[1])?$Goals[1]:"&nbsp;")."</td></tr>";

            $Text .= "<table class=\"mprognoz\" style=\"\">";
            $Text .= "<tr><th colspan=3>".implode(" VS ", $Groups)."</th></tr>";
            $Text .= $Txt;
            $Text .= "</table><br>";

            $Txt = "";

            $TmpArr = array();

            $Groups = array();

            $Goals = array();


            }

        $i++;
        }

    $Text .= "</td>";
    }

$Text .= "</tr>";

$Text .= "</table>";

$obj->assign("Body", $Text);
?>
