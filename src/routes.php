<?php

route('library/{name:\d+}', 'apple', function() {
	
})->get(function() {

})->post(function() {

})->get('edit', function() {

})->any(function() {

})->group('name', function($req, $res) {
	$req->args->each(function() {

	});
});
Arr::$extends['name'] = function() {

}
Arr::$extends['name'] = 'apple';