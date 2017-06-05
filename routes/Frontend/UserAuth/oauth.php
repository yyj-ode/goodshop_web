<?php
// route.php
Route::group(['middleware' => 'web','namespace' => 'Frontend\UserAuth'], function () {
    Route::get('oauth/callback/driver/{driver}', 'OAuthAuthorizationController@handleProviderCallback');
    Route::get('oauth/redirect/driver/{driver}', 'OauthAuthorizationController@redirectToProvider');
});
