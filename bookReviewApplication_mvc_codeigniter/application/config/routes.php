<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "books";
$route['add'] = "/books/add";
$route['users/(:num)'] = "/books/users/$1";
$route['book/(:num)'] = "/books/book/$1";
$route['reviews'] = "/books/reviews";

$route['createNewUser'] = "/books/createNewUser";
$route['createReview'] = "/books/createReview";
$route['book/addReview'] = "/books/addReview";
$route['destroyReview/(:num)'] = "/books/destroyReview/$1";

$route['signIn'] = "/books/signIn";
$route['logout'] = "/books/logout";
$route['404_override'] = '';

//end of routes.php