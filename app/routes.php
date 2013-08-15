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

Route::get('/', function() {
            return View::make('hello');
        });

//Test model User
Route::get('test-user', function () {
            //return 'Test user';
//            $user = new User;
//
//            $user->email = "test@test.com";
//            $user->real_name = 'Test Account';
//            $user->password = 'test';
//
//            $user->save();
//
//            return 'The user has been saved to databasse';
//            
            //Test Has one
//            $user = User::find(1);
//
//            if (is_null($user)) {
//                echo 'User not found';
//                return;
//            }
//
//            if ($user->passport()) {
//                echo 'The user passport is ' . $user->passport->number;
//            } else {
//                echo 'The user has no passport';
//            }
        });

Route::get('test-passport', function () {
            //return 'Test passport';
            $passport = new Passport;

            $passport->user_id = "1";
            $passport->number = "12345";

            $passport->save();
            return 'Passport has been saved to database';
        });

//Crud User Menggunakan Route Group dimana kita bisa nentuin post,get dll        
Route::group(array('prefix' => 'users'), function () {
            Route::get('/', array('as' => 'users', 'uses' => 'UserController@getIndex'));

            Route::get('create', array('as' => 'users/create', 'uses' => 'UserController@getCreate'));
            Route::post('create', 'UserController@postCreate');

            Route::get('delete/{userId}', array('as' => 'users/delete', 'uses' => 'UserController@getDelete'));

            Route::get('update/{userId}', array('as' => 'users/update', 'uses' => 'UserController@getUpdate'));
            Route::post('update/{userId}', 'UserController@postUpdate');
        });

//Crud Passport         
Route::group(array('prefix' => 'passports'), function () {
            Route::get('/', array('as' => 'passports', 'uses' => 'PassportController@getIndex'));

            Route::get('create', array('as' => 'passports/create', 'uses' => 'PassportController@getCreate'));
            Route::post('create', 'PassportController@postCreate');

            Route::get('delete/{passId}', array('as' => 'passports/delete', 'uses' => 'PassportController@getDelete'));

            Route::get('update/{passId}', array('as' => 'passports/update', 'uses' => 'PassportController@getUpdate'));
            Route::post('update/{passId}', 'PassportController@postUpdate');
        });


Route::resource('tweets', 'TweetsController');