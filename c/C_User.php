<?php
//Подключаем модель с методами, для работы с регистрацией/авторизацией
include_once('m/M_User.php');
//Подключение к БД
include_once('config/connect.php');


//Класс для работы с пользователем
class C_User extends C_Base
{
	//Регистрация пользователя
	public function action_reg()
	{
		//Используем глобальную переменную из файла connect.php для подключения к БД
		global $db;
		
		$this->title .= 'Регистрация пользователя';//Заголовок странички
		//Регистрируем нового пользователя в базе данных, если пользователь уникален и все поля заполнены
		//Файл находится в M_User
		registration($_POST['login'], $_POST['password'], $_POST['mail'], $_POST['name'], $_POST['surname'], $db);
		//Подключаем шаблон с формой
		$this->content = $this->Template('v/v_reg.php', array(
			'login' => $login,
			'password' => $password,
			'mail' => $mail,
			'name' => $name,
			'surname' => $surname
		));
	}

	//Авторизация пользователя
	public function action_auth(){
		//Используем глобальную переменную из файла connect.php для подключения к БД
		global $db;
		$this->title .= 'Авторизация пользователя'; //Заголовок странички
		$this->content = $this->Template('v/v_auth.php');//Шаблон формы авторизации
		//Обращаемся к функции auth из модуля M_User, чтобы проверить введённые данные на совпадения с БД
		$checkBase = auth($_POST['login'],$_POST['password'],$db);
		//Если в базе нашлись совпадения, сохраняем куки и выкидываем его на главную
		if($checkBase)
		{
			//Добавляем куки, если пользователь ввёл верные данные
			setcookie('login', $_POST['login']);
			setcookie('password', $_POST['password']);
			header('location: index.php');
		}
		//В ином случаи форма остаётся висеть
		else{
		   $this->content = $this->Template('v/v_auth.php');
		}
	}
	
	//Выход пользователя
	public function action_exit()
	{
		//Чистим куки от логина и пароля
		setcookie('login',"",time()-125600, "/"); 
		setcookie('password',"",time()-125600, "/");
		unset($_COOKIE['login']);
		unset($_COOKIE['password']);
		//Выкидываем на главную
		header('location: index.php');
		
	}

	//Переход в личный кабинет
	public function action_lk()
	{	
		//Защита от перехода по GET параметрам не имея записей в куки. Если куки есть - показываем личный кабинет
		if($_COOKIE['login'] and $_COOKIE['password'])
		{
			$this->title .= 'Личный кабинет '.$_COOKIE['login'];
			$this->content = $this->Template('v/v_lk.php');
		}
		//Если куки пусты - выбрасываем юзера на главную
		else 
		{
			header('location: index.php');
		}
	}

}
