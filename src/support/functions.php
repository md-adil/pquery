<?php 
use PQuery\Arr;
use PQuery\Str;
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