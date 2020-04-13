<?php
include_once "Product.php";
include_once "Mouse.php";
//Родитель и ребёнок отличаются, прежде всего, свойствами. Если правильно понимаю

//Мышка номер 1
//Создаём объекты
$product = new Product;
$mouse = new Mouse;
//Задаём значения переменных
$product->getIt("В наличии",5);
$mouse->setter("Philips","Мыши","150$");
//Выводим данные на экран
$mouse->description();
$product->show();

echo "<hr>";
//Мышка номер 2
//Создаём общий объект для двух классов, чтобы обращаться из дочернего к родителю
$product2 = new Product;
$product2 = new Mouse;
//Задаём значения переменных
$product2->getIt("Нет на складе",0);
$product2->setter("Sony","Мыши","200$");
//Выводим данные на экран
$product2->description();
$product2->show();


