<?php
//Берём последнюю посещённую страницу
$a = $_SERVER['HTTP_REFERER'];
//Помещаем её в куки и даём имя lastVisit[0]. Далее прибавляем по единичке к ключу и записываем новые значения
if(!$_COOKIE['1'])
{
	setcookie('lastVisit[0]',$a,time() +60);
	setcookie('1','1',time() +10);
}
elseif($_COOKIE['1'] and !$_COOKIE['2'])
{
	setcookie('1','1',time() -180);
	unset($_COOKIE['1']);
	setcookie('lastVisit[1]',$a,time() +60);
	setcookie('2','2',time() +10);
}
elseif($_COOKIE['2'] and !$_COOKIE['3'])
{
	setcookie('2','2',time() -180);
	unset($_COOKIE['2']);
	setcookie('lastVisit[2]',$a,time() +60);
	setcookie('3','3',time() +10);
}
elseif($_COOKIE['3'] and !$_COOKIE['4'])
{
	setcookie('3','3',time() -180);
	unset($_COOKIE['3']);
	setcookie('lastVisit[3]',$a,time() +60);
	setcookie('4','4',time() +10);
}
elseif($_COOKIE['4'])
{
	unset($_COOKIE['4']);
	setcookie('lastVisit[4]',$a,time() +60);
}