<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "welcome";
$route['404_override'] = '';

$route['admin'] = 'admin_start';

$route['admin/control'] = 'admin_control';
$route['admin/control/login'] = 'admin_control/login';

$route['admin/blog'] 				= 'admin_blog';
$route['admin/blog/:num'] 			= 'admin_blog';
$route['admin/blog/add'] 			= 'admin_blog/add';
$route['admin/blog/edit/:num'] 		= 'admin_blog/edit';
$route['admin/blog/save'] 			= 'admin_blog/save';
$route['admin/blog/delete/:num'] 	= 'admin_blog/delete';



/* End of file routes.php */
/* Location: ./application/config/routes.php */