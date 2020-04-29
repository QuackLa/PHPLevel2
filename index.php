<?php
//Запоминаем в куки посещённые странички
include_once('m/lastVisits.php');

//Автоматическая подгрузка классов с использованием анонимной функции
spl_autoload_register(function ($classname)
{
	include_once("c/$classname.php");
});

//Второй вариант, где функция имеет имя
/* spl_autoload_register('autoloader');

  	function autoloader($classname)
  	{
		include_once("c/$classname.php");
	}
*/


//site.ru/index.php?act=auth&c=User

$action = 'action_';
$action .=(isset($_GET['act'])) ? $_GET['act'] : 'index';
//$action = 'action_edit';
//action_edit и action_index уходят в C_Page;  action_reg/auth/exit/lk  уходят в C_User
//Пример записи index.php?c=User&act=reg
switch ($_GET['c'])
{
	case 'articles'://Тут не совсем понял
		$controller = new C_Page();
	case 'User'://Если в запросе c=User, то запрос улетает в контроллер C_User
		$controller = new C_User();
		break;
	default: 
		$controller = new C_Page();
}

$controller->Request($action);
