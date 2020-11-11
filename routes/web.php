<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key', function() {
    return \Illuminate\Support\Str::random(32);
});

// authentication
$router->group(['middleware' => 'auth','prefix' => 'api'], function ($router) 
{
    $router->get('me', 'AuthController@me');
    $router->post('logout', 'AuthController@logout');
    $router->post('refresh', 'AuthController@refresh');

    // materies
    $router->get('materies', 'MateriesController@index');
    $router->get('materies/{materies}', 'MateriesController@select_id');

       // user profiles
   $router->get('users/profiles', 'UsersController@index_profile');
   $router->get('users/profiles/{usr}', 'UsersController@select_profiles');
   $router->post('users/profiles','UsersController@create_save');

      // whislists
      $router->get('whislists', 'WhislistsController@index');
      $router->get('whislists/{whislists}', 'WhislistsController@select_whislists');
      $router->post('whislists/create-new','WhislistsController@create_save');
      $router->get('whislists/mywhislists','WhislistsController@mywhislists');
      $router->get('whislists/whislistsme','WhislistsController@whislistsme');
      $router->delete('whislists/{whislists}','WhislistsController@delete');

});

// un-authentication
$router->group(['prefix' => 'api'], function () use ($router) 
{
   $router->post('register', 'AuthController@register');
   $router->post('login', 'AuthController@login');

    // Categories
   $router->get('categories', 'CategoriesController@index');
   $router->get('categories/{categories}','CategoriesController@select_id');
   // classes
   $router->get('class', 'ClassController@index');
   $router->get('class/detail/{class}', 'ClassController@classdetail');
   $router->get('class/id/{classes}', 'ClassController@select_class');
   $router->get('class/subclass', 'ClassController@index_subclass');
   $router->get('class/subclass/{subclass}', 'ClassController@select_subclass');
   $router->get('class/hilights', 'ClassController@index_hilights');
   $router->get('class/hilights/{hilights}', 'ClassController@select_hilights');

   // Trendings
   $router->get('trendings/populers', 'TrendingsController@index_populers');
   $router->get('trendings/populers/{populers}', 'TrendingsController@select_populers');
   $router->get('trendings/newclass', 'TrendingsController@index_newclass');
   $router->get('trendings/newclass/{newclass}', 'TrendingsController@select_newclass');
   $router->get('trendings/careers', 'TrendingsController@index_careers');
   $router->get('trendings/careers/{careers}', 'TrendingsController@select_careers');
   $router->get('trendings/testimonies', 'TrendingsController@index_testimonies');
   $router->get('trendings/testimonies/{testimonies}', 'TrendingsController@select_testimonies');

   //promotions
   $router->get('promotions/discounts', 'PromotionsController@index_discounts');
   $router->get('promotions/discounts/{discounts}', 'PromotionsController@select_discounts');
   $router->get('promotions/kupons', 'PromotionsController@index_kupons');
   $router->get('promotions/kupons/{kupons}', 'PromotionsController@select_kupons');


});


