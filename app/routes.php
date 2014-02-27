<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::group(array('before' => 'auth'), function(){
    
    Route::group(array('before' => 'csrf'), function(){
    
        
    });
    
    Route::get('/post/submit',['as'=>'post-submit','uses'=>'PostController@getSubmit']);
    
    Route::get('account/logout',array(
       'as'=>'account-logout',
        'uses'=> 'AccountController@getLogout'
    ));
});

Route::group(array('before' => 'guest'), function(){
    
    Route::group(array('before' => 'csrf'), function(){
        
        Route::post('/account/create',array(
        'as' =>'account-create-post',
        'uses' => 'AccountController@postCreate'
        ));
        
        Route::post('/account/login',array(
            'as'=>'account-login',
            'uses' => 'AccountController@postLogin'
        ));
        
//        Route::post('/account/forgot-password',array(
//        'as' => 'account-forgot-password',
//        'uses' => 'AccountController@postForgotPassword'
//        ));
//        

    });
    
    
    
//    Route::get('/account/forgot-password',array(
//        'as' => 'account-forgot-password',
//        'uses' => 'AccountController@getForgotPassword'
//    ));
    
//    Route::get('/account/recover-password/{code}',array(
//        'as'=> 'account-recover-password',
//        'uses' => 'AccountController@getRecoverPassword'
//    ));
    
    Route::get('/account/login',array(
        'as'=>'account-login',
        'uses' => 'AccountController@getLogin'
        ));
    
//    Route::get('/account/create',array(
//        'as' =>'account-create',
//        'uses' => 'AccountController@getCreate'
//    ));
    
//    Route::get('/account/activate/{code}',array(
//        'as' => 'account-activate',
//        'uses' => 'AccountController@getActivate'
//    ));

});

Route::get('/user/{username}',array(
    'as'=>'user-index','uses'=>'UserController@getIndex'
    ));

Route::get('/',array(
    'as'=>'default','uses'=> 'PostController@getDefault'
    ));
    


