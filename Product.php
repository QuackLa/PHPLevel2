<?php

class Product 
{
    //Наличие (есть/нет) и количество товара
    private $availability;
    private $count;
    //Указание значений
    public function getIt($availability,$count) 
        {
        $this->availability = $availability;
        $this->count = $count;
        }
    //Вывод данных
    public function show() 
        {
            echo "<br>Наличие товара: ".$this->availability."<br>Количество товара: ".$this->count;
        }
}



