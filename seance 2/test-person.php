<?php
require_once "Person.php";

$obj = new Person;

$obj->name = "Peter"; 
$obj->address = "Pie IX"; 
$obj->zipCode = "H2H2H2"; 

echo "<pre>";
var_dump($obj);
echo "</pre>";

print_r($obj);

echo $obj->name;

echo "<hr>";

$obj2 = new Person;

$obj2->name = "Marie"; 
$obj2->address = "Sherbrooke";  

echo "<pre>";
var_dump($obj2);
echo "</pre>";

print_r($obj2);

echo $obj2->name;


?>