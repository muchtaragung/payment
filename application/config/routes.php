<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/



// defalut bawaan ci
$route['default_controller'] = 'event';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// static 
$route['success'] = 'event/success_message';
$route['failed'] = 'event/gagal_message';
$route['login'] = 'auth';
$route['event'] = 'event';
$route['event/index'] = 'event/index';

$route['admin/event/list'] = 'admin/event/list';
$route['admin/event/update'] = 'admin/event/update';
$route['admin/event/edit'] = 'admin/event/edit';
$route['admin/event/delete'] = 'admin/event/delete';
$route['admin/event/add'] = 'admin/event/add';
$route['admin/event/save'] = 'admin/event/save';


// dinamis
$route['(:any)'] = 'event/sales_event/$1';
$route['(:any)/event/(:any)'] = 'event/detail_event/$1/$2';
