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

Route::get('/', function () {

    $categorie=DB::table('emplois')->select('contrat')->distinct()->get();
    $ville=DB::table('emplois')->select('ville')->distinct()->get();

    return view('home',compact($ville,$categorie));

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/rechercher','EmploiController@rechercher')->name('rechercher');

Route::resource('emplois','EmploiController');

Route::get('emplois/{emploi}/inscription','EmploiController@inscription');

Route::delete('emplois/deleteemploi/{id}','EmploiController@deleteemploi');


//les routes de Test

Route::get('/gettests','TestController@gettests');

Route::delete('tests/deletetest/{id}','TestController@deletetest');

Route::put('tests/edittest/{id}','TestController@edittest');

Route::get('/getquestions/{id}','TestController@getquestions');

Route::post('tests/{test}/addquestion','TestController@addquestion');

Route::put('tests/{test}/updatequestion','TestController@updatequestion');

Route::delete('tests/deletequestion/{id}','TestController@deletequestion');

Route::resource('tests','TestController');



Route::get('emplois/{emploi}/test','EmploiController@test')->name('test');

Route::get('emplois/{emploi}/tests/{test}/question','TestController@question')->name('question');

Route::post('emplois/{emploi}/tests/store_test','TestController@store_test')->name('store_test');

Route::get('emplois/{emploi}/tests/create_test','TestController@create_test')->name('create_test');

Route::get('emplois/{emploi}/tests/show_test','TestController@show_test')->name('show_test');

Route::post('emplois/{emploi}/cvs/store_cv','CvController@store_cv')->name('store_cv');

Route::get('emplois/{emploi}/cvs/create_cv','CvController@create_cv')->name('create_cv');

Route::get('emplois/{emploi}/cvs/{cv}/experiences','CvController@experiences')->name('experiences');

Route::get('emplois/{emploi}/cvs/{cv}/tests/show_tests','TestController@show_tests')->name('show_tests');

Route::post('emplois/{emploi}/cvs/{cv}/formations/store_formation','FormationController@store_formation')->name('store_formation');

Route::get('emplois/{emploi}/cvs/{cv}/formations/create_formation','FormationController@create_formation')->name('create_formation');

Route::post('emplois/{emploi}/cvs/{cv}/experiences/store_experience','ExperienceController@store_experience')->name('store_experience');

Route::get('emplois/{emploi}/cvs/{cv}/experiences/create_experience','ExperienceController@create_experience')->name('create_experience');

Route::post('emplois/{emploi}/cvs/{cv}/competances/store_competance','CompetanceController@store_competance')->name('store_competance');

Route::get('emplois/{emploi}/cvs/{cv}/competances/create_competance','CompetanceController@create_competance')->name('create_competance');

Route::get('emplois/{emploi}/cvs/{cv}/tests/create_notification_admin','TestController@create_notification_admin')->name('create_notification_admin');

Route::get('emplois/{emploi}/cvs/{cv}/get_cv','CvController@get_cv')->name('get_cv');

Route::get('emplois/{emploi}/cvs/{cv}/get_emploi','CvController@get_emploi')->name('get_emploi');

Route::get('emplois/{emploi}/cvs/{cv}/get_test','CvController@get_test')->name('get_test');

Route::get('emplois/{emploi}/cvs/index','CvController@index')->name('index');



Route::resource('users','UserController');

Route::get('/getemplois/{id}','UserController@getemplois');

Route::post('users','UserController@update_image');

Route::get('users/{user}/profile','UserController@profile')->name('profile');

Route::get('users/cvs/cv_create','CvController@cv_create')->name('cv_create');

Route::get('users/{user}/index_user','UserController@index_user')->name('index_user');

Route::get('/profiles','UserController@profiles')->name('profiles');

Route::get('/accepter','UserController@accepter')->name('accepter');

Route::get('/refuser','UserController@refuser')->name('refuser');

Route::get('/read','UserController@read')->name('read');

Route::get('/delete_notification','UserController@delete_notification')->name('delete_notification');


// Les route du Cv
Route::resource('cvs','CvController');

Route::resource('cvs/{cv}/experiences','ExperienceController');

Route::resource('cvs/{cv}/competances','CompetanceController');

Route::resource('cvs/{cv}/formations','FormationController');

Route::get('cvs/home','CvController@home')->name('cv_home');


Route::get('cvs/modifier','CvController@modifier')->name('cv_modifier');

Route::get('cvs/{cv}/experience','CvController@experience')->name('experience');

Route::get('/getcvs/{id}','UserController@getcvs');

Route::get('/getcv/{id}','CvController@getcv');

Route::post('cvs/{cv}/addcv','CvController@addcv');

Route::put('cvs/{cv}/updatecv','CvController@updatecv');

Route::delete('cvs/deletecv/{id}','CvController@deletecv');

Route::get('/getexperiences/{id}','CvController@getexperiences');

Route::post('cvs/{cv}/addexperience','CvController@addexperience');

Route::put('cvs/{cv}/updateexperience','CvController@updateexperience');

Route::delete('cvs/deleteexperience/{id}','CvController@deleteexperience');

Route::get('/getformations/{id}','CvController@getformations');

Route::post('cvs/{cv}/addformation','CvController@addformation');

Route::put('cvs/{cv}/updateformation','CvController@updateformation');

Route::delete('cvs/deleteformation/{id}','CvController@deleteformation');

Route::get('/getcompetances/{id}','CvController@getcompetances');

Route::post('cvs/{cv}/addcompetance','CvController@addcompetance');

Route::put('cvs/{cv}/updatecompetance','CvController@updatecompetance');

Route::delete('cvs/deletecompetance/{id}','CvController@deletecompetance');
