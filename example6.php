<?php
include 'Twig/Autoloader.php';
Twig_Autoloader::register();

// подключение к БД, у меня нет пароля, поэтому соответствующие поле оставил пустым
try {
  $dbh = new PDO('mysql:dbname=world;host=localhost', 'root', '');
} catch (PDOException $e) {
  echo "Error: Could not connect. " . $e->getMessage();
}

// установка error режима
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// выполняем запрос
try {
  // формируем SELECT запрос
  // в результате каждая строка таблицы будет объектом
  $sql = "SELECT country.Code AS code, country.Name AS name, country.Region AS region, country.Population AS population,
   countrylanguage.Language AS language, city.Name AS capital FROM country, city, countrylanguage WHERE 
   country.Code = city.CountryCode AND country.Capital = city.ID AND country.Code = countrylanguage.CountryCode 
   AND countrylanguage.IsOfficial = 'T' ORDER BY population DESC LIMIT 0,20";
  $sth = $dbh->query($sql);
  while ($row = $sth->fetchObject()) {
    $data[] = $row;
  }
  
/* Структура таблиц и связи
Таблица country

Code , Name , Region , Population , Capital 
1      Turkey,South_Europe, 82,       1
2       France, Western_Europe, 67,   4


--------------------------
Таблица countrylanguage

Language , CountryCode , IsOfficial
Turkey      1                 T
France     2                  F
---------------------------
Таблица city

CountryCode , ID,       Name
1             1          Stambyl
1             2          Ankara
1             3          Izmir
2             4          Paris
2             5          Marsel
2             6          Leon

Связи столбцов
country.Code = countrylanguage.CountryCode;
country.Code = city.CountryCode;
country.Capital = city.ID;

*/


  // закрываем соединение
  unset($dbh); 

  $loader = new Twig_Loader_Filesystem('templates');
  
  $twig = new Twig_Environment($loader);
  
  $template = $twig->loadTemplate('countries2.tmpl');

  echo $template->render(array (
    'data' => $data
  ));
  
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
?>