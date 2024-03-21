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
$route['default_controller'] = 'admin';
$route['404_override'] = 'Notfound';
$route['translate_uri_dashes'] = FALSE;
# Disable Controller access without routing
//$route['user/produk'] = "error404";
//================================================USER

$route['admin-dashboard'] = 'admin/dashboard'; 

$route['admin-news'] = 'admin/news'; 
$route['admin-news-form'] = 'admin/news_form'; 
$route['admin-news-edit/(:num)'] = 'admin/news_edit/$1'; 
$route['admin-news-delete/(:num)'] = 'admin/news_delete/$1'; 
$route['admin-news-category'] = 'admin/news_category'; 

$route['admin-portfolio'] = 'admin/portfolio'; 
$route['admin-portfolio-form'] = 'admin/portfolio_form'; 
$route['admin-portfolio-delete/(:num)'] = 'admin/portfolio_delete/$1'; 
$route['admin-portfolio-edit/(:num)'] = 'admin/portfolio_edit/$1'; 
$route['admin-portfolio-category'] = 'admin/portfolio_category'; 


$route['admin-logo'] = 'admin/logo'; 
$route['admin-footer'] = 'admin/footer'; 

$route['admin-meta'] = 'admin/meta';
$route['admin-social-media'] = 'admin/social_media'; 
$route['admin-embed-map'] = 'admin/embed_map'; 


$route['admin-edit-profile'] = 'admin/setting'; 

$route['admin-forgot-password'] = 'admin/forgot_password'; 
$route['admin-forgot-password-otp'] = 'admin/forgot_password_otp'; 

$route['admin-new-password'] = 'admin/new_password'; 

//$route['/(:any)'] = 'home/$1'; 

//$route['/(:any)'] = "category/index/$1";

