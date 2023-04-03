<?php
include ('./config.php');

// initialize variables
$json = json_decode(file_get_contents('php://input'), true);

$id = $json["id"];
$name = $json["name"];
$stock = $json["stock"];
if ($json["edit"] == "edit") {
    echo '
            <form class="form" id="resOfEditForm">
                <input type="text" name="id" value="' . $id . '" class="editInput">
                <input type="text" name="name"  value="' . $name . '" class="editInput">
                <input type="text" name="stock" value="' . $stock . '" class="editInput"><br>
                <button class="form__submit form__cancel"  type="submit" onclick="showAll()">Cancel</button>
                <button class="form__submit form__save" type="submit" name="save" value="save">Save</button>
            </form> 
            
           ';
}

if ($json["edit"] == "delete") {
    mysqli_query($db, "DELETE FROM test WHERE id='$id'");

    echo '<p>'.$name . ' successfully deleted <button id="backBtn">Back</button></p>';
}

?>