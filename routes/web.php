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
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('posts', 'PostController');

Route::resource('sectors','SectorController');
Route::resource('activity','ActivityController');
Route::resource('contractors','ContractorController');

//Route::get('contractors','ContractorsController@index')->name('contractors');

// Route::get('/create_role_permission', function(){

// 	$role = Role::create(['name' => 'Administer']);
// 	$permission = Permission::create(['name' => 'Administer roles & permissions']);

// 	auth()->user()->assignRole('Administer');
// 	auth()->user()->givePermissionTo('Administer roles & permissions');
// });
