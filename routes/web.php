<?php

/*Welcome*/
Route::get('/', function() { return view ('welcome');});

/*Home*/
Route::resource('/home', 'HomeController');

/*Admin*/
Route::post('/admin/search', 'AdminsController@postSearch')->name('admin.search');
Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'AdminsController@index')->name('admin.index');
//    Route::get('/', 'AdminsController@show')->name('admin.show');
});
Route::resource('/admin', 'AdminsController');
Route::model('admin', \App\User::class);

/*Vacancies*/
Route::post('/vacancies/search', 'VacanciesController@postSearch')->name('vacancies.search');
Route::resource('/vacancies', 'VacanciesController');
Route::get('/vacancies/create', 'VacanciesController@create')->middleware('role:verified-company');
Route::get('/vacancies/{vacancy}/edit', 'VacanciesController@edit')->middleware('role:verified-company')->name('vacancies.edit');


/*Advertisements*/
Route::resource('/advertisements', 'AdvertisementsController');
Route::get('/advertisements/create', 'AdvertisementsController@create')->middleware('role:verified-company');
Route::get('/advertisements/{advertisement}/edit', 'AdvertisementsController@edit')->middleware('role:verified-company')->name('advertisements.edit');

/*Tickets*/
Route::post('/tickets/search', 'TicketsController@postSearch')->name('tickets.search');
Route::resource('/tickets', 'TicketsController');
Route::get('/tickets/create', 'TicketsController@create')->middleware('role:verified-company');
Route::get('/tickets/{ticket}/edit', 'TicketsController@edit')->middleware('role:verified-company')->name('tickets.edit');

/*Second-Hand Tickets*/
Route::post('/secondhandtickets/search', 'SecondHandTicketsController@postSearch')->name('secondhandtickets.search');
Route::resource('/secondhandtickets', 'SecondHandTicketsController');
Route::get('/secondhandtickets/create', 'SecondHandTicketsController@create')->middleware('role:verified-company');
Route::get('/secondhandtickets/{secondhandticket}/edit', 'SecondHandTicketsController@edit')->middleware('role:verified-company')->name('secondhandtickets.edit');

/*Events*/
Route::post('/event/search', 'EventController@postSearch')->name('event.search');
Route::resource('/event', 'EventController');
Route::get('/event/create', 'EventController@create')->middleware('role:verified-company');
Route::get('/event/{event}/edit', 'EventController@edit')->middleware('role:verified-company')->name('event.edit');

/*Auth*/
Auth::routes();

/*merchandises*/
Route::group(['prefix' => 'merchandises'], function() {
    Route::get('/', 'MerchandiseController@index');
    Route::match(['get', 'post'], 'create', 'MerchandiseController@create');
    Route::match(['get', 'put'], 'update/{id}', 'MerchandiseController@update');
    Route::get('show/{id}', 'MerchandiseController@show');
    Route::delete('delete/{id}', 'MerchandiseController@destroy');
});
Route::resource('/merchandises', 'MerchandiseController');
Route::get('/merchandises/create', 'MerchandiseController@create')->middleware('role:verified-company');

/*companies*/
Route::group(['prefix' => 'companies'], function() {
    Route::get('/', 'CompanyController@index');
    Route::match(['get', 'post'], 'create', 'CompanyController@create');
    Route::match(['get', 'put'], 'update/{id}', 'CompanyController@update');
    Route::get('show/{id}', 'CompanyController@show');
    Route::delete('delete/{id}', 'CompanyController@destroy');
});
Route::resource('/companies', 'CompanyController');
Route::get('/companies/create', 'CompanyController@create')->middleware('role:verified-company');
