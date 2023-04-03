<?php
include ('./config.php');


$sql = "SELECT * FROM test ORDER BY Id ASC";
$result = mysqli_query($db, $sql);
if (mysqli_num_rows($result) > 0) {
    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li><p><b>Id</b>:\t " . $row["id"] . ", <b>Name:</b> " . $row["name"] . ", <b>Stock:</b> " . $row["stock"] . '</p>
            <form class="form" id="editAndRemoveForm">
                <input class="form__submit_hidden_id" type="hidden" name = "id" value=" ' . $row["id"] . '">
                <input class="form__submit_hidden_name" type="hidden" name = "name" value=" ' . $row["name"] . '">
                <input class="form__submit_hidden_stock" type="hidden" name = "stock" value=" ' . $row["stock"] . '">
                <input class="form__submit form__edit" type="submit" name="edit" value="edit">
                <input class="form__submit form__remove" type="submit" name="edit" value="delete">
            </form>';

    }

} else {
    echo "<p> 0 results</p>";
}
mysqli_close($db);


?>