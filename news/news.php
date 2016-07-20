<?php
    $Title = "Новости";

    $obj->assign("BodyMenu", "");
    $obj->assign("BodyCaption", $Title);
    $News = array();

	    $News[] = "
    <table align=center cellspacing=0 cellpadding=0 width=\"50%\" border=\"0\">
                <tr>
                    <td>
                    [17:00 08.06.2012]
                    <div style=\"font-weight:800;\"><font color=blue>Україна Тотализатору на Евро2012 быть! Хоть и в старом формате</font><br>
					Сегодня стартуем!
					</div>
                    </td>
                </tr>
            </table>";

	    $News[] = "
    <table align=center cellspacing=0 cellpadding=0 width=\"50%\" border=\"0\">
                <tr>
                    <td>
                    [15:29 28.02.2011]
                    <div style=\"font-weight:800;\"><font color=red>Наконец-то, футбол на Украину возвращается! Вторая часть ЧУКРА стартует в четверг!</font><br>
					19:00 03.03 Севастополь - Шахтер (УТ1, Футбол)<br><br>
					17:00 04.03 Металлург З - Ильичевец (УТ1, Футбол)<br><br>
					13:00 05.03 Заря - Волынь (УТ1, Футбол)<br>
					15:00 05.03 Металлург Д - Динамо (Футбол)<br>
					17:00 05.03 Ворскла - Металлист (Футбол)<br>
					17:00 05.03 Кривбасс - Оболонь (2+2)<br><br>
					15:00 06.03 Днепр - Таврия (2+2)<br>
					17:00 06.03 Арсенал - Карпаты (2+2)<br>
					<br>
					<br>
					<br>
					</div>
                    </td>
                </tr>
            </table>";


	$News[] = "
    <table align=center cellspacing=0 cellpadding=0 width=\"50%\" border=\"0\">
                <tr>
                    <td>
                    [10:24 16.02.2011]
                    <div style=\"font-weight:800;\"><font color=green>К сожалению, в текущем виде тотализатор изжил себя и прекращает функционирование.<br>
					Планирую сделать обновления, чтобы 'было для людей' и тогда всё возобновится.<br>
					Спасибо за понимание!</font>
					</div>
                    </td>
                </tr>
            </table>";


	    $News[] = "
    <table align=center cellspacing=0 cellpadding=0 width=\"50%\" border=\"0\">
                <tr>
                    <td>
                    [21:35 14.09.2010]
                    <div style=\"font-weight:600;\">Новый сезон, новый тотал!<br>Проверьте вбитые прогнозы.<br>Введено новое правило №17.</div>
                    </td>
                </tr>
            </table>";

    $News[] = "
<div class=\"info\">
    <table align=center cellspacing=0 cellpadding=0 width=\"50%\" border=\"0\">
                <tr>
                    <td>
                    [10:42 20.07.2010]
                    <div style=\"font-weight:600;\">ЧМЮАР итоги. Встречаемся в четверг, 22.07.2010, в 19:00 вход в метро КПИ.</div>
                    </td>
                </tr>
                <tr>
                    <td>
                    Кто не знает, моя физиономия: <img src=\"../i/misewk.jpg\" border=1>
                    </td>
                </tr>
            </table></div>";

    $News[] = "
<div class=\"info\">
    <table align=center cellspacing=0 cellpadding=0 width=\"50%\" border=\"0\">
                <tr>
                    <td>
                    [".date("d.m.Y")."]
                    <div style=\"font-weight:600;\">Список тех, кто уже выслал прогнозы на 1/4 по состоянию на ".date("d.m.Y")."</div>
                    <ol>
                    <li>Фурса Сергей - W49,W50 VS W51,W52, W53,W54 VS W55,W56</li>
                    <li>Заика Евгений - W49,W50 VS W51,W52, W53,W54 VS W55,W56</li>
                    </ol>
                    </td>
                </tr>
            </table></div>";

    $News[] = "
<div class=\"info\">
    <table align=center cellspacing=0 cellpadding=0 width=\"50%\" border=\"0\">
                <tr>
                    <td>
                    [".date("d.m.Y")."]
                    <div style=\"font-weight:600;\">Список тех, кто уже выслал прогнозы на плейоф по состоянию на ".date("d.m.Y")."</div>
                    <ol>
                    <li>Ляховецкий Алексей - A VS B, C VS D, E VS F, G VS H</li>
                    <li>Бачинский Геннадий - A VS B, C VS D, E VS F, G VS H</li>
                    <li>Андрусенко Игорь   - A VS B, C VS D, E VS F, G VS H</li>
                    <li>Прокопенко Дмитрий - A VS B, C VS D, E VS F, G VS H</li>
                    <li>Романов Сергей - A VS B, C VS D, E VS F, G VS H</li>
                    <li>Фурса Сергей - A VS B, C VS D, E VS F, G VS H</li>
                    <li>Прокопенко Игорь - A VS B, C VS D, E VS F, G VS H</li>
                    <li>Заика Евгений - A VS B, C VS D, E VS F, G VS H</li>
                    <li>Кривунь Андрей - A VS B, C VS D, E VS F, G VS H</li>
                    <li>Красник Михаил - A VS B, C VS D, E VS F, G VS H</li>
                    <li>Сидоренко Михаил - A VS B, C VS D, E VS F, G VS H</li>
                    <li>Березка Игорь - A VS B, C VS D, E VS F, G VS H</li>
                    <li>Андреевский Александр - A VS B, C VS D, E VS F, G VS H</li>
                    <li>Чуприна Дмитрий - A VS B, C VS D, E VS F, G VS H</li>
                    <li>Кривунь Алексей - A VS B, C VS D, E VS F, G VS H</li>
                    </ol>
                    </td>
                </tr>
            </table></div>";


   $News[] = "<table align=center cellspacing=0 cellpadding=0 width=\"50%\" border=\"0\">
                <tr>
                    <td>
                    17:38 28.05.2010<br><b>Выставление за тотализатор ЛЧ!</b><br>
31.05.2010 в 19:00, выход из станции метро КПИ. Мое хлебало вроде все знают, а вот Попс, выставляться будет он:<br><br>
<img src=\"../i/pops.jpg\" border=1>


                    </td>
                </tr>
            </table><br>";

    $News[] = "<table align=center cellspacing=0 cellpadding=0 width=\"50%\" border=\"0\">
                <tr>
                    <td>
                    08:58 23.02.2010<br><b>23 февраля - не красный день календаря!</b><br>
                    Администрация сайта (в моем лице :-) поздравляет всех с праздником
                    Днём защитника Отечества. Желаю стальных неровов и крепкого здоровья!
                    Чтобы никто из нас никогда не брал в руки оружия (кухонный нож не считается)!
                    </td>
                </tr>
            </table><br>";

   $News[] = "<table align=center cellspacing=0 cellpadding=0 width=\"50%\" border=\"0\">
                <tr>
                    <td>
                    22:58 09.12.2009<br>Первая новость - изменил движок :-).<br>
                    Надеюсь из этого вырастет что-то стоящее. Поехали!
                    </td>
                </tr>
            </table>";

    $obj->assign("Body", implode("<br>", $News));
?>
