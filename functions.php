<?php
require 'Core.php';
require 'PQueryException.php';
require 'Arr.php';
require 'ArrMap.php';
require 'Regex.php';
require 'Str.php';
require 'PDOAccessor.php';
function str($str) {
	return new Str($str);
}
function arr($array = []) {
	return new Arr($array);
}
function pdo($db) {
	$pdo = new PDO("mysql:host=localhost;dbname={$db}", 'root');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $pdo;
}
function regex($pattern, $modifier) {
	return new Regex($pattern, $modifier);
}
function db() {

}
function input() {

}
function route() {

}
function session() {

}
function cookie() {

}
function headers() {

}
function request() {

}
function response() {

}
function view() {

}
function configs() {

}
function render() {

}
function share() {

}