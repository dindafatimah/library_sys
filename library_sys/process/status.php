<?php
// calling db connection file
include_once("../db_connect.php");

// data from url
$id = $_GET["id"];


// data from crud_insert form
$status = $_POST["status"];

// update data
$sql = "UPDATE lending SET status = '".$status."' WHERE id = ".$id;
$result = $pdo->query($sql);

// redirect to table page
header("location: ../CRUD/book_lending.php");
?>