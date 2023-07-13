<?php
// calling db connection file
include_once("../db_connect.php");

// data from url
$id = $_GET["id"];

// update data
$sql = "DELETE FROM books
        WHERE id = $id";
$result = $pdo->query($sql);

// redirect to table page
header("location: ../CRUD/books.php");
?>