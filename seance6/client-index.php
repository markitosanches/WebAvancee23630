<?php
require_once('db/connex.php');
$sql = "SELECT * FROM client ORDER BY name;";
$stmt = $pdo->query($sql);

// $client = $stmt->fetchAll();

// echo "<pre>";
// var_dump($client);
// echo "</pre>";


// foreach($stmt as $row){
//     //print_r($row);
//    echo $row['name'];
//     echo "<br>";
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Client</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($stmt as $row) {
            ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['address'] ?></td>
                <td><?= $row['phone'] ?></td>
                <td><?= $row['email'] ?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>