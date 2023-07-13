<?php
// calling db connection file
include_once("../db_connect.php");


// data from crud_insert form
$title = $_POST["title"];
$isbn =$_POST["isbn"];
$author = $_POST["author"];
$genre_id =$_POST["genre_id"];

// update data
$sql = "INSERT INTO books (title, isbn, author, genre_id) VALUES ('".$title."', '".$isbn."', '".$author."', '".$genre_id."')";
$result = $pdo->query($sql);

// redirect to table page
header("location: ../CRUD/books.php");
?>