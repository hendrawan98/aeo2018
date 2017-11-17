<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
$route['default_controller'] = 'home/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// public
// dont need login
$route['home'] = 'home/index';
$route['register'] = 'home/registerPage';
$route['doRegister'] = 'home/register';
$route['login'] = 'home/loginpage';
$route['about_organizer'] = 'about/about_organizer';
$route['about_event'] = 'about/about_event';
$route['program_highlight'] = 'about/program_highlight';

//need login
$route['dashboard'] = 'user/dashboardPage';
$route['logout'] = 'home/logout';
$route['view/profile'] = 'user/editprofile';
$route['change-password'] = 'user/changepassword';
$route['send-delegates'] = 'user/senddelegates';
$route['payment-detail/(:num)'] = 'user/payment_detail2/$1';
$route['delete/transaction/(:num)'] = 'user/deleteTransaction/$1';
$route['dashboard/confirmation'] = 'user/confirmation_form';
$route['dashboard/confirmation/inter'] = 'user/confirmation_inter';
$route['doConfirmation'] = 'user/doConfirmation';
$route['doConfirmationInter'] = 'user/doConfirmationInter';
$route['accommodation-form'] = 'user/accommodation_form';
$route['payment-detail-accommodation/(:num)'] = 'user/payment_detail3/$1';
$route['delete/accommodation/(:any)'] = 'user/remove/$1';

//admin
$route['adminpage'] = 'admin/adminpage';