<?php
// calling db connection file
include_once("../db_connect.php");


// data from crud_insert form
$name = $_POST["name"];
$email =$_POST["email"];
$domicile =$_POST["domicile"];

// update data
$sql = "INSERT INTO members (name, email, domicile) VALUES ('".$name."', '".$email."', '".$domicile."')";
$result = $pdo->query($sql);

// redirect to table page
header("location: ../CRUD/members.php");
?>