<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/admin/home');
});

// Commented out or remove authentication routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
Route::post('login', 'Auth\LoginController@login')->name('auth.login.post');
Route::post('logout', 'Auth\LoginController@logout')->name('auth.logout');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('auth.password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.update');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
Route::post('register', 'Auth\RegisterController@register')->name('auth.register.post');
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password.update');


// Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
// Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password.update');
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('auth.password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.update');
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
// Route::post('register', 'Auth\RegisterController@register')->name('auth.register.post');

// Admin Routes
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('expense_categories', 'Admin\ExpenseCategoriesController');
    Route::post('expense_categories_mass_destroy', ['uses' => 'Admin\ExpenseCategoriesController@massDestroy', 'as' => 'expense_categories.mass_destroy']);
    Route::resource('income_categories', 'Admin\IncomeCategoriesController');
    Route::post('income_categories_mass_destroy', ['uses' => 'Admin\IncomeCategoriesController@massDestroy', 'as' => 'income_categories.mass_destroy']);
    Route::resource('incomes', 'Admin\IncomesController');
    Route::post('incomes_mass_destroy', ['uses' => 'Admin\IncomesController@massDestroy', 'as' => 'incomes.mass_destroy']);
    Route::resource('expenses', 'Admin\ExpensesController');
    Route::post('expenses_mass_destroy', ['uses' => 'Admin\ExpensesController@massDestroy', 'as' => 'expenses.mass_destroy']);
    Route::resource('monthly_reports', 'Admin\MonthlyReportsController');
    Route::resource('currencies', 'Admin\CurrenciesController');
    Route::post('currencies_mass_destroy', ['uses' => 'Admin\CurrenciesController@massDestroy', 'as' => 'currencies.mass_destroy']);
    Route::post('currencies_restore/{id}', ['uses' => 'Admin\CurrenciesController@restore', 'as' => 'currencies.restore']);
    Route::delete('currencies_perma_del/{id}', ['uses' => 'Admin\CurrenciesController@perma_del', 'as' => 'currencies.perma_del']);
});
