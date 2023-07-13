<?php
// calling db connection file
include_once("../db_connect.php");

// data from url
$id = $_GET["id"];

// data from crud_insert form
$name = $_POST["name"];
$email =$_POST["email"];
$domicile =$_POST["domicile"];

// update data
$sql = "UPDATE members SET name = '".$name."', email = '".$email."', domicile = '".$domicile."'
            WHERE id = ".$id;
$result = $pdo->query($sql);

// redirect to table page
header("location: ../CRUD/members.php");
?>