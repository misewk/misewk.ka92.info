<?php
echo "Under construction ;-) Извините там что-то поломалось. Завтра усе будет.";
return;

session_start();
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?> 
<html>

<head>
<title>Футбольный тотализатор</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF">
<meta http-equiv="cache-control" content="no-cache">
<meta name="google-site-verification" content="sZfRBYQmlaWZVAKjB4Dc66jzWbNM2r3FBMVl50MrjOg" />
<script language="JavaScript" type="text/javascript" src="sort.js"></script>
<link href="css.css" rel="stylesheet" type="text/css">
<link href="guestbook.css" rel="stylesheet" type="text/css">
</head>
<body BGCOLOR=#C0C0C0>

<?php

//---------------------------------
// Я здесь немного похазяйничал, сортировку привентил
//---------------------------------
include("settings.php");
include("matches.php");
include("hat.php");

/*
for ($ind = 0; $ind < $PCount; $ind++) include("Players/player".$ind.".php");
*/

include("Players/player0.php");
include("Players/player1.php");
include("Players/player2.php");
include("Players/player3.php");
include("Players/player4.php");
include("Players/player5.php");
include("Players/player6.php");
include("Players/player7.php");
include("Players/player8.php");
include("Players/player9.php");
include("Players/player10.php");
include("Players/player11.php");
include("Players/player12.php");
include("Players/player13.php");
include("Players/player14.php");
include("Players/player15.php");
include("Players/player16.php");

$CurrentTour = 6;

        
echo "<table align=center>
        <tr><td align=center><b>Лига Чемпионов 2009-10!!! Туры 4, 5, 6</b></td></tr>        
      </table>";

/*
$News = 

    "
    <b><font color = red>ЯКЩО ВИ ЗАЙШЛИ НА СТОРIНКУ, А РЕЗУЛЬТАТИ ЗАСТАРIЛI, МОЖЛИВО, ЩО У ВАС СТОРIНКА НЕ ОНОВИЛАСЬ,<br>
    НАТИСНIТЬ КОМБIНАЦIЮ Ctrl + F5</font></b><br>
    <img src=i/logo_totalizator.jpg border=1>&nbsp;<a target=rules href=rules.php><u><font size=4><b>Регламент тоталiзатора</b></font></u></a>";
*/

$News = 
    "
    <b><font color = blue>Если вы зашли на страницу, а результаты старые, вероятно, что страница не обновилась,<br>
    нажмите комбинацию Ctrl + F5 или F5</font></b><br>
    <a target=rules href=rules.php><u><font size=4><b>Правила тотализатора</b></font></u></a>";

$News1 = 
    "
    <b><font color = green>ПРОВЕРЬТЕ ВБИТЫЕ ПРОГНОЗЫ, ХОТЯ БЫ НА БЛИЖАЙШИЕ МАТЧИ.</font></b>";

$News2 = 
    "
    <b><font color = black>\"Два Гуся\" ул. Крещатик, 7/11, ТК \"СИТИ\", 4 ноября, с 18:30. Прокоп выставляет пиво за тотализатор. Приглашаются все желающие.
</font></b>";

$News3 = 
    "
    <b><font color = yellow size=16>Выражаю благодарность Фурса Сергею Витальевичу!<br>За что он знает сам :-)</font></b>";

$News4 = 
    "
<img src=prokop.jpg alt=\"Прокопенко Игорь\" border=1>";

echo "<table align=center width=100% border=0>
<tr><td>$News</td></tr>
<tr height=10><td></td></tr>
<tr><td>$News1</td></tr>
<tr height=10><td></td></tr>
<tr><td align=center>$News3</td></tr>
<tr><td align=center></td></tr>
<tr><td align=center></td></tr>
</table>";


/*
echo "<table align=center width=100% border=1>
<tr><td>News</td><td>News</td><td>News</td><td>News</td><td>News</td><td>News</td><td>News</td></tr>
</table>";
*/

//<tr><td><a href=\"save.php\"><u><font size=4><b>Завантажии файл для заповнення</b></font></u></a></td></tr>

$Text = "<table align=center width=100% border=0>";
// main hat
$Text .= "<tr><td align=center colspan = ".(count($Hats) + 1)."><b>Турнирная таблица участников</b></td></tr></table>";

// sub hat

$Text .= "<table align=center width=100% class=sort cellspacing=\"1\" cellpadding=\"5\" bgcolor=\"#ffffff\" 
><thead><tr>";

for ($ind = 0; $ind < count($Hats); $ind++)
    $Text .= "<td align=center>".$Hats[$ind]."</td>";

$Text .= "</tr></thead><tbody>";


for ($ind1 = 0; $ind1 < $PCount; $ind1++) 
{
    $Points[$ind1]["point"] = GetPlayerPoint($ind1);
    $Points[$ind1]["index"] = $ind1;
}


for ($a = 0; $a < $PCount; $a++)
{
    for ($b = $a + 1; $b < $PCount; $b++)
    {
       if ($Points[$a]["point"] == $Points[$b]["point"])
       {
            if (GetWinScores($Points[$a]["index"]) < GetWinScores($Points[$b]["index"]))
            {
                $T = $Points[$a]["point"];
                $Points[$a]["point"] = $Points[$b]["point"]; 
                $Points[$b]["point"] = $T; 
       
                $T = $Points[$a]["index"];
                $Points[$a]["index"] = $Points[$b]["index"]; 
                $Points[$b]["index"] = $T;                  
            }
       }
       else
       {           
           if ($Points[$a]["point"] < $Points[$b]["point"]) 
           {
                $T = $Points[$a]["point"];
                $Points[$a]["point"] = $Points[$b]["point"]; 
                $Points[$b]["point"] = $T; 
       
                $T = $Points[$a]["index"];
                $Points[$a]["index"] = $Points[$b]["index"]; 
                $Points[$b]["index"] = $T;       
           }
      }
    }
}



for ($ind1 = 0; $ind1 < $PCount; $ind1++)
{
    
               //<td align=center><b>".($ind1 + 1).".</b></td> 
    $indx = $Points[$ind1]["index"];

   //              <td align=center><img src=\"./i/p/_".$indx.".jpg\" alt=\"Тут будет фотка\" border=1></td>     
    $Text .= "<tr bgcolor=#D0D0D0>
               
              <td align=center><b><font color=red>".($ind1 + 1)."</font></b></td>      
              <td align=left>".ShowPlayer($indx)."</td>    
              <td align=center><b>".$Players[$indx]["rel"]."</b></td>
              <td align=center><b>".$CurrentTour."</b></td>
              <td align=center><b>".GetWinScores($indx)."</b></td>  
              <td align=center><b>".GetWinRest($indx)."</b></td>      
              <td align=center><b>".GetNoWinRest($indx)."</b></td>      
              <td align=center><b>".GetPlayerPoint($indx)."</b></td>      
              </tr>";
}

$Text .= "</tbody><thead><tr>";

for ($ind = 0; $ind < count($Hats); $ind++)
    $Text .= "<td align=center>".$Hats[$ind]."</td>";

$Text .= "</tr></thead>";

$Text .= "</table>";

echo "<br>$Text";

$ToursCount = 3;


$Text = "<br><table align=center><tr><td><b>Прогнозы и результаты по турам:&nbsp;</b></td>";
for ($ind = 0; $ind < $ToursCount; $ind++)
{
    $Text .= "<td align=center><a href=\"tour".($ind + 1).".php\" target=\"".($ind + 1)."\"><u>".($ind + 1 + 3)."</u></a></td>";    
}

$Text .= "</tr></table>";

echo $Text;

include("guestbook/guestbook.php");
echo GuestBook();

$Counter = "<a href=\"http://www.hitcounter.ru/\">
<img src=\"http://www.hitcounter.ru/count.php?misewk\"
border=\"0\" alt=\"счетчик посещений\"></a><br>
<a href=\"http://www.hitcounter.ru\">бесплатный счетчик</a>";

echo "<br><table align=right border=0 cellspacing=0 cellpadding=0>
<tr>
<td><small>Вопросы, предложения, комментарии:<a href = mailto:misewk@mail.ru><b><small>misewk</b></a></td>
</tr>
<tr>
<td align=right>$Counter</td>
</tr></table>";

//echo "<br><table align=right><tr><td>$Counter</td></tr></table>";

//echo "<br><table align=right><tr><td><small><a href = sendmail.php><b><small>test</b></a></td></tr></table>";

///количество смотрящих в даный момент
include("users.php");
echo "Сейчас на сайте ".users()." пользователей<br>На этой странице: ".users_on_this_page();
?>
</body>
</html>                 