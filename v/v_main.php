<?php
//Главный шаблон с меню, контентом, футером
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title><?=$title?></title>
	<meta content="text/html; charset=Windows-1251" http-equiv="content-type">	
	<link rel="stylesheet" type="text/css" media="screen" href="v/style.css" /> 	
</head>
<body>
	<div id="header">
		<h1><?=$title?></h1>
	</div>
	
	<div id="menu">
		  <a href="index.php">Главная</a>
		| <a href="index.php?c=page&act=edit">Редактировать</a>
		<!-- Если нету записей в куки, то должна быть возможность регистрации и входа -->
		<?php if(!$_COOKIE['login'] and !$_COOKIE['password']):?>
		| <a href="index.php?c=User&act=reg">Регистрация</a>
		| <a href="index.php?c=User&act=auth">Войти</a>
		<?php endif ?>
		<!-- Если куки есть, то добавляем кнопку выхода из аккаунта и личный кабинет -->
		<?php if($_COOKIE['login'] and $_COOKIE['password']):?>
		| <a href="index.php?c=User&act=lk">Личный кабинет</a>
		| <a href="index.php?c=User&act=exit">Выйти</a>
		<?php endif ?>
	</div>
	
	<div id="content">
		<?=$content?>
	</div>
	
	<div id="footer">
		Все права защищены. <?=date("Y")?> год
	</div>
</body>
</html>
