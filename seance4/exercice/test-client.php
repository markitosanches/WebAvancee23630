<?php
require_once "class/Client.php";

$newClient = new Client("Sam", "221 Sous-Coline", "", "La Comptée","commun");
echo"<pre>";
var_dump($newClient);
echo"</pre>";

//test de la fonction setPhone du parent (Person)
$newClient->setPhone("221-1122");
// echo $newEmploye->phone; ne fonctionne pas car la valeur est proteger
// utilisation de la fonction publique getPhone pour y acceder.
echo $newClient->getPhone();
echo"<pre>";
var_dump($newClient);
echo"</pre>";
