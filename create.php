<?php
$connection  = require "./Connection.php";
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";

if (isset($_POST['id'])) {
    $connection->updateNote($_POST['id'], $_POST);
} else {
    $connection->addNote($_POST);
}
header("Location: index.php");
