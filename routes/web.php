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



// Public Routes
Route::group(['middleware' => 'web'], function () {

    // Activation Routes
    Route::get('/activate', ['as' => 'activate', 'uses' => 'Auth\ActivateController@initial']);

    Route::get('/activate/{token}', ['as' => 'authenticated.activate', 'uses' => 'Auth\ActivateController@activate']);
    Route::get('/activation', ['as' => 'authenticated.activation-resend', 'uses' => 'Auth\ActivateController@resend']);
    Route::get('/exceeded', ['as' => 'exceeded', 'uses' => 'Auth\ActivateController@exceeded']);

    // Socialite Register Routes
    Route::get('/social/redirect/{provider}', ['as' => 'social.redirect', 'uses' => 'Auth\SocialController@getSocialRedirect']);
    Route::get('/social/handle/{provider}', ['as' => 'social.handle', 'uses' => 'Auth\SocialController@getSocialHandle']);

    // Route to for user to reactivate their user deleted account.
    Route::get('/re-activate/{token}', ['as' => 'user.reactivate', 'uses' => 'RestoreUserController@userReActivate']);
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated']], function () {

    // Activation Routes
    Route::get('/activation-required', ['uses' => 'Auth\ActivateController@activationRequired'])->name('activation-required');

    Route::get('/logout', ['uses' => 'Auth\LoginController@logout'])->name('logout');

    // .....
    Route::get('/', 'MarketingController@index')->name('marketing.homepage');
    Route::get('/mailinglist', 'MarketingController@show')->name('marketing.prospect.show');
    Route::post('/mailinglist', 'MarketingController@create')->name('marketing.prospect.create');

    Route::get('/privacy', 'LegalController@showPrivacy')->name('terms');
    Route::get('/terms', 'LegalController@showTerms')->name('privacy');

    Route::get('/home', 'HomeController@index')->name('home');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
