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


Route::get('/', function () {
     return redirect(route('home'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'cors']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('ministries','MinistryController');
    Route::resource('departments','DepartmentController');
    Route::resource('divisions','DivisionController');
    Route::resource('units','UnitController');
    Route::resource('sourcesoffunding','SourceoffundingController');
    Route::resource('rollingplans','RollingplanController');
    Route::resource('annualworkplans','AnnualworkplanController');
    Route::resource('resultareas','ResultareaController');
    Route::resource('tasks','TaskController');
    Route::resource('taskreportings','TaskreportingController');
    Route::resource('mainactivities','MainactivityController');
    Route::resource('counties','CountyController');
    Route::resource('indicatorcategories','IndicatorcategoryController');
    Route::resource('mesindicators','MesindicatorController');
    Route::resource('mesindicatortrackings','MesindicatortrackingController');
    Route::resource('reports', 'ReportController')->only([
        'index'
    ]);


    Route::post('annualworkplans/import', 'AnnualworkplanController@import')->name('annualworkplans.import');

    Route::post('mainactivities/ajaxstore', 'MainactivityController@ajaxstore')->name('mainactivities.ajaxstore');

    Route::get('annualworkplans/getdivisions/{id}', 'AnnualworkplanController@getDivisions')->name('annualworkplans.getdivisions');

    Route::get('annualworkplans/getunits/{id}', 'AnnualworkplanController@getUnits')->name('annualworkplans.getunits');

    Route::get('annualworkplans/upload/{id}', 'AnnualworkplanController@upload')->name('annualworkplans.upload');

    Route::get('annualworkplans/getactivities/{id}', 'AnnualworkplanController@getActivities')->name('annualworkplans.getactivities');

    Route::get('mainactivities/getoutputs/{id}', 'MainactivityController@getOutputs')->name('mainactivities.getoutputs');

    Route::get('units/getworkplans/{unit_id}/{rollingplan_id}', 'UnitController@getWorkplans')->name('units.getworkplans');

    Route::get('mesindicatortrackings/getindicators/{indicatorcategory_id}', 'MesindicatortrackingController@getIndicators')->name('mesindicatortrackings.getindicators');

    Route::get('taskreportings/getoutputs/{id}', 'TaskreportingController@getOutputs')->name('taskreportings.getoutputs');

	Route::get('taskreportings/logtasks/{id}', 'TaskreportingController@logTasks')->name('taskreportings.logtasks');

    Route::post('reports/overall', 'ReportController@overall')->name('reports.overall');

    Route::get('reports/countyindicator', ['as'=>'reports.countyindicator', 'uses'=>'ReportController@countyindicator']);

    Route::get('reports/getindicators/{indicatorcategory_id}', 'ReportController@getIndicators')->name('reports.getindicators');

    Route::post('reports/countyreport', ['as'=>'reports.countyreport', 'uses'=>'ReportController@countyreport']);

    Route::get('reports/activityindicator', ['as'=>'reports.activityindicator', 'uses'=>'ReportController@activityindicator']);

    Route::post('reports/indicatorreport', ['as'=>'reports.indicatorreport', 'uses'=>'ReportController@indicatorreport']);

    Route::get('reports/activityimplementation', ['as'=>'reports.activityimplementation', 'uses'=>'ReportController@activityimplementation']);

    Route::post('reports/activityreport', ['as'=>'reports.activityreport', 'uses'=>'ReportController@activityreport']);

    Route::post('reports/taskreport', ['as'=>'reports.taskreport', 'uses'=>'ReportController@taskreport']);

    Route::get('profile', 'UserController@profile');
});
