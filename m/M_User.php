<?php
/*
Модель для работы с пользователем
*/
//Регистрируем нового пользователя в базе данных
function registration($login,$password,$mail,$name,$surname,$db)
{
    //Если полученные все данные из формы регистрации, то отправляем их в БД и авторизуем пользователя
	if($login and $password and $mail and $name and $surname)
	{
        //Предварительно проверяем, что такого пользователя в базе нет
        $auth = $db->prepare("SELECT `login` FROM `users` WHERE `login`='$login'");
		$auth->execute();
        $checkUser = $auth->fetchAll();
        //Если совпадений по логину в базе не найдено, значит пользователь уникальный и мы добавляем его в базу
        if(!$checkUser)
		{
            //Отправляем в БД данные нового пользователя.
	        $registr = $db->prepare("INSERT INTO `users` (`login`,`password`,`access`,`name`,`surname`,`mail`) 
	            VALUES ('$login','$password','0','$name','$surname','$mail')");//Подготовили
            $registr->execute();//Отправили
            //Добавляем куки, если все данные внесены
			setcookie('login', $_POST['login']);
			setcookie('password', $_POST['password']);
			//Возвращаем на главную страница
			header('location: index.php');
        }
        else 
		{
            header('location:index.php?c=User&act=reg');
        }
    }
}

function auth($login,$password,$db)
{
    //Проверяем в базе наличие введённых данных, если совпадения есть - возвращаем true
    $auth = $db->prepare("SELECT `login`,`password` FROM `users` WHERE `login`='$login' and `password`='$password'");
    $auth->execute();
    $result = $auth->fetchAll();
    if($result)
         return true;
    else 
        return false; 
}

