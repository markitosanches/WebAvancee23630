<?php
if($_SERVER['REQUEST_METHOD'] != "POST"){
    header('location:client-index.php');
    exit;
}


// print_r($_POST);

// $name = $_POST['name'];
// $address = $_POST['address'];
// $phone = $_POST['phone'];
// $zip_code = $_POST['zip_code'];
// $email = $_POST['email'];

// echo "<br>";

foreach($_POST as $key=>$value){
   // echo $key." = ".$value."<br>";
   $$key = $value;
}


require_once('db/connex.php');
// $sql = "INSERT INTO client (name, address, phone, zip_code, email) VALUE ('$name', '$address', '$phone', '$zip_code', '$email');";
// $stmt = $pdo->query($sql);


$sql = "INSERT INTO client (name, address, phone, zip_code, email) VALUE (?, ?, ?, ?, ?);";
$stmt = $pdo->prepare($sql);
if($stmt->execute(array($name, $address, $phone, $zip_code, $email))){
    $id = $pdo->lastInsertId();
    header('location:client-show.php?id='.$id);
}else{
    print_r($stmt->errorInfo());
}









?>