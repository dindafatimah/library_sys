<?php
// calling db connection file
include_once("../db_connect.php");


// data from crud_insert form
$name = $_POST["name"];

// update data
$sql = "INSERT INTO genre (name) VALUES ('".$name."')";
$result = $pdo->query($sql);

// redirect to table page
header("location: ../forms/newBooks.php");
?>