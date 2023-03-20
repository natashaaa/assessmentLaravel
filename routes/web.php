<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [
                    'uses'          => 'HomeController@index',
                    'middleware'    => 'CheckVerified'
                   ] )->name('home');

Route::get('/home',[
                    'uses'          => 'HomeController@index',
                    'middleware'    => 'CheckVerified'
                   ]  )->name('home');

// Route::resource('employee', 'UsersController');
// Route::get('getemployeedata','UsersController@getEmployeeData');
Route::group(['middleware' => 'auth'], function (){
Route::group(['prefix'=>'departmentstaff','as'=>'departmentstaff.','middleware'=>'CheckVerified'], function(){
  Route::get('/', 'DepartmentStaffController@index')->name('index');
  Route::get('/list', 'DepartmentStaffController@show')->name('show');
  Route::get('/create', 'DepartmentStaffController@create')->name('create');
  Route::post('/store', 'DepartmentStaffController@store')->name('store');
  Route::get('/edit/{id}', 'DepartmentStaffController@edit')->name('edit');
  Route::put('/update/{id}', 'DepartmentStaffController@update')->name('update') ;
  // Route::post('/delete', 'DesignationController@destroy')->name('disabled') ;
});
Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');
Route::resource('register', 'Auth\RegisterController');

Route::post('/login', [
    'uses'          => 'Auth\LoginController@login',
    'middleware'    => 'CheckVerified',
]);

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('tuntutan_cleansing/{file_name}', function($file_name = null)
{
   $path = storage_path().'/app/public/tuntutan_cleansing/'.$file_name;

   if(file_exists($path)){

      return response()->download($path);
   }
//     if(storage_path().'/app/storage/public/tuntutan_cleansing/'. $file_name) {
//    return /Response::download($path);

//     }
});

//Dashboard CONTROLLER

Route::get('dashboard','DashboardController@index');

// Staff CONTROLLER

Route::get('staffupload','EmployeeManagement\ImportExcelController@index');
Route::get('getstaffdata','EmployeeManagement\ImportExcelController@getData');
Route::post('/import_excel/import', 'EmployeeManagement\ImportExcelController@import_manual');


//configuration view
Route::get('employeemanagement/configuration', 'EmployeeManagement\ConfigurationController@index');

// Route::post('/login', [
//     'uses'          => 'Auth\LoginController@login',
//     'middleware'    => 'CheckVerified',
// ]);

//User Profile
Route::resource('profile', 'ProfileController',[
    'middleware'    => 'CheckVerified',
] );


//Configuration - organization chart
Route::group(['prefix'=>'orgchart','as'=>'orgchart.'], function(){
  Route::get('/', 'OrgChartController@index')->name('index');
  Route::post('/populate', 'OrgChartController@getByDepartment')->name('populate');
  Route::get('/department', 'OrgChartController@department')->name('department');
  // Route::get('/selfchart', 'OrgChartController@selfchart')->name('selfchart');
});//end orgchart

//audit trail
Route::group(['prefix'=>'audit','as'=>'audit.'], function(){
  Route::get('/', 'AuditTrailController@index')->name('index');
  Route::post('/list', 'AuditTrailController@getList')->name('show');
  Route::get('/systemlog', 'AuditTrailController@indexSystemLog')->name('indexSystemLog');
  Route::post('/listSystemLog', 'AuditTrailController@getListSystemLog')->name('showSystemLog');
  Route::get('/querylog', 'AuditTrailController@indexQueryLog')->name('querylog');
  Route::post('/listquerylog', 'AuditTrailController@getListQueryLog')->name('showQueryLog');
  Route::get('/stafflist', 'AuditTrailController@staffList')->name('stafflist');
  
}); //end group audit 
}); //end group auth