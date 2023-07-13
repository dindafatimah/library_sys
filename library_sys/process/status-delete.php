<?php
// calling db connection file
include_once("../db_connect.php");

// data from url
$id = $_GET["id"];

// update data
$sql2 = "DELETE FROM book_lending
        WHERE lending_id = $id";
$result = $pdo->query($sql2);

$sql = "DELETE FROM lending
        WHERE id = $id";
$result = $pdo->query($sql);


// redirect to table page
header("location: ../CRUD/book_lending.php");
?>