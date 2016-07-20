<?php

    $Title = "Турнирная таблица";

    $obj->assign("BodyMenu", "");
    $obj->assign("BodyCaption", $Title);

    include_once("settings.php");
    include_once("score.php");
    include_once("matches.php");
    include_once("hat.php");

    $CurrentTour = 1;

    // sub hat
    $Text = "<table class=\"main_table sort\"><thead><tr>";

    for ($ind = 0; $ind < count($Hats); $ind++)
        $Text .= "<th class=\"content_center\">".$Hats[$ind]."</th>";

    $Text .= "</tr></thead><tbody>";


    for ($ind1 = 0; $ind1 < $PCount; $ind1++)
    {
        $indx = $Points[$ind1]["index"];

        $color = (($ind1 & 1) ? "even" : "odd");
        
        switch ($ind1 + 1)
        {
            // gold
            case 1:
            {
                $color = "gold";
                break;
            }
            // silver
            case 2:
            {
                $color = "silver";
                break;
            }
            // bronze
            case 3:
            {
                $color = "bronze";
                break;
            }
        }
        
        $Text .= "<tr class=\"$color\">
                  <td class=\"content_center b red\">".($ind1 + 1)."</td>
                  <td class=\"content_left b\">".ShowPlayer($indx)."</td>
                  <td class=\"content_center b\">".$Players[$indx]["rel"]."</td>
                  <td class=\"content_center b\">".GetWinScores($indx)."</td>
                  <td class=\"content_center b\">".GetWinRest($indx)."</td>
                  <td class=\"content_center b\">".GetNoWinRest($indx)."</td>
                  <td class=\"content_center b\">".GetPlayerPoint($indx)."</td>
                  </tr>";
    }
                  //<td align=center><b>".$CurrentTour."</b></td>
    $Text .= "</tbody>";
/*
    $Text .= "<tfoot><tr>";

    for ($ind = 0; $ind < count($Hats); $ind++)
        $Text .= "<td class=\"content_center\">".$Hats[$ind]."</td>";

    $Text .= "</tr></tfoot>";
    */
    $Text .= "</table>";

    $obj->assign("Body", $Text);
?>
