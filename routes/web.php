<?php


$router->group(['prefix' => 'api/v1'], function () use ($router) {
    
    //
    $router->group(['prefix' => 'twitter'], function () use ($router) {
       
            $router->get('get_profile/{profile}','TwitterController@getProfile');        
    
    });
    
    
    
});