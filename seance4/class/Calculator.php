<?php
class Calculator{

    //public static $message = 'the result is :';
    public static $message = 'The result is : ';

    public static function add($a, $b){
        $result  = $a + $b;
        return self::$message.$result;
    }
}