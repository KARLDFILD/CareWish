<?php
require('connection_bd.php');

$name = $_POST['nameCallBack'];
$phone = $_POST['phoneCallBack'];
$message = $_POST['message'];

$stmt = $conn->prepare("INSERT INTO offer (name, tel, mess) VALUES (?, ?, ?)"); 
$stmt->bind_param("sss", $name, $phone, $message); 
$stmt->execute();

$stmt->close();
$conn->close();