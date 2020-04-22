<?php
//Штучный товар
class OneUnitOfProduct extends Product
{
    //Вводим локальную переменную 'цена'
    private $price;


    //Задаём цену товара за кг
    public function setPrice($price)
    {
        $this->price = $price;
    }
    
    //Извлекаем цену товара
    public function getPrice()
    {
        return $this->price;
    }

    //Извлекаем прибыль от продажи товара
    public function getIncome()
    {
        //По идеи тут должно быть сложение суммы разовой продажи со статической переменной $income и её переопределение
        //return parent::$income + стоимость разовой продажи = parent::$income;
    }
}