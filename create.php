<?php

var_dump($_POST);
$connection  = require "./Connection.php";
$connection->addNote($_POST);
header("Location: index.php");
