<?php

abstract class Product
{
    abstract public function getIncome();
    abstract public function getPrice();
    static public $income = 0;
}