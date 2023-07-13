<?php
// calling db connection file
include_once("../db_connect.php");


// data from crud_insert form
$books_id = $_POST["books_id"];
$lending_id = $_GET["id"];

// update data
$sql = "INSERT INTO book_lending (books_id, lending_id) VALUES ('".$books_id."', '".$lending_id."')";
$result = $pdo->query($sql);

// redirect to table page
header("location: ../CRUD/lent_books.php?id=".$lending_id);
?>