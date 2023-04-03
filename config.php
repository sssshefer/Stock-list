<?php
$servername = "piter22.dns-rus.net";
$username = "bhx20990_sssshefer";
$password = "MVXdDTCKg5";
$dbname = "bhx20990_dbtest";

$db = new mysqli($servername, $username, $password, $dbname);
if ($db === false) {
    die("Ошибка: " . mysqli_connect_error());
}
