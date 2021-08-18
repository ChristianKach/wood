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

$route['default_controller'] = "home";
$route['404_override'] = '';

$route['bois/delete-many'] = "bois/deletemany"; 
$route['klef/delete-many'] = "klef/deletemany"; 
$route['type_bois/delete-many'] = "type_bois/deletemany"; 
$route['stabilite/delete-many'] = "stabilite/deletemany"; 
$route['categorie/delete-many'] = "categorie/deletemany"; 
$route['charge/delete-many'] = "charge/deletemany"; 
$route['preparationpassage/delete-many'] = "preparationpassage/deletemany"; 
$route['passage/delete-many'] = "passage/deletemany"; 
$route['majoration/delete-many'] = "majoration/deletemany"; 
$route['poincon/delete-many'] = "poincon/deletemany"; 
$route['poutre/delete-many'] = "poutre/deletemany"; 
$route['compression/delete-many'] = "compression/deletemany"; 
$route['traction/delete-many'] = "traction/deletemany"; 
$route['flexion_simple/delete-many'] = "flexion_simple/deletemany"; 
$route['flexion_compose/delete-many'] = "flexion_compose/deletemany"; 
$route['emb_arriere/delete-many'] = "emb_arriere/deletemany"; 
$route['emb_avant/delete-many'] = "emb_avant/deletemany"; 
$route['emb_double/delete-many'] = "emb_double/deletemany"; 
$route['poteau_centre/delete-many'] = "poteau_centre/deletemany"; 
$route['panne/delete-many'] = "panne/deletemany"; 
$route['statistique/delete-many'] = "statistique/deletemany";
$route['resultat/delete-many'] = "resultat/deletemany";
$route['coefficient/delete-many'] = "coefficient/deletemany";



/* End of file routes.php */
/* Location: ./application/config/routes.php */