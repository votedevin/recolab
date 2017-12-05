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
| Middleware options can be located in `app/Http/Kernel.php`
|
 */

// Homepage Route
//Route::get('/', 'WelcomeController@welcome')->name('welcome');
Route::get('/', 'IndexController@index');

Route::get('/admin', function () {
    return redirect('/login');
});
//entity link
Route::get('entity_{id}', 'IndexController@entity_link');

Route::get('facet_{id}', 'IndexController@facet_link');

Route::get('resource_{id}', 'IndexController@resource_link');

Route::get('type_{id}', 'IndexController@type');

Route::match(['get', 'post'], '/search_find', [
    'uses'          => 'IndexController@search'
]);
// Authentication Routes
Auth::routes();

// Public Resource Route
Route::get('material.min.css.template', 'ThemesManagementController@template');

// Public Routes
Route::group(['middleware' => 'web'], function ()
{
	// Activation Routes
	Route::get('/activate', ['as' => 'activate', 'uses' => 'Auth\ActivateController@initial']);

	Route::get('/activate/{token}', ['as' => 'authenticated.activate', 'uses' => 'Auth\ActivateController@activate']);
	Route::get('/activation', ['as'       => 'authenticated.activation-resend', 'uses'       => 'Auth\ActivateController@resend']);
	Route::get('/exceeded', ['as'         => 'exceeded', 'uses'         => 'Auth\ActivateController@exceeded']);

	// Socialite Register Routes
	Route::get('/social/redirect/{provider}', ['as' => 'social.redirect', 'uses' => 'Auth\SocialController@getSocialRedirect']);
	Route::get('/social/handle/{provider}', ['as'   => 'social.handle', 'uses'   => 'Auth\SocialController@getSocialHandle']);

	// Route to for user to reactivate their user deleted account.
	Route::get('/re-activate/{token}', ['as' => 'user.reactivate', 'uses' => 'RestoreUserController@userReActivate']);
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated']], function ()
{
	// Homepage Route
	Route::get('/home', ['as' => 'public.home', 'uses' => 'UserController@index']);

	// Activation Routes
	Route::get('/activation-required', ['uses' => 'Auth\ActivateController@activationRequired'])->name('activation-required');
	Route::get('/logout', ['uses'              => 'Auth\LoginController@logout'])->name('logout');

	//  Homepage Route - Redirect based on user role is in controller.
	Route::get('/home', ['as' => 'public.home', 'uses' => 'UserController@index']);

	// Show users profile - viewable by other users.
	Route::get('profile/{username}', [
		'as'   => '{username}',
		'uses' => 'ProfilesController@show'
	]);

	// Route to show user avatar
	Route::get('images/profile/{id}/avatar/{image}', [
		'uses' => 'ProfilesController@userProfileAvatar'
	]);

	// Route for user profile background image
	Route::get('images/profile/{id}/background/{image}', [
		'uses' 		=> 'ProfilesController@userProfileBackgroundImage'
	]);

});

// Registered, activated, and is current user routes.
Route::group(['middleware' => ['auth', 'activated', 'currentUser']], function ()
{
	// User Profile and Account Routes
	Route::resource(
		'profile',
		'ProfilesController', [
			'only' => [
				'account',
				'show',
				'edit',
				'update',
				'create'
			]
		]
	);
	Route::put('profile/{username}/updateUserAccount', [
		'as'   => '{username}',
		'uses' => 'ProfilesController@updateUserAccount'
	]);
	Route::put('profile/{username}/updateUserPassword', [
		'as'   => '{username}',
		'uses' => 'ProfilesController@updateUserPassword'
	]);
	Route::delete('profile/{username}/deleteUserAccount', [
		'as'   => '{username}',
		'uses' => 'ProfilesController@deleteUserAccount'
	]);

	// Route for user profile background image
	Route::get('account', [
		'as'   	=> '{username}',
		'uses' 	=> 'ProfilesController@account'
	]);

	// Update User Profile Ajax Route
	Route::post('profile/{username}/updateAjax', [
		'as'   => '{username}',
		'uses' => 'ProfilesController@update'
	]);

	// Route to upload user avatar.
	Route::post('avatar/upload', ['as' => 'avatar.upload', 'uses' => 'ProfilesController@upload']);

	// Route to uplaod user background image
	Route::post('background/upload', ['as' => 'background.upload', 'uses' => 'ProfilesController@uploadBackground']);

	// User Tasks Routes
	Route::resource('/tasks', 'TasksController');
});

// Registered, activated, and is admin routes.
Route::group(['middleware' => ['auth', 'activated', 'role:admin']], function ()
{
	Route::resource('/users/deleted', 'SoftDeletesController', [
		'only' => [
			'index', 'show', 'update', 'destroy',
		]
	]);
	Route::resource('users', 'UsersManagementController', [
		'names'    => [
			'index'   => 'users',
			'create'  => 'create',
			'destroy' => 'user.destroy'
		],
		'except' => [
			'deleted'
		]
	]);
	Route::resource('themes', 'ThemesManagementController', [
		'names'    => [
			'index'   => 'themes',
			'destroy' => 'themes.destroy'
		]
	]);
	Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
	Route::get('php', 'AdminDetailsController@listPHPInfo');
	Route::get('routes', 'AdminDetailsController@listRoutes');

	//Data sync
	Route::get('/datasync', ['uses' => 'DataSyncController@index']);

	//Home Edit
	Route::get('/home_edit', [
		'as' 			=> '{username}',
		'uses' 			=> 'PostsController@index'
	]);

	// resource routes for posts
	Route::resource('posts', 'PostsController');

	Route::any('upload', 'PostsController@upload');

	//Menu Edit
	Route::get('/menu_edit', [
		'as' 			=> '{username}',
		'uses' 			=> 'MenuController@index'
	]);

	Route::any('menu_create', 'MenuController@create');
	Route::any('menu_update', 'MenuController@store');
	Route::any('menu_delete', 'MenuController@delete');

});