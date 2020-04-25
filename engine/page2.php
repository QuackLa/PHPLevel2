<?php
//Делать выборку из БД
$url = $db->query("SELECT * FROM employee ORDER BY clicks DESC LIMIT 10");
//Создаём пустой массив
$sites = [];
//Заполняем массив полученными данными из БД
while($MMM = $url->fetch())
      $sites[] = $MMM;

//Часть ниже просто скопирована из материала к уроку, с изменением под свой массив

// подгружаем и активируем авто-загрузчик Twig-а
require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();

try {
  // указывае где хранятся шаблоны
  $loader = new Twig_Loader_Filesystem('templates');
  
  // инициализируем Twig
  $twig = new Twig_Environment($loader);
  
  // подгружаем шаблон
  $template = $twig->loadTemplate('page1.tmpl');
  
  // передаём в шаблон переменные и значения
    // выводим сформированное содержание
       echo $template->render(array(
            'sites' => $sites //Массив с адресами картинок,их id и количеством просмотров
        ));
      
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}