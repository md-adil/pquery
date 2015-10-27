<?php
require 'Core.php';
require 'Arr.php';
require 'ArrMap.php';
require 'Str.php';
require 'PDOAccessor.php';
function str($str) {
	return new Str($str);
}
function arr($array) {
	return new Arr($array);
}
function pdo($db) {
	$pdo = new PDO("mysql:host=localhost;dbname={$db}", 'root');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $pdo;
}