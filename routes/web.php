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

Route::get('/login', function () {
    return view('auth/login');
});

Route::group(['middleware'=>['auth','admin']],function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('login','Auth\LoginController@showLoginForm')->name('login');
    Route::post('login','Auth\LoginController@login');
    Route::post('logout','Auth\LoginController@logout')->name('logout');

    /*Student*/

    Route::get('/student/show/{id}',['as'=>'student.show','uses'=>'StudentController@show']);
    Route::get('/student/create',['as'=>'student.create','uses'=>'StudentController@create']);
    Route::post('/student/store',['as'=>'student.store','uses'=>'StudentController@store']);
    Route::get('/student/index',['as'=>'student.index','uses'=>'StudentController@index']);

    /*Subjects*/
    Route::get('/subject/create',['as'=>'subject.create','uses'=>'SubjectController@create']);
    Route::get('/subject/index',['as'=>'subject.index','uses'=>'SubjectController@index']);
    Route::get('/subject/show/{id}',['as'=>'subject.show','uses'=>'SubjectController@show']);
    Route::post('/subject/store',['as'=>'subject.store','uses'=>'SubjectController@store']);

    /*Teacher*/
    Route::get('/teacher/create',['as'=>'teacher.create','uses'=>'TeacherController@create']);
    Route::post('/teacher/fetchsubject','TeacherController@fetchsubject');
    Route::get('/teacher/index',['as'=>'teacher.index','uses'=>'TeacherController@index']);
    Route::get('/teacher/show/{id}',['as'=>'teacher.show','uses'=>'TeacherController@show']);
    Route::post('/teacher/store',['as'=>'teacher.store','uses'=>'TeacherController@store']);
//Route::post('/edit/teacher/{id}','TeacherController@edit');
    Route::post('teacher/update/{id}','TeacherController@update');


    Route::resource('teachers','TeacherController');
    Route::resource('students','StudentController');
    Route::resource('subjects','SubjectController');
});

Route::get('/teacherdashboard','TeacherDashboardController@index')->name('teacherdashboard');
Route::get('view/grade/{id}/{gid}','TeacherDashboardController@showgradestudents');
Route::post('/submit/marks','TeacherDashboardController@savemarks');

Auth::routes();

?>