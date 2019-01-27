<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use cse\helpers\Request;

// Example: post
// ["example" => 12345] => 12345
$_POST['example'] = 12345;
var_dump(Request::post('example'));
// set default value: 12345
var_dump(Request::post('example_2', 12345));
echo PHP_EOL;

// Example: get
// ["example" => 12345] => 12345
$_GET['example'] = 12345;
var_dump(Request::get('example'));
// set default value: 12345
var_dump(Request::get('example_2', 12345));
echo PHP_EOL;

// Example: request
// ["example" => 12345] => 12345
$_REQUEST['example'] = 12345;
var_dump(Request::request('example'));
// set default value: 12345
var_dump(Request::request('example_2', 12345));
echo PHP_EOL;

// Example: is ajax
$_SERVER['HTTP_X_REQUESTED_WITH'] = 'xmlhttprequest';
var_dump(Request::isAjax());
echo PHP_EOL;

// Example: is post
$_SERVER['REQUEST_METHOD'] = Request::METHOD_POST;
var_dump(Request::isPost());
echo PHP_EOL;

// Example: is get
$_SERVER['REQUEST_METHOD'] = Request::METHOD_GET;
var_dump(Request::isGet());
echo PHP_EOL;

// Example: get request uri
// /link/example
$_SERVER['HTTP_REFERER'] = '/link/example';
var_dump(Request::getRequestUri());
// set default value: /link/home
unset($_SERVER['HTTP_REFERER']);
var_dump(Request::getRequestUri('/link/home'));
// ajax: /link/example_ajax
unset($_SERVER['HTTP_X_REQUESTED_WITH']);
unset($_SERVER['REQUEST_URI']);
$_SERVER['HTTP_X_REQUESTED_WITH'] = 'xmlhttprequest';
$_SERVER['REQUEST_URI'] = '/link/example_ajax';
var_dump(Request::getRequestUri());
echo PHP_EOL;