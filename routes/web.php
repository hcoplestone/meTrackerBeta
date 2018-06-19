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

Route::get('/', function ()
{
    if ($user = auth()->user())
    {

        if ($user->hasRole('admin'))
        {
            return redirect('/admin-dashboard');
        } else if ($user->hasRole('patient'))
        {
            return redirect('/patient-dashboard');
        } else if ($user->hasRole('pharmacist'))
        {
            return redirect('/pharmacist-dashboard');
        } else
        {
            return redirect('/home');
        }

    } else {

        return redirect('/login');

    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Admin routes
Route::get('/admin-dashboard', 'AdminDashboardController@index')->name('admin');
Route::resource('/admin/pharmacies', 'Admin\PharmaciesAdminController');
Route::resource('/admin/pharmacies.pharmacists', 'Admin\Pharmacies\PharmaciesPharmacistAdminController');

// Pharmacist routes
Route::get('/pharmacist-dashboard', 'PharmacistDashboardController@index')->name('pharmacist-dashboard');
Route::resource('/pharmacies/patients', 'Pharmacies\PatientsController');