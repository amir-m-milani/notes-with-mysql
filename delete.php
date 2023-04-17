<?php
$connection  = require "./Connection.php";
$connection->deleteNote($_POST['id']);
header("Location: index.php");
