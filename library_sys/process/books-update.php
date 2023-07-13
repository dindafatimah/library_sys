<?php
// calling db connection file
include_once("../db_connect.php");

// data from url
$id = $_GET["id"];


// data from crud_insert form
$title = $_POST["title"];
$isbn =$_POST["isbn"];
$author = $_POST["author"];
$genre =$_POST["genre_id"];

// update data
$sql = "UPDATE books SET title = '".$title."', isbn = '".$isbn."', author = '".$author."', genre_id = '".$genre."'  WHERE id = ".$id;
$result = $pdo->query($sql);

// redirect to table page
header("location: ../CRUD/books.php");
?>