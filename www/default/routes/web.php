<?php


Route::middleware('auth')->namespace('Web')->group(function() {
    Auth::routes();

    Route::namespace('Content')->prefix('content')->name('content.')->group(function () {
        Route::resource('posts', 'PostsController');
        Route::resource('files', 'FilesController');
    });

    Route::namespace('UserManagement')->prefix('user_management')->name('user_management.')->group(function () {
        Route::resource('users', 'UsersController');
        Route::resource('roles', 'RolesController');
        Route::resource('permissions', 'PermissionsController');
    });

    Route::namespace('Settings')->prefix('settings')->name('settings.')->group(function () {
        Route::resource('main_settings', 'MainSettingsController');
        Route::resource('language', 'LanguageController');
        Route::resource('privacy', 'PrivacyController');
    });

    Route::resource('dashboard', 'HomeController');
    Route::resource('contact', 'ContactController');
    Route::resource('faq', 'FaqController');

});
