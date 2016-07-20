<?php
    $Title = "Пpoгнoзы";

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
          <td class=\"content_center b\">Игpoк</td>
          <td class=\"content_center b\">Франция<br>-<br>Румыния<br>2-1</td>
          <td class=\"content_center b\">Албания<br>-<br>Швейцария<br>0-1</td>
          <td class=\"content_center b\">Уэльс<br>-<br>Словакия<br>2-1</td>
          <td class=\"content_center b\">Англия<br>-<br>Россия<br>1-1</td>
          <td class=\"content_center b\">Oчки</td>
          </tr>";

            $MainHat = "<b>Игры 1-4. 10-11.06.2016</b>";

            break;
        }
        case 2:
        {
            $tour = 2;
            $Text1 = "<tr bgcolor=\"#CCCCCC\" class=prognoz>
          <td class=\"content_center b\"><b>#</b></td>
          <td class=\"content_center b\"><b>Игpoк</b></td>
          <td class=\"content_center b\">Турция<br>-<br>Хорватия<br>0-1</td>
          <td class=\"content_center b\">Польша<br>-<br>Сев. Ирландия<br>1-0</td>
          <td class=\"content_center b\">Германия<br>-<br>Украина<br>2-0</td>
          <td class=\"content_center b\">Испания<br>-<br>Чехия<br>1-0</td>
          <td class=\"content_center b\">Ирландия<br>-<br>Швеция<br>1-1</td>
          <td class=\"content_center b\">Бельгия<br>-<br>Италия<br>0-2</td>
          <td class=\"content_center b\"><b>Oчки</b></td>
          </tr>";

          $MainHat = "<b>Игры 5-10. 12-13.06.2016</b>";

            break;
        }

        case 3:
        {
            $tour = 3;
            $Text1 = "<tr bgcolor=\"#CCCCCC\" class=prognoz>
          <td class=\"content_center b\"><b>#</b></td>
          <td class=\"content_center b\"><b>Игpoк</b></td>
          <td class=\"content_center b\">Австрия<br>-<br>Венгрия<br>0-2</td>
          <td class=\"content_center b\">Португалия<br>-<br>Исландия<br>1-1</td>
          <td class=\"content_center b\">Россия<br>-<br>Словакия<br>1-2</td>
          <td class=\"content_center b\">Румыния<br>-<br>Швейцария<br>1-1</td>
          <td class=\"content_center b\">Франция<br>-<br>Албания<br>2-0</td>
          <td class=\"content_center b\">Oчки</td>
          </tr>";

            $MainHat = "<b>Игры 11-15. 14-15.06.2016</b>";

            break;
        }
        case 4:
        {
            $tour = 4;
            $Text1 = "<tr bgcolor=\"#CCCCCC\" class=prognoz>
          <td class=\"content_center b\"><b>#</b></td>
          <td class=\"content_center b\"><b>Игpoк</b></td>
          <td class=\"content_center b\">Англия<br>-<br>Уэльс<br>2-1</td>
          <td class=\"content_center b\">Украина<br>-<br>Сев. Ирландия<br>0-2</td>
          <td class=\"content_center b\">Германия<br>-<br>Польша<br>0-0</td>
          <td class=\"content_center b\">Италия<br>-<br>Швеция<br>1-0</td>
          <td class=\"content_center b\">Чехия<br>-<br>Хорватия<br>2-2</td>
          <td class=\"content_center b\">Испания<br>-<br>Турция<br>3-0</td>
          <td class=\"content_center b\"><b>Oчки</b></td>
          </tr>";

          $MainHat = "<b>Игры 16-22. 16-17.06.2016</b>";

            break;
        }

    case 5:
        {
            $tour = 5;
            $Text1 = "<tr bgcolor=\"#CCCCCC\" class=prognoz>
          <td class=\"content_center\"><b>#</b></td>
          <td class=\"content_center\"><b>Игpoк</b></td>
          <td class=\"content_center\">Бельгия<br>-<br>Ирландия<br>3-0</td>
          <td class=\"content_center\">Исландия<br>-<br>Венгрия<br>1-1</td>
          <td class=\"content_center\">Португалия<br>-<br>Австрия<br>0-0</td>
          <td class=\"content_center\">Румыния<br>-<br>Албания<br>0-1</td>
          <td class=\"content_center\">Швейцария<br>-<br>Франиця<br>0-0</td>
          <td class=\"content_center\"><b>Oчки</b></td>
          </tr>";

            $MainHat = "<b>Игры 22-27. 18-19.06.2016</b>";

            break;
        }

        case 6:
        {
            $tour = 6;
            $Text1 = "<tr bgcolor=\"#CCCCCC\" class=prognoz>
          <td class=\"content_center b\"><b>#</b></td>
          <td class=\"content_center b\"><b>Игpoк</b></td>
          <td class=\"content_center b\">Словакия<br>-<br>Англия<br>0-0</td>
          <td class=\"content_center b\">Россия<br>-<br>Уэльс<br>0-3</td>
          <td class=\"content_center b\">Украина<br>-<br>Польша<br>0-1</td>
          <td class=\"content_center b\">Сев. Ирландия<br>-<br>Германия<br>0-1</td>
          <td class=\"content_center b\">Хорватия<br>-<br>Испания<br>2-1</td>
          <td class=\"content_center b\">Чехия<br>-<br>Турция<br>0-2</td>
          <td class=\"content_center b\"><b>Oчки</b></td>
          </tr>";

          $MainHat = "<b>Игры 28-34. 20-21.06.2016</b>";

            break;
        }

        case 7:
        {
            $tour = 7;
            $Text1 = "<tr bgcolor=\"#CCCCCC\" class=prognoz>
          <td class=\"content_center b\"><b>#</b></td>
          <td class=\"content_center b\"><b>Игpoк</b></td>
          <td class=\"content_center b\">Исландия<br>-<br>Австрия<br>2-1</td>
          <td class=\"content_center b\">Венгрия<br>-<br>Португалия<br>3-3</td>
          <td class=\"content_center b\">Швеция<br>-<br>Бельгия<br>0-1</td>
          <td class=\"content_center b\">Италия<br>-<br>Ирландия<br>0-1</td>
          <td class=\"content_center b\"><b>Oчки</b></td>
          </tr>";

            $MainHat = "<b>Игры 35-38. 22.06.2016</b>";

            break;
        }
        case 8:
        {
            $tour = 8;
            $Text1 = "<tr bgcolor=\"#CCCCCC\" class=prognoz>
          <td class=\"content_center b\"><b>#</b></td>
          <td class=\"content_center b\"><b>Игpoк</b></td>
          <td class=\"content_center b\">Швейцария<br>-<br>Польша<br>1-1 (4-5p)</td>
          <td class=\"content_center b\">Уэльс<br>-<br>Сев. Ирландия<br>1-0</td>
          <td class=\"content_center b\">Хорватия<br>-<br>Португалия<br>0-0 (0-1)</td>
          <td class=\"content_center b\">Франция<br>-<br>Ирландия<br>2-1</td>
          <td class=\"content_center b\">Германия<br>-<br>Словакия<br>3-0</td>
          <td class=\"content_center b\">Венгрия<br>-<br>Бельгия<br>0-4</td>
          <td class=\"content_center b\">Италия<br>-<br>Испания<br>2-0</td>
          <td class=\"content_center b\">Англия<br>-<br>Исландия<br>1-2</td>
          <td class=\"content_center b\"><b>Oчки</b></td>
          </tr>";

          $MainHat = "<b>Игры 1/8. 25-27.06.2016</b>";

            break;
        }

                case 9:
        {
            $tour = 9;
            $Text1 = "<tr bgcolor=\"#CCCCCC\" class=prognoz>
          <td class=\"content_center b\"><b>#</b></td>
          <td class=\"content_center b\"><b>Игpoк</b></td>
          <td class=\"content_center b\">Польша<br>-<br>Португалия<br>1-1 (3-5p)</td>
          <td class=\"content_center b\">Уэльс<br>-<br>Бельгия<br>3-1</td>
          <td class=\"content_center b\">Германия<br>-<br>Италия<br>1-1 (6-5p)</td>
          <td class=\"content_center b\">Франция<br>-<br>Исландия<br>5-2</td>
          <td class=\"content_center b\">Португалия<br>-<br>Уэльс<br>2-0</td>
          <td class=\"content_center b\">Германия<br>-<br>Франция<br>0-2</td>
          <td class=\"content_center b\">Португалия<br>-<br>Франция<br>0-0 (1-0)</td>          
          <td class=\"content_center b\">Oчки</td>
          </tr>";

            $MainHat = "<b>Игры 1/4, 1/2, 1. 01-03.07.2016</b>";

            break;
        }
        /*
        case 10:
        {
            $tour = 10;
            $Text1 = "<tr bgcolor=\"#CCCCCC\" class=prognoz>
          <td class=\"content_center\"><b>1</b></td>
          <td class=\"content_center\"><b>Игpoк</b></td>
          <td class=\"content_center\">Бразилия<br>-<br>Чили<br>1-1 (3-2p)</td>
          <td class=\"content_center\">Колумбия<br>-<br>Уругвай<br>2-0</td>
          <td class=\"content_center\">Нидерланды<br>-<br>Мексика<br>2-1</td>
          <td class=\"content_center\">Коста-Рика<br>-<br>Греция<br>1-1 (5-3p)</td>
          <td class=\"content_center\">Франция<br>-<br>Нигерия<br>2-0</td>
          <td class=\"content_center\">Германия<br>-<br>Алжир<br>0-0 (2-1)</td>
          <td class=\"content_center\">Аргентина<br>-<br>Швейцария<br>0-0 (1-0)</td>
          <td class=\"content_center\">Бельгия<br>-<br>США<br>0-0 (2-1)</td>
          <td class=\"content_center\"><b>Oчки</b></td>
          </tr>";

          $MainHat = "<b>1/8 финала, 28.06-01.07.2014</b>";

            break;
        }

        case 11:
        {
            $tour = 11;
            $Text1 = "<tr bgcolor=\"#CCCCCC\" class=prognoz>
          <td class=\"content_center\"><b>1</b></td>
          <td class=\"content_center\"><b>Игpoк</b></td>
          <td class=\"content_center\">Франция<br>-<br>Германия<br>0-1</td>
		  <td class=\"content_center\">Бразилия<br>-<br>Колумбия<br>2-1</td>
		  <td class=\"content_center\">Аргентина<br>-<br>Бельгия<br>1-0</td>
		  <td class=\"content_center\">Нидерланды<br>-<br>Коста-Рика<br>0-0 (4-3p)</td>
          <td class=\"content_center\">Бразилия<br>-<br>Германия<br>1-7</td>
		  <td class=\"content_center\">Нидерланды<br>-<br>Аргентина<br>0-0 (2-4p)</td>
		  <td class=\"content_center\">Бразилия<br>-<br>Нидерланды<br>0-3</td>
		  <td class=\"content_center\">Германия<br>-<br>Аргентина<br>?-?</td>
          <td class=\"content_center\"><b>Oчки</b></td>
          </tr>";

            $MainHat = "<b>1/4, 1/2, third place, final</b>";

            break;
        }
        case 12:
        {
            $tour = 12;
            $Text1 = "<tr bgcolor=\"#CCCCCC\" class=prognoz>
          <td class=\"content_center\"><b>1</b></td>
          <td class=\"content_center\"><b>Игpoк</b></td>
          <td class=\"content_center\">Бaвapия<br>-<br>Бaзeль<br>3-0</b></td>
          <td class=\"content_center\">Kлyж<br>-<br>Poмa<br>1-1</b></td>
          <td class=\"content_center\">Oлимпик<br>-<br>Чeлcи<br>1-0</b></td>
          <td class=\"content_center\">Жилинa<br>-<br>Cпapтaк<br>1-2<b></td>
          <td class=\"content_center\">Peaл<br>-<br>Ocep<br>4-0</b></td>
          <td class=\"content_center\">Mилaн<br>-<br>Aякc<br>0-2</b></td>
          <td class=\"content_center\">Apceнaл<br>-<br>Пapтизaн<br>3-1</b></td>
          <td class=\"content_center\">Шaxтep<br>-<br>Бpaгa<br>2-0</b></td>
          <td class=\"content_center\">Динaмo<br>-<br>Шepиф<br>0-0</b></td>
          <td class=\"content_center\">ПCB<br>-<br>Meтaллиcт<br>0-0</b></td>
          <td class=\"content_center\">Kapпaты<br>-<br>ПCЖ<br>1-1</b></td>
          <td class=\"content_center\"><b>Oчки</b></td>
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
    $Text .= "<tr bgcolor=\"#BBBBBB\"><td class=\"content_center\" colspan = ".($matchs + 3).">$MainHat <b>Maтчeй: $matchs</b></td></tr>";

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

       //  пpинiдитeльнo чepeдoвaть цвeт
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
