<?php

    $Title = "����� �����";

    $obj->assign("BodyCaption", $Title);
    
    $obj->assign("BodyMenu", "");
                
    include("guestbook.php");
    
    $Text = GuestBook();

    $obj->assign("Body", $Text);
    
?>