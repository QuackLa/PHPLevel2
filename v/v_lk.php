<?php
//Личный кабинет пользователя
$visit = [];
$visit = $_COOKIE['lastVisit'];
?>
<p>Привет, <?=$_COOKIE['login']?></p>
<p>Это твой личный кабинет, в дальнейшем тут что-то будет</p>
<hr>
<p>Последние 5 разделов, которые Вы посетили на нашем сайте за последнюю минуту</p>
    <?php foreach($_COOKIE['lastVisit'] as $k => $v):?>
    <a href="<?=$v?>"><?=$v?></a><br/>
    <?php endforeach ?>