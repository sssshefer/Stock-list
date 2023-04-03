<?php
include('./config.php');

// initialize variables
$json = json_decode(file_get_contents('php://input'), true);

$id = $json["id"];
$name = $json["name"];
$stock = $json["stock"];
$oldId = $json["oldId"];

$uniquee = mysqli_query($db, "SELECT * FROM test WHERE id='$id' AND id!='$oldId' ");

if(mysqli_num_rows($uniquee) == 0){
mysqli_query($db, "UPDATE test
SET  id = '$id', name = '$name', stock = '$stock'
WHERE  id = '$oldId'");
}else{
    echo "You must put unique id. Not successful";
}



