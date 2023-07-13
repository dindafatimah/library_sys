<?php
// calling db connection file
include_once("../db_connect.php");

$id = $_GET["id"];


// data from crud_insert form
$lending_date = $_POST["lending_date"];
$members_id = $_POST["members_id"];
$return_date =$_POST["return_date"];
$status = "Not-Returned";

// update data
$sql = "INSERT INTO lending (lending_date, members_id, return_date, status) VALUES ('".$lending_date."', '".$members_id."', '".$return_date."', '".$status."')";
$result = $pdo->query($sql);

// redirect to table page
header("location: ../CRUD/book_lending.php");
?>