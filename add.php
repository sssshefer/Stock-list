<?php
include('./config.php');

// initialize variables
$json = json_decode(file_get_contents('php://input'), true);
$name = $json["name"];
$stock = $json["stock"];
$id = $json["id"];

if(empty($name)){
    $name = 'empty';
}

$uniquee = mysqli_query($db, "SELECT id FROM test WHERE id='$id' ");

if(mysqli_num_rows($uniquee) == 0){
    mysqli_query($db, "INSERT INTO test (id, name, stock) VALUES ('$id', ' $name', '$stock')");
    echo $name . ' successfully added';
    echo '<br>';
    echo empty($name);
}else{
    echo "You must put unique id. Not successful";
}




