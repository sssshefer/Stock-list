<?php
include ('./config.php');

$search = $_POST["search"];
$sql = "select * from test where name like '%$search%' ORDER BY Id ASC";
$result = $db->query($sql);

if ($result->num_rows > 0){

    echo "<ul>" ;
        while($row = $result->fetch_assoc()){
            echo "<li><p> Id: " . $row["id"]. ", Name: " . $row["name"]. " Stock: ". $row["stock"]. "</p></li>";
        }
        echo "</ul>";
} else {
    echo "<p> Not found</p>";
}

$db->close();
?>

