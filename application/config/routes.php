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
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['check_username'] = 'extra/check_username';

// LOGIN
$route['index'] = 'login/index';
$route['logout'] = 'login/logout';

// HOME
$route['project_monitoring_lists'] = 'home/project_monitoring_lists';
$route['project_monitoring_get'] = 'home/project_monitoring_get';
$route['resource_monitoring_lists'] = 'home/resource_monitoring_lists';

// PROJECT
$route['project_create'] = 'project/project_create';
$route['project_document_lists'] = 'project/project_document_lists';
$route['project_issue_lists'] = 'project/project_issue_lists';
$route['project_lists'] = 'project/project_lists';
$route['project_get'] = 'project/project_get';
$route['project_overtime_lists'] = 'project/project_overtime_lists';
$route['project_overview_get1'] = 'project/project_overview_get1';
$route['project_overview_lists'] = 'project/project_overview_lists';
$route['project_overview_get'] = 'project/project_overview_get';
$route['project_task_create'] = 'project/project_task_create';
$route['project_timeline_get'] = 'project/project_timeline_get';
$route['project_timeline_lists'] = 'project/project_timeline_lists';
$route['project_type_create'] = 'project/project_type_create';
$route['project_type_delete'] = 'project/project_type_delete';
$route['project_type_get'] = 'project/project_type_get';
$route['project_type_lists'] = 'project/project_type_lists';
$route['project_visit_lists'] = 'project/project_visit_lists';

// PROJECT SETTING
$route['project_info'] = 'project_setting/project_info';
$route['project_member'] = 'project_setting/project_member';

// COMPLAINT
$route['complaint_lists'] = 'complaint/complaint_lists';

// HCM
$route['activities_detail_lists'] = 'hcm/activities_detail_lists';
$route['activities_monitoring_lists'] = 'hcm/activities_monitoring_lists';
$route['operation_monitoring_lists'] = 'hcm/operation_monitoring_lists';
$route['project_portfolio_lists'] = 'hcm/project_portfolio_lists';
$route['resource_competency'] = 'hcm/resource_competency';
$route['resource_setting'] = 'hcm/resource_setting';
$route['training_lists'] = 'hcm/training_lists';

// User
$route['user_create'] = 'user/user_create';
$route['user_delete'] = 'user/user_delete';
$route['user_edit'] = 'user/user_edit';
$route['user_get'] = 'user/user_get';
$route['user_lists'] = 'user/user_lists';
$route['user_view'] = 'user/user_view';

// Others
$route['company_create'] = 'others/company_create';
$route['company_delete'] = 'others/company_delete';
$route['company_get'] = 'others/company_get';
$route['company_lists'] = 'others/company_lists';
$route['position_create'] = 'others/position_create';
$route['position_delete'] = 'others/position_delete';
$route['position_get'] = 'others/position_get';
$route['position_lists'] = 'others/position_lists';

// Job
$route['job_analyst_create'] = 'job/analyst_create';
$route['job_analyst_delete'] = 'job/analyst_delete';
$route['job_analyst_get'] = 'job/analyst_get';
$route['job_analyst_lists'] = 'job/analyst_lists';
$route['job_role_create'] = 'job/role_create';
$route['job_role_delete'] = 'job/role_delete';
$route['job_role_get'] = 'job/role_get';
$route['job_role_lists'] = 'job/role_lists';
