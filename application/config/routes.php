<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'Home';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['documents/(:any)'] = 'admin_Dashboard/documents/$1';
$route['staff_edit/(:any)'] = 'admin_Dashboard/staff_edit/$1';
$route['leads_edit/(:any)'] = 'admin_Dashboard/leads_edit/$1';
$route['login'] = 'Home/login';
$route['staff_regsiteration'] = 'Home/staff_regsiteration';
$route['dashboard'] = 'admin_Dashboard';
$route['leads'] = 'admin_Dashboard/leads';
$route['staff'] = 'admin_Dashboard/staff';
$route['lead_type'] = 'admin_Dashboard/lead_type';
$route['service_type'] = 'admin_Dashboard/service_type';
$route['admincomment'] = 'admin_Dashboard/admincomment';
$route['lead_login'] = 'Home/lead_login';

$route['user_panel'] = 'LeadPanel/user_panel';
