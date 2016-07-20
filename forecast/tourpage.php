<?php
    $Title = "�po��o��";

    include_once("prognozmenu.php");
    include_once("score.php");

    $Count = count($TourMenu);

    if (!isset($_GET["sp"]))
    {
        $_GET["sp"] = 9;
    }
    
    $sp = $_GET["sp"];   
    $start = 0;
    for ($i = 0; $i < $Count; $i++)
    {
        if ($sp == $i + 1 + $start)
        {
            $obj->assign("MENU_ITEM", "<b>".$TourMenu[$i]["text"]."</b>");
        }
        else
        {
            $obj->assign("P_ACTION", $TourMenu[$i]["link"]);
            $obj->assign("ACTION", $TourMenu[$i]["text"]);

            $obj->parse("MENU_ITEM", "link");
        }

        $obj->parse("BodyMenu", ".mi");
    }

    $obj->assign("BodyCaption", $Title);

    include_once("settings.php");
    include_once("matches.php");

    global $PCount;

    $Text1 = "";
    switch ($sp)
    {
        case 1:
        {
            $tour = 1;
            $Text1 = "<tr bgcolor=\"#CCCCCC\" class=prognoz>
          <td class=\"content_center b\">#</td>
          <td class=\"content_center b\">��po�</td>
          <td class=\"content_center b\">�������<br>-<br>�������<br>2-1</td>
          <td class=\"content_center b\">�������<br>-<br>���������<br>0-1</td>
          <td class=\"content_center b\">�����<br>-<br>��������<br>2-1</td>
          <td class=\"content_center b\">������<br>-<br>������<br>1-1</td>
          <td class=\"content_center b\">O���</td>
          </tr>";

            $MainHat = "<b>���� 1-4. 10-11.06.2016</b>";

            break;
        }
        case 2:
        {
            $tour = 2;
            $Text1 = "<tr bgcolor=\"#CCCCCC\" class=prognoz>
          <td class=\"content_center b\"><b>#</b></td>
          <td class=\"content_center b\"><b>��po�</b></td>
          <td class=\"content_center b\">������<br>-<br>��������<br>0-1</td>
          <td class=\"content_center b\">������<br>-<br>���. ��������<br>1-0</td>
          <td class=\"content_center b\">��������<br>-<br>�������<br>2-0</td>
          <td class=\"content_center b\">�������<br>-<br>�����<br>1-0</td>
          <td class=\"content_center b\">��������<br>-<br>������<br>1-1</td>
          <td class=\"content_center b\">�������<br>-<br>������<br>0-2</td>
          <td class=\"content_center b\"><b>O���</b></td>
          </tr>";

          $MainHat = "<b>���� 5-10. 12-13.06.2016</b>";

            break;
        }

        case 3:
        {
            $tour = 3;
            $Text1 = "<tr bgcolor=\"#CCCCCC\" class=prognoz>
          <td class=\"content_center b\"><b>#</b></td>
          <td class=\"content_center b\"><b>��po�</b></td>
          <td class=\"content_center b\">�������<br>-<br>�������<br>0-2</td>
          <td class=\"content_center b\">����������<br>-<br>��������<br>1-1</td>
          <td class=\"content_center b\">������<br>-<br>��������<br>1-2</td>
          <td class=\"content_center b\">�������<br>-<br>���������<br>1-1</td>
          <td class=\"content_center b\">�������<br>-<br>�������<br>2-0</td>
          <td class=\"content_center b\">O���</td>
          </tr>";

            $MainHat = "<b>���� 11-15. 14-15.06.2016</b>";

            break;
        }
        case 4:
        {
            $tour = 4;
            $Text1 = "<tr bgcolor=\"#CCCCCC\" class=prognoz>
          <td class=\"content_center b\"><b>#</b></td>
          <td class=\"content_center b\"><b>��po�</b></td>
          <td class=\"content_center b\">������<br>-<br>�����<br>2-1</td>
          <td class=\"content_center b\">�������<br>-<br>���. ��������<br>0-2</td>
          <td class=\"content_center b\">��������<br>-<br>������<br>0-0</td>
          <td class=\"content_center b\">������<br>-<br>������<br>1-0</td>
          <td class=\"content_center b\">�����<br>-<br>��������<br>2-2</td>
          <td class=\"content_center b\">�������<br>-<br>������<br>3-0</td>
          <td class=\"content_center b\"><b>O���</b></td>
          </tr>";

          $MainHat = "<b>���� 16-22. 16-17.06.2016</b>";

            break;
        }

    case 5:
        {
            $tour = 5;
            $Text1 = "<tr bgcolor=\"#CCCCCC\" class=prognoz>
          <td class=\"content_center\"><b>#</b></td>
          <td class=\"content_center\"><b>��po�</b></td>
          <td class=\"content_center\">�������<br>-<br>��������<br>3-0</td>
          <td class=\"content_center\">��������<br>-<br>�������<br>1-1</td>
          <td class=\"content_center\">����������<br>-<br>�������<br>0-0</td>
          <td class=\"content_center\">�������<br>-<br>�������<br>0-1</td>
          <td class=\"content_center\">���������<br>-<br>�������<br>0-0</td>
          <td class=\"content_center\"><b>O���</b></td>
          </tr>";

            $MainHat = "<b>���� 22-27. 18-19.06.2016</b>";

            break;
        }

        case 6:
        {
            $tour = 6;
            $Text1 = "<tr bgcolor=\"#CCCCCC\" class=prognoz>
          <td class=\"content_center b\"><b>#</b></td>
          <td class=\"content_center b\"><b>��po�</b></td>
          <td class=\"content_center b\">��������<br>-<br>������<br>0-0</td>
          <td class=\"content_center b\">������<br>-<br>�����<br>0-3</td>
          <td class=\"content_center b\">�������<br>-<br>������<br>0-1</td>
          <td class=\"content_center b\">���. ��������<br>-<br>��������<br>0-1</td>
          <td class=\"content_center b\">��������<br>-<br>�������<br>2-1</td>
          <td class=\"content_center b\">�����<br>-<br>������<br>0-2</td>
          <td class=\"content_center b\"><b>O���</b></td>
          </tr>";

          $MainHat = "<b>���� 28-34. 20-21.06.2016</b>";

            break;
        }

        case 7:
        {
            $tour = 7;
            $Text1 = "<tr bgcolor=\"#CCCCCC\" class=prognoz>
          <td class=\"content_center b\"><b>#</b></td>
          <td class=\"content_center b\"><b>��po�</b></td>
          <td class=\"content_center b\">��������<br>-<br>�������<br>2-1</td>
          <td class=\"content_center b\">�������<br>-<br>����������<br>3-3</td>
          <td class=\"content_center b\">������<br>-<br>�������<br>0-1</td>
          <td class=\"content_center b\">������<br>-<br>��������<br>0-1</td>
          <td class=\"content_center b\"><b>O���</b></td>
          </tr>";

            $MainHat = "<b>���� 35-38. 22.06.2016</b>";

            break;
        }
        case 8:
        {
            $tour = 8;
            $Text1 = "<tr bgcolor=\"#CCCCCC\" class=prognoz>
          <td class=\"content_center b\"><b>#</b></td>
          <td class=\"content_center b\"><b>��po�</b></td>
          <td class=\"content_center b\">���������<br>-<br>������<br>1-1 (4-5p)</td>
          <td class=\"content_center b\">�����<br>-<br>���. ��������<br>1-0</td>
          <td class=\"content_center b\">��������<br>-<br>����������<br>0-0 (0-1)</td>
          <td class=\"content_center b\">�������<br>-<br>��������<br>2-1</td>
          <td class=\"content_center b\">��������<br>-<br>��������<br>3-0</td>
          <td class=\"content_center b\">�������<br>-<br>�������<br>0-4</td>
          <td class=\"content_center b\">������<br>-<br>�������<br>2-0</td>
          <td class=\"content_center b\">������<br>-<br>��������<br>1-2</td>
          <td class=\"content_center b\"><b>O���</b></td>
          </tr>";

          $MainHat = "<b>���� 1/8. 25-27.06.2016</b>";

            break;
        }

                case 9:
        {
            $tour = 9;
            $Text1 = "<tr bgcolor=\"#CCCCCC\" class=prognoz>
          <td class=\"content_center b\"><b>#</b></td>
          <td class=\"content_center b\"><b>��po�</b></td>
          <td class=\"content_center b\">������<br>-<br>����������<br>1-1 (3-5p)</td>
          <td class=\"content_center b\">�����<br>-<br>�������<br>3-1</td>
          <td class=\"content_center b\">��������<br>-<br>������<br>1-1 (6-5p)</td>
          <td class=\"content_center b\">�������<br>-<br>��������<br>5-2</td>
          <td class=\"content_center b\">����������<br>-<br>�����<br>2-0</td>
          <td class=\"content_center b\">��������<br>-<br>�������<br>0-2</td>
          <td class=\"content_center b\">����������<br>-<br>�������<br>0-0 (1-0)</td>          
          <td class=\"content_center b\">O���</td>
          </tr>";

            $MainHat = "<b>���� 1/4, 1/2, 1. 01-03.07.2016</b>";

            break;
        }
        /*
        case 10:
        {
            $tour = 10;
            $Text1 = "<tr bgcolor=\"#CCCCCC\" class=prognoz>
          <td class=\"content_center\"><b>1</b></td>
          <td class=\"content_center\"><b>��po�</b></td>
          <td class=\"content_center\">��������<br>-<br>����<br>1-1 (3-2p)</td>
          <td class=\"content_center\">��������<br>-<br>�������<br>2-0</td>
          <td class=\"content_center\">����������<br>-<br>�������<br>2-1</td>
          <td class=\"content_center\">�����-����<br>-<br>������<br>1-1 (5-3p)</td>
          <td class=\"content_center\">�������<br>-<br>�������<br>2-0</td>
          <td class=\"content_center\">��������<br>-<br>�����<br>0-0 (2-1)</td>
          <td class=\"content_center\">���������<br>-<br>���������<br>0-0 (1-0)</td>
          <td class=\"content_center\">�������<br>-<br>���<br>0-0 (2-1)</td>
          <td class=\"content_center\"><b>O���</b></td>
          </tr>";

          $MainHat = "<b>1/8 ������, 28.06-01.07.2014</b>";

            break;
        }

        case 11:
        {
            $tour = 11;
            $Text1 = "<tr bgcolor=\"#CCCCCC\" class=prognoz>
          <td class=\"content_center\"><b>1</b></td>
          <td class=\"content_center\"><b>��po�</b></td>
          <td class=\"content_center\">�������<br>-<br>��������<br>0-1</td>
		  <td class=\"content_center\">��������<br>-<br>��������<br>2-1</td>
		  <td class=\"content_center\">���������<br>-<br>�������<br>1-0</td>
		  <td class=\"content_center\">����������<br>-<br>�����-����<br>0-0 (4-3p)</td>
          <td class=\"content_center\">��������<br>-<br>��������<br>1-7</td>
		  <td class=\"content_center\">����������<br>-<br>���������<br>0-0 (2-4p)</td>
		  <td class=\"content_center\">��������<br>-<br>����������<br>0-3</td>
		  <td class=\"content_center\">��������<br>-<br>���������<br>?-?</td>
          <td class=\"content_center\"><b>O���</b></td>
          </tr>";

            $MainHat = "<b>1/4, 1/2, third place, final</b>";

            break;
        }
        case 12:
        {
            $tour = 12;
            $Text1 = "<tr bgcolor=\"#CCCCCC\" class=prognoz>
          <td class=\"content_center\"><b>1</b></td>
          <td class=\"content_center\"><b>��po�</b></td>
          <td class=\"content_center\">�a�ap��<br>-<br>�a�e��<br>3-0</b></td>
          <td class=\"content_center\">K�y�<br>-<br>Po�a<br>1-1</b></td>
          <td class=\"content_center\">O������<br>-<br>�e�c�<br>1-0</b></td>
          <td class=\"content_center\">�����a<br>-<br>C�ap�a�<br>1-2<b></td>
          <td class=\"content_center\">Pea�<br>-<br>Ocep<br>4-0</b></td>
          <td class=\"content_center\">M��a�<br>-<br>A��c<br>0-2</b></td>
          <td class=\"content_center\">Apce�a�<br>-<br>�ap���a�<br>3-1</b></td>
          <td class=\"content_center\">�ax�ep<br>-<br>�pa�a<br>2-0</b></td>
          <td class=\"content_center\">���a�o<br>-<br>�ep��<br>0-0</b></td>
          <td class=\"content_center\">�CB<br>-<br>Me�a���c�<br>0-0</b></td>
          <td class=\"content_center\">Kap�a��<br>-<br>�C�<br>1-1</b></td>
          <td class=\"content_center\"><b>O���</b></td>
          </tr>";

          $MainHat = "<b>Typ 6. 08.12.2010, 15-16.12.2010</b>";

            break;
        }
        */
    }

    $Text = "<table class=\"main_table\">";

    // main hat
    //$Text .= "<tr bgcolor=\"#BBBBBB\"><td align=center colspan = 19>$MainHat</td></tr>";

    $matchs = GetMatchInTour($tour);
    $Text .= "<tr bgcolor=\"#BBBBBB\"><td class=\"content_center\" colspan = ".($matchs + 3).">$MainHat <b>Ma��e�: $matchs</b></td></tr>";

    $Text .= $Text1;

    $Text .= "<tbody>";
//print_r($Points);
    for ($ind1 = 0; $ind1 < $PCount; $ind1++)
    {
        if ($Players[$ind1]["name"] == "-") continue;

        $im = "";
      $color = (($ind1 & 1) ? "odd" : "even");
        
      if($Points[0]["index"] == $ind1)
            {
            //$im = "<img src=\"/i/c1.gif\" align=\"top\">&nbsp;&nbsp;&nbsp;";
            $color = "gold";
            }
        elseif($Points[1]["index"] == $ind1)
            {
            //$im = "<img src=\"/i/c2.gif\" align=\"top\">&nbsp;&nbsp;&nbsp;";
            $color = "silver";
            }
        elseif($Points[2]["index"] == $ind1)
            {
            //$im = "<img src=\"/i/c3.gif\" align=\"top\">&nbsp;&nbsp;&nbsp;";
            $color = "bronze";
            }
        else
            {
            $color = (($ind1 & 1) ? "odd" : "even");
            }

       //  �p��i���e���o �epe�o�a�� ��e�
//       $color = (($ind1 & 1)?"#DDDDDD":"#EEEEEE");
 
       $Text .= "<tr class=\"$color height30\">
                  <td class=\"content_center\"><b>".($ind1 + 1).".</b></td>
                  <td class=\"content_center\"><b>".$im." ".$Players[$ind1]["name"]."</b></td>";

        $Z = "";

        for ($ind2 = 0; $ind2 < $matchs; $ind2++)
        {
            $Z .= "<td class=\"content_center\">".ShowScore($ind1, $tour, $ind2)."</td>";
        }


       $Text .= $Z;
       $Text .= "<td class=\"content_center\"><b>".GetPlayerTourPoints($ind1, $tour)."</b></td>
           </tr>";

    }
    $Text .= "</tbody>";
    $Text .= $Text1;
    $Text .= "</table>";

    $obj->assign("Body", $Text);
?>
