<?php

class Mouse extends Product 
{
    //Название, категория товара и цена
    private $name;
    private $category;
    private $price;
    //Указание значений
    public function setter($name,$category,$price)
        {
            $this->name = $name;
            $this->category = $category;
            $this->price = $price;
        }
    //Вывод данных
    public function description() 
        {
        echo "Название товара: ".$this->name."<br>Категория: ".$this->category."<br>Цена: ".$this->price;
        }
}
