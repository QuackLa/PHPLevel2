<?php
//Подключаем классы
include_once "Classes/Product.php";
include_once "Classes/DigitalProduct.php";
include_once "Classes/OneUnitOfProduct.php";
include_once "Classes/WeightProduct.php";

//Создаём объекты классов
$a = new DigitalProduct;
$b = new OneUnitOfProduct;
$c = new WeightProduct;

//Задаём стоимость штучного товара
$b->setPrice(20);
//Присваем переменной заданную стоимость штучного товара
$PriceOfOneUnitProduct = $b->getPrice();
//На основе цены штучного товара вычисляем и указываем цену цифрового товара. Цена цифры вдвое меньше цены штучного товара
$a->setPrice($PriceOfOneUnitProduct*0.5);
//Задаём стоимость товара на развес за кг
$c->setPrice(5);
//Задаём вес товара на развес
$c->setWeight(10);


//Выводим на экран цены товарров
echo "Цена цифрового товара составляет ".$a->getPrice()." долларов США<br>";
echo "Цена штучного товара составляет ".$b->getPrice()." долларов США<br>";
echo "Цена развесного товара составляет ".$c->getPrice()." долларов США за ".$c->getWeight()." кг";



