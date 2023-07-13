<?php
// create connection
$host= 'db.hzzzkowcaikwjbrhrwrn.supabase.co';
$db = 'postgres';
$user = 'postgres';
$password = 'sTarss0058_-'; 
$port= '5432';

$dsn = "pgsql:host=$host;port=5432;dbname=$db;port=$port";
$pdo = new PDO($dsn, $user, $password);
?>