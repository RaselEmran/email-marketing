<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => ['web']], function () {
    if (!env('INSTALLED', false)) {
        Route::get('/', 'Install\InstallController@index');
        Route::post('install/store', 'Install\InstallController@store');
    } else {
        Route::get('/', 'HomeController@index');
    }
    Route::get('home', 'HomeController@index');

    Route::auth();
// term and condition
    Route::get('termsCondition', 'HomeController@termsCondition');
// privacy policy
    Route::get('privacyPolicy', 'HomeController@privacyPolicy');


// Social github routes...
    Route::get('github', 'Auth\AuthController@redirectToProvider');
    Route::get('github/callback', 'Auth\AuthController@handleProviderCallback');

// Social facebook routes...
    Route::get('facebook', 'Auth\AuthController@redirectToProvider');
    Route::get('facebook/callback', 'Auth\AuthController@handleProviderCallback');

// Social google routes...
    Route::get('google', 'Auth\AuthController@redirectToProvider');
    Route::get('google/callback', 'Auth\AuthController@handleProviderCallback');

// Social twitter routes...
    Route::get('twitter', 'Auth\AuthController@redirectToProvider');
    Route::get('twitter/callback', 'Auth\AuthController@handleProviderCallback');

// Social linkedin routes...
    Route::get('linkedin', 'Auth\AuthController@redirectToProvider');
    Route::get('linkedin/callback', 'Auth\AuthController@handleProviderCallback');



});


// set and prevent all route after login routes...
Route::group(['middleware' => ['web','install', 'auth', 'demo']], function () {

    Route::resource('oauth', 'Oauth\OauthController');
    Route::resource('theme', 'Theme\ThemeController');
    Route::resource('email', 'Email\EmailController');
    Route::resource('api', 'Api\ApiController');
    Route::resource('profile', 'Profile\ProfileController');
    Route::resource('translation', 'Translation\TranslationController');

// translation

    Route::get('lang/{locale}', function ($locale) {
        if (getenv('locale')) {
            $preCont = \Illuminate\Support\Facades\File::get(base_path() . '/.env');

            $newCont = str_replace('locale' . '=' . getenv('locale'), 'locale' . '=' . $locale, $preCont);

            \Illuminate\Support\Facades\File::put(base_path() . '/.env', $newCont);

        } else {
            \Illuminate\Support\Facades\File::append(base_path() . '/.env', "\nlocale=$locale");
        }
        return redirect()->back();
    });

// insert translation
    Route::post('insertLang', 'Translation\TranslationController@insertLang');
// update translation
    Route::get('updateLanguage/{id}', 'Translation\TranslationController@updateLanguage');
    // privacy
    Route::resource('privacy', 'Terms\TermsController');
    Route::any('storeTerms', 'Terms\TermsController@storeTerms');
    Route::get('backupDownload', 'DatabaseBackupController@backupDownload');
});


Route::group(['middleware' => ['web', 'auth']], function(){
    Route::any('save-email', 'EmailList\EmailListController@save_email');
    Route::any('loadMedia', 'Media\MediaController@loadMedia');
    Route::any('update_email_info', 'EmailList\EmailListController@update_email_info');
    Route::any('email-delete/{emailList_id}', 'EmailList\EmailListController@email_delete');

    Route::resource('history', 'EmailHistory\EmailHistoryController');
    Route::resource('email-list', 'EmailList\EmailListController');
    Route::any('real-email/{checker}/{id}', 'EmailList\EmailListController@real_email');
    Route::any('delete-invalid-email/{checker}/{id}', 'EmailList\EmailListController@delete_invalid_email');
    Route::resource('template', 'Template\TemplateController');
    Route::resource('send-mail', 'SendMail\SendMailController');
    Route::resource('media', 'Media\MediaController');
    Route::get('download_sample', 'HomeController@download_sample');
});