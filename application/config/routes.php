<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//$route['login'] = 'pages/login';
$route['admin/accman/createUser'] = 'admin/createUser';
$route['admin/accman/viewUser'] = 'admin/viewUser';
$route['admin/accman/modifyUser'] = 'admin/modifyUser';
$route['admin/accman/deleteUser'] = 'admin/deleteUser';
$route['admin/resdata/createBook'] = 'admin/createBook';
$route['admin/statistics/(:any)'] = 'admin/statistics/$1';
$route['admin/records/(:any)'] = 'admin/records/$1';
$route['admin/resdata/(:any)'] = 'admin/resdata/$1';
$route['admin/accman/(:any)'] = 'admin/accman/$1';
$route['pages'] = 'pages/index';

$route['default_controller'] = 'user/login';
/*
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
*/

