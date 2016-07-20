<?php
   include_once("settings.php");
   include_once("matches.php");

    for ($ind1 = 0; $ind1 < $PCount; $ind1++)
    {
        $Points[$ind1]["point"] = GetPlayerPoint($ind1);
        $Points[$ind1]["index"] = $ind1;
    }

    //  Сортировка
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
?>