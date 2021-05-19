<?php

/* ================== Homepage ================== */
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::auth();

/* ================== Access Uploaded Files ================== */
Route::get('files/{hash}/{name}', 'LA\UploadsController@get_file');

/*
|--------------------------------------------------------------------------
| Admin Application Routes
|--------------------------------------------------------------------------
*/

$as = "";

if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
	$as = config('laraadmin.adminRoute').'.';
	
	// Routes for Laravel 5.3
	Route::get('/logout', 'Auth\LoginController@logout');
}

Route::group(['as' => $as, 'middleware' => ['auth', 'permission:ADMIN_PANEL']], function () {
	
	/* ================== Dashboard ================== */
	
	Route::get(config('laraadmin.adminRoute'), 'LA\DashboardController@index');
	Route::get(config('laraadmin.adminRoute'). '/dashboard', 'LA\DashboardController@index');
	
	/* ================== Users ================== */
	Route::resource(config('laraadmin.adminRoute') . '/users', 'LA\UsersController');
	Route::get(config('laraadmin.adminRoute') . '/user_dt_ajax', 'LA\UsersController@dtajax');
	
	/* ================== Uploads ================== */
	Route::resource(config('laraadmin.adminRoute') . '/uploads', 'LA\UploadsController');
	Route::post(config('laraadmin.adminRoute') . '/upload_files', 'LA\UploadsController@upload_files');
	Route::get(config('laraadmin.adminRoute') . '/uploaded_files', 'LA\UploadsController@uploaded_files');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_caption', 'LA\UploadsController@update_caption');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_filename', 'LA\UploadsController@update_filename');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_public', 'LA\UploadsController@update_public');
	Route::post(config('laraadmin.adminRoute') . '/uploads_delete_file', 'LA\UploadsController@delete_file');
	
	/* ================== Roles ================== */
	Route::resource(config('laraadmin.adminRoute') . '/roles', 'LA\RolesController');
	Route::get(config('laraadmin.adminRoute') . '/role_dt_ajax', 'LA\RolesController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/save_module_role_permissions/{id}', 'LA\RolesController@save_module_role_permissions');
	
	/* ================== Permissions ================== */
	Route::resource(config('laraadmin.adminRoute') . '/permissions', 'LA\PermissionsController');
	Route::get(config('laraadmin.adminRoute') . '/permission_dt_ajax', 'LA\PermissionsController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/save_permissions/{id}', 'LA\PermissionsController@save_permissions');
	
	/* ================== Departments ================== */
	Route::resource(config('laraadmin.adminRoute') . '/departments', 'LA\DepartmentsController');
	Route::get(config('laraadmin.adminRoute') . '/department_dt_ajax', 'LA\DepartmentsController@dtajax');
	
	/* ================== Employees ================== */
	Route::resource(config('laraadmin.adminRoute') . '/employees', 'LA\EmployeesController');
	Route::get(config('laraadmin.adminRoute') . '/employee_dt_ajax', 'LA\EmployeesController@dtajax');
	Route::get(config('laraadmin.adminRoute') . '/employee_fm_add', 'LA\EmployeesController@FormAdd');
	Route::post(config('laraadmin.adminRoute') . '/change_password/{id}', 'LA\EmployeesController@change_password');
	
	/* ================== Organizations ================== */
	Route::resource(config('laraadmin.adminRoute') . '/organizations', 'LA\OrganizationsController');
	Route::get(config('laraadmin.adminRoute') . '/organization_dt_ajax', 'LA\OrganizationsController@dtajax');

	/* ================== Backups ================== */
	Route::resource(config('laraadmin.adminRoute') . '/backups', 'LA\BackupsController');
	Route::get(config('laraadmin.adminRoute') . '/backup_dt_ajax', 'LA\BackupsController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/create_backup_ajax', 'LA\BackupsController@create_backup_ajax');
	Route::get(config('laraadmin.adminRoute') . '/downloadBackup/{id}', 'LA\BackupsController@downloadBackup');

	/* ================== Airports ================== */
	Route::resource(config('laraadmin.adminRoute') . '/airports', 'LA\AirportsController');
	Route::get(config('laraadmin.adminRoute') . '/airport_dt_ajax', 'LA\AirportsController@dtajax');
	Route::get(config('laraadmin.adminRoute') . '/airport_fm_add', 'LA\AirportsController@FormAdd');

	/* ================== Trucks ================== */
	Route::resource(config('laraadmin.adminRoute') . '/trucks', 'LA\TrucksController');
	Route::get(config('laraadmin.adminRoute') . '/truck_dt_ajax/{id}', 'LA\TrucksController@dtajax');
	Route::get(config('laraadmin.adminRoute') . '/truck_fm_add/{id}', 'LA\TrucksController@FormAdd');

	/* ================== RefuelingPlanBooks ================== */
	Route::resource(config('laraadmin.adminRoute') . '/refuelingplanbooks', 'LA\RefuelingPlanBooksController');
	Route::get(config('laraadmin.adminRoute') . '/refuelingplanbook_dt_ajax', 'LA\RefuelingPlanBooksController@dtajax');
	Route::get(config('laraadmin.adminRoute') . '/refuelingplanbook_fm_add', 'LA\RefuelingPlanBooksController@FormAdd');

	/* ================== Shifts ================== */
	Route::resource(config('laraadmin.adminRoute') . '/shifts', 'LA\ShiftsController');
	Route::get(config('laraadmin.adminRoute') . '/shift_dt_ajax/{id}', 'LA\ShiftsController@dtajax');
	Route::get(config('laraadmin.adminRoute') . '/shift_fm_add', 'LA\ShiftsController@FormAdd');

	/* ================== CustomerGroups ================== */
	Route::resource(config('laraadmin.adminRoute') . '/customergroups', 'LA\CustomerGroupsController');
	Route::get(config('laraadmin.adminRoute') . '/customergroup_dt_ajax', 'LA\CustomerGroupsController@dtajax');
	Route::get(config('laraadmin.adminRoute') . '/customergroup_fm_add', 'LA\CustomerGroupsController@FormAdd');

	/* ================== CustomerLocals ================== */
	Route::resource(config('laraadmin.adminRoute') . '/customerlocals', 'LA\CustomerLocalsController');
	Route::get(config('laraadmin.adminRoute') . '/customerlocal_dt_ajax', 'LA\CustomerLocalsController@dtajax');
	Route::get(config('laraadmin.adminRoute') . '/customerlocal_fm_add', 'LA\CustomerLocalsController@FormAdd');

	/* ================== Customers ================== */
	Route::resource(config('laraadmin.adminRoute') . '/customers', 'LA\CustomersController');
	Route::get(config('laraadmin.adminRoute') . '/customer_dt_ajax/{id}', 'LA\CustomersController@dtajax');
	Route::get(config('laraadmin.adminRoute') . '/customer_fm_add/{id}', 'LA\CustomersController@FormAdd');
	Route::post(config('laraadmin.adminRoute') . '/customer_import_ajax', 'LA\CustomersController@importajax');

	/* ================== PaymentUnits ================== */
	Route::resource(config('laraadmin.adminRoute') . '/paymentunits', 'LA\PaymentUnitsController');
	Route::get(config('laraadmin.adminRoute') . '/paymentunit_dt_ajax', 'LA\PaymentUnitsController@dtajax');
	Route::get(config('laraadmin.adminRoute') . '/paymentunit_fm_add', 'LA\PaymentUnitsController@FormAdd');

	/* ================== PaymentCurrencys ================== */
	Route::resource(config('laraadmin.adminRoute') . '/paymentcurrencys', 'LA\PaymentCurrencysController');
	Route::get(config('laraadmin.adminRoute') . '/paymentcurrency_dt_ajax', 'LA\PaymentCurrencysController@dtajax');
	Route::get(config('laraadmin.adminRoute') . '/paymentcurrency_fm_add', 'LA\PaymentCurrencysController@FormAdd');

	/* ================== Staffs ================== */
	Route::resource(config('laraadmin.adminRoute') . '/staffs', 'LA\StaffsController');
	Route::get(config('laraadmin.adminRoute') . '/staff_dt_ajax/{id}', 'LA\StaffsController@dtajax');
	Route::get(config('laraadmin.adminRoute') . '/staff_fm_add/{id}', 'LA\StaffsController@FormAdd');
	Route::post(config('laraadmin.adminRoute') . '/staff_import_ajax', 'LA\StaffsController@importajax');

	/* ================== TruckAssigns ================== */
	Route::resource(config('laraadmin.adminRoute') . '/truckassigns', 'LA\TruckAssignsController');
	Route::get(config('laraadmin.adminRoute') . '/truckassign_dt_ajax', 'LA\TruckAssignsController@dtajax');
	
	Route::get(config('laraadmin.adminRoute') . '/truckassign_dt_shifts/{id}', 'LA\TruckAssignsController@dtshifts');
	Route::get(config('laraadmin.adminRoute') . '/truckassign_addAjax', 'LA\TruckAssignsController@addAjax');
	Route::post(config('laraadmin.adminRoute') . '/truckassign_storeAjax', 'LA\TruckAssignsController@storeAjax');
	Route::post(config('laraadmin.adminRoute') . '/truckassign_updateAjax', 'LA\TruckAssignsController@updateAjax');

	/* ================== TemporaryPrices ================== */
	Route::resource(config('laraadmin.adminRoute') . '/temporaryprices', 'LA\TemporaryPricesController');
	Route::get(config('laraadmin.adminRoute') . '/temporaryprice_dt_ajax', 'LA\TemporaryPricesController@dtajax');
	Route::get(config('laraadmin.adminRoute') . '/temporaryprice_fm_add', 'LA\TemporaryPricesController@FormAdd');
	Route::post(config('laraadmin.adminRoute') . '/temporaryprice_add_ajax', 'LA\TemporaryPricesController@addajax');
});