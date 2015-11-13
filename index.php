<?php
include 'functions.php';

function pdo1($dbname, $host='localhost', $user='root', $password="") {
	return new PDO("mysql:host={$host};dbname={$dbname}", $user, $password);
}

$pdo = pdo1('aqil_2');