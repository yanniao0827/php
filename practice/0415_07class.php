<?php

class Person
{
    #屬性宣告
    public $name;
    public $mobile;
    private $age;

    #建構函式
    function __construct($name, $mobile)
    {
        $this->name = $name;
        $this->mobile = $mobile;
    }
}

$p1 = new Person('Leana', '0978');
echo " $p1->name: $p1->mobile <br>";