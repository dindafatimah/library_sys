<?php
// calling db connection file
include_once("../db_connect.php");

// data from url
$lend_id = $_GET["lend_id"];

// update data
$sql = "DELETE FROM book_lending
        WHERE id = $lend_id";
$result = $pdo->query($sql);

// redirect to table page
header("location: ../CRUD/book_lending.php");
?>