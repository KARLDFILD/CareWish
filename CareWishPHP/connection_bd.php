<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'CareWishPHP';

$conn = mysqli_connect($host, $user, $password, $db_name);

if (!$conn) {
	die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
}