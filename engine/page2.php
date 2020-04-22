<?php
//Выполняем подключение к БД
include_once "../config/connect.php";

//Получаем, с помощью параметра GET, значение id_employee со страницы index.php при обращении к какой-либо из картинок
$getid = $_GET['id_employee'];
//Отправляем в БД обновлённое значение кликов для элемента с полученным параметром id
$shows = mysqli_query($side,"UPDATE employee SET clicks=clicks+1 WHERE id_employee='$getid'");
//Получаем ссылку на картинку по полученному id_employee элемента
$image = mysqli_query($side,"SELECT file_address FROM employee WHERE id_employee='$getid'");
//Получаем актуальное значение просмотров(кликов) для картинки с полученным id
$checker = mysqli_query($side,"SELECT clicks FROM employee WHERE id_employee='$getid'");
//Извлекаем в читаемом виде актуальное значение просмотров
$checks = implode("",mysqli_fetch_assoc($checker));
//Извлекаем в читаемом виде путь к картинке с полученным id
$i = implode("",mysqli_fetch_assoc($image));

//Часть ниже просто скопирована из материала к уроку, с изменением под свой массив

//подгружаем и активируем авто-загрузчик Twig-а
include_once '../Twig/Autoloader.php';
Twig_Autoloader::register();

try {
  // указывае где хранятся шаблоны
  $loader = new Twig_Loader_Filesystem('../templates');
  
  // инициализируем Twig
  $twig = new Twig_Environment($loader);
  
  // подгружаем шаблон
  $template = $twig->loadTemplate('page2.tmpl');
  
  // передаём в шаблон переменные и значения
  // выводим сформированное содержание
  echo $template->render(array(
    'i' => "$i", //адрес конкретной картинки, id которой мы получили
    'checks' => "$checks" //количество просмотров выбранной картинки
  ));
  
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}