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
        $this->name = $name; //$this->name指將得到的變數放到$name裡面，等號左邊需要跟類型裡面的屬性相同
        $this->mobile = $mobile;
    }
}

$p1 = new Person('Leana', '0978'); //用new後面接類型名稱去建立一個物件，如果類型裡有設定建構函式，這裡的()就等同於呼叫該函式的意思
echo " $p1->name: $p1->mobile <br>";
