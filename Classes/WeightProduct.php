<?php
//Товар на вес
class WeightProduct extends Product
{
    //Вводим локальную переменную 'цена'
    private $price;
    //Вводим локальну переменную 'вес'
    private $weight;

    
    //Задаём цену товара за кг
    public function setPrice($price)
    {
        $this->price = $price;
    }

    //Извлекаем цену товара
    public function getPrice()
    {
        return $this->price*$this->weight;
    }

    //Указываем вес товара в кг
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    //Извлекаем вес товара в кг
    public function getWeight()
    {
        return $this->weight;
    }

    //Извлекаем прибыль от продажи товара
    public function getIncome()
    {
        //По идеи тут должно быть сложение суммы разовой продажи со статической переменной $income и её переопределение
        //return parent::$income + стоимость разовой продажи = parent::$income;
    }
}