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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['iniciar-sesion'] = 'login';



$route['Login'] = 'login/authUser';
$route['inicio'] = 'dashboard';

$route['Gestionar-Usuarios'] = 'user';
$route['Usuarios'] = 'user/get_users';
$route['saveUser'] = 'user/create';
$route['getUsuario'] = 'user/get_user';
$route['editUser'] = 'user/update_user';
$route['delUsuario'] = 'user/delete_user';

$route['Gestionar-Categorias'] = 'category';
$route['Categorias'] = 'category/get_categories';
$route['saveCategory'] = 'category/create';
$route['getCategory'] = 'category/get_category';
$route['editCategory'] = 'category/update';
$route['delCategory'] = 'category/delete';


$route['Gestionar-Articulos'] = 'article';
$route['Articulos'] = 'article/get_articles';
$route['saveArticles'] = 'article/create';
$route['editArticle'] = 'article/update';
$route['delArticle'] = 'article/delete';
$route['fillcategory'] = 'article/fillCategory';

$route['Gestionar-Clientes'] = 'client';
$route['Clientes'] = 'client/get_clients';
$route['saveClients'] = 'client/create';
$route['getClient'] = 'client/get_client';
$route['editClient'] = 'client/update';
$route['delClient'] = 'client/delete';

$route['Gestionar-Proveedores'] = 'supplier';
$route['Proveedores'] = 'supplier/get_suppliers';
$route['saveSupplier'] = 'supplier/create';
$route['getSupplier'] = 'supplier/get_supplier';
$route['editSupplier'] = 'supplier/update';
$route['delSupplier'] = 'supplier/delete';


$route['Punto-venta'] = 'pos';
$route['PostArticle'] = 'pos/load';
