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

Route::get('/', "HomeController@index");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*Map Routes*/
Route::get('/map', 'MapController@index')->name('map.index')->middleware('auth');
Route::get('/map/details/{id}', 'MapController@details')->name('map.details')->middleware('auth');
Route::get('/map/edit/{id}', 'MapController@edit')->name('map.edit')->middleware('auth');
Route::get('/map/create', 'MapController@create')->name('map.create')->middleware('auth');
Route::post('/map/store', 'MapController@store')->name('map.store')->middleware('auth');
Route::put('/map/update/{id}', 'MapController@update')->name('map.update')->middleware('auth');
Route::delete('/map/delete/{id}', 'MapController@delete')->name('map.delete')->middleware('auth');

<<<<<<< HEAD


Route::get('/forward/{pwm}', 'WheelController@forward')->name('forward');
Route::get('/reverse/{pwm}', 'WheelController@reverse')->name('reverse');
Route::get('/left/{pwm}', 'WheelController@left')->name('left');
Route::get('/right/{pwm}', 'WheelController@right')->name('right');

Route::get('/panMovement/{freq}', 'CameraController@panMovement')->name('panMovement');
Route::get('/tiltMovement/{tiltFreq}', 'CameraController@tiltMovement')->name('tiltMovement');


Route::get('/stop', 'WheelController@stop')->name('stop');
Route::get('/takePic', 'CameraController@takePicture')->name('takePic');
Route::get('/panRight', 'CameraController@panRight')->name('panRight');
Route::get('/panNeutral', 'CameraController@panNeutral')->name('panNeutral');
Route::get('/panLeft', 'CameraController@panLeft')->name('panLeft');

Route::get('/panStop', 'CameraController@panStop')->name('panStop');

Route::get('/tiltRight', 'CameraController@tiltRight')->name('tiltRight');
Route::get('/tiltNeutral', 'CameraController@tiltNeutral')->name('tiltNeutral');
Route::get('/tiltLeft', 'CameraController@tiltLeft')->name('rigtiltLeftht');

Route::get('/tiltStop', 'CameraController@tiltStop')->name('tiltStop');

Route::get('/panTiltNeutral', 'CameraController@panTiltNeutral')->name('panTiltNeutral');
=======
Route::middleware('auth')->group(function(){
  /*Snapshot Routes */
  Route::get('/snapshots/index', 'SnapshotController@index')->name('snapshots');

  /*Feature Routes*/
  Route::get('/features/rover', 'FeatureController@rover')->name('rover');

  /*Wheel Routes*/
  Route::get('/forward/{pwm}', 'WheelController@forward')->name('forward');
  Route::get('/reverse/{pwm}', 'WheelController@reverse')->name('reverse');
  Route::get('/left/{pwm}', 'WheelController@left')->name('left');
  Route::get('/right/{pwm}', 'WheelController@right')->name('right');
  Route::get('/stop', 'WheelController@stop')->name('stop');

  /*Cam Routes*/
  Route::get('/takePic', 'CameraController@takePicture')->name('takePic');
  Route::get('/panRight', 'CameraController@panRight')->name('panRight');
  Route::get('/panNeutral', 'CameraController@panNeutral')->name('panNeutral');
  Route::get('/panLeft', 'CameraController@panLeft')->name('panLeft');
  Route::get('/panStop', 'CameraController@panStop')->name('panStop');
  Route::get('/tiltRight', 'CameraController@tiltRight')->name('tiltRight');
  Route::get('/tiltNeutral', 'CameraController@tiltNeutral')->name('tiltNeutral');
  Route::get('/tiltLeft', 'CameraController@tiltLeft')->name('rigtiltLeftht');
  Route::get('/tiltStop', 'CameraController@tiltStop')->name('tiltStop');
  Route::get('/panTiltNeutral', 'CameraController@panTiltNeutral')->name('panTiltNeutral');

  /*System Routes*/
  Route::get('/system', 'SystemController@index')->name('system');
});
>>>>>>> 0ddeea2be95078d57f7a3125ae19aef13332d070
