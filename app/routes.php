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


Route::group(array('before' => 'csrf'), function(){
    
    Route::post('/post/{id}/upvote',['as'=>'post-upvote','uses'=>'VoteController@postUpvotePost']);
    Route::post('/post/{id}/downvote',['as'=>'post-down','uses'=>'VoteController@postDownvotePost']);
    
    Route::post('/comment/submit/{postId}',['as'=>'comment-submit','uses'=>'CommentController@postSubmit']);
    Route::post('/comment/{id}/upvote',['as'=>'comment-upvote','uses'=>'VoteController@postUpvoteComment']);
    Route::post('/comment/{id}/downvote',['as'=>'comment-down','uses'=>'VoteController@postDownvoteComment']);
    Route::post('/comment/edit/{commentId}',['as'=>'comment-edit','uses'=>'CommentController@postEdit']);
    
});


Route::group(array('before' => 'auth'), function(){
    
    Route::group(array('before' => 'csrf'), function(){
        
        Route::post('post/submit',['as'=>'post-submit','uses'=>'PostController@postSubmit']);
        
    });
    
    Route::get('post/submit',['as'=>'post-submit','uses'=>'PostController@getSubmit']);
    
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

Route::get('/community/{communitySlug}',['as'=>'community-view','uses'=>'CommunitiyController@getView']);

Route::get('/user/{username}',array(
    'as'=>'user-index','uses'=>'UserController@getIndex'
    ));

Route::get('/post/view/{postId}-{postSlug}',['as'=>'post-view','uses'=>'PostController@getView']);


Route::get('/post/browse/top',array(
    'as'=>'post-browse-top','uses'=> 'PostController@getTop'
    ));

Route::get('/post/browse/popular',array(
    'as'=>'post-browse-popular','uses'=> 'PostController@getMostPopular'
    ));

Route::get('/post/browse/new',array(
    'as'=>'post-browse-new','uses'=> 'PostController@getMostRecent'
    ));

Route::get('/',array(
    'as'=>'default','uses'=> 'PostController@getDefault'
    ));


    


