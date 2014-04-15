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

$route['default_controller'] = "welcome";
$route['404_override'] = '';


#admin routes
$route['admin'] = "admin/admin_controller";
$route['admin/login'] = "admin/admin_controller/login";
$route['admin/process'] = "admin/admin_controller/process";
$route['admin/dashboard'] = "admin/admin_controller/dashboard";
$route['admin/logout'] = "admin/admin_controller/logout";

# artikel routes
$route['admin/artikel'] = "admin/artikel_controller";
$route['admin/artikel/add'] = "admin/artikel_controller/add";
$route['admin/artikel/save'] = "admin/artikel_controller/save";
$route['admin/artikel/edit/(:num)/(:any)'] = "admin/artikel_controller/edit";
$route['admin/artikel/update'] = "admin/artikel_controller/update";
$route['admin/artikel/trash/(:num)/(:any)'] = "admin/artikel_controller/sampah";
$route['admin/artikel/delete_image/(:num)'] = "admin/artikel_controller/delete_image";

# halaman routes
$route['admin/halaman'] = "admin/halaman_controller";
$route['admin/halaman/add'] = "admin/halaman_controller/add";
$route['admin/halaman/save'] = "admin/halaman_controller/save";
$route['admin/halaman/edit/(:num)/(:any)'] = "admin/halaman_controller/edit";
$route['admin/halaman/update'] = "admin/halaman_controller/update";
$route['admin/halaman/trash/(:num)/(:any)'] = "admin/halaman_controller/sampah";

/* End of file routes.php */
/* Location: ./application/config/routes.php */