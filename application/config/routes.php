<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "front/auth/login";
$route['404_override'] = '';
//dashboard route
//$route['dashboard'] = "admin/modules/dashboard";
$route['admin/dashboard'] = "admin/modules/dashboard";
//admin route
$route['admin'] = "admin/auth";
$route['admin/login'] = "admin/auth";
$route['admin/logout'] = "admin/auth/logout";
//customer routes
$route['admin/customers'] = "admin/modules/customers";
$route['admin/customers/add'] = "admin/modules/add_customer";
$route['admin/customers/edit/(:num)'] = "admin/modules/edit_customer/$1";
$route['admin/customers/delete/(:num)'] = "admin/modules/delete_customer/$1";
//Work routes
//$route['admin/points'] = "admin/modules/works";
$route['admin/points/add/(:num)'] = "admin/modules/add_points/$1";
$route['admin/works/edit/(:num)'] = "admin/modules/edit_work/$1";
$route['admin/works/delete/(:num)'] = "admin/modules/delete_work/$1";
//Repot routes
$route['admin/reports'] = "admin/modules/reports";
//Front End
$route['login'] = "front/auth/login";
$route['analyzer'] = "front/modules/analyzer";
$route['analyzing'] = "front/modules/analyzing";
$route['logout'] = "front/auth/logout";
/* End of file routes.php */
/* Location: ./application/config/routes.php */