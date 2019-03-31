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
    return view('Pageviews/index');
});
Route::get('/needyreg', function () {
    return view('needy/needyRegistration');
    
});
Route::get('/sprofile','SellerController@Sellerprofile');
    
Route::get('/viewitem', function () {
    return view('seller/viewitemlist');
    
});
Route::any('/getcasedata','FundstoryController@Viewcasedetailes');
Route::get('/fundraiselist','FundstoryController@Showstorylist');
Route::any('/savestory','FundstoryController@Savestorydetails');
Route::any('/getitemdata','SellerController@ViewItemdetailes');
Route::get('/viewitemlist','SellerController@ViewItemlist');
Route::any('/additem','SellerController@AddItem');
Route::any('/sadditem','SellerController@Additempage');
Route::any('/sellerupdateprofile','SellerController@Updateprofile');
Route::any('/sellerregister','SellerController@SellerRegister');
Route::any('/sellerregaction','SellerController@store');

Route::get('/needyregister','NeedyRegistrationController@index');
Route::get('/city/ajax/{id}','NeedyRegistrationController@cityajax');
Route::get('/dist/ajax/{id}','NeedyRegistrationController@distajax');
Route::any('/needyupdateprofile','NeedyprofileController@Updateprofile');
Route::any('/needyprofile','NeedyprofileController@Viewprofile');
Route::any('/showq','FundstoryController@showquestions');
Route::resource('qus','QuestionController');
Route::post('/updatequestion','QuestionController@update');
Route::any('/listquestion','QuestionController@viewquestion');
//Route::get('/viewquestions','QuestionController@show');
Route::any('/question','QuestionController@storea');
Route::resource('ad','AdminController');
Route::get('/addquestion','QuestionController@AddQuestion');

Route::get('/deletecategory/{id}','AdminController@Delete');
Route::get('/updatecategory/{id}','AdminController@Updatecategory');
Route::get('/addcategory','AdminController@index');
Route::any('/addcat','AdminController@storeb');
Route::get('/viewneedy','ShadowindexController@Viewneedy');
Route::get('/adminsidebar','ShadowindexController@Adminsidebar');
Route::get('/admincontent','ShadowindexController@Admincontent');
Route::get('/adminfooter','ShadowindexController@Adminfooter');
Route::get('/viewsponser','ShadowindexController@Viewsponser');
Route::get('/adminindex','ShadowindexController@Adminindex');
Route::get('/needymenu','ShadowindexController@Menuindex');
Route::get('/needyindex','ShadowindexController@Needyindex');
Route::get('/Index','ShadowindexController@Index');
Route::get('/about','ShadowindexController@About');
Route::get('/elements','ShadowindexController@Elements');
//Route::get('/needyregister','ShadowindexController@Needyregister');
Route::get('/loginn','ShadowindexController@Login');
Route::get('/forgotpassword','ShadowindexController@Forgotpassword');
Route::get('/needyhome','ShadowindexController@Needyhome');

//Route::get('/needyprofile','ShadowindexController@Needyprofile');

Route::get('/fundhistory','ShadowindexController@Needyfundhistory');

Route::get('/viewstory','ShadowindexController@Viewstory');

Route::get('/fstory','FundstoryController@categorydropdown');
Route::any('/regaction','NeedyRegistrationController@store');
Route::any('/loginaction','LoginController@Needylogin');
Route::get('/logoutt', 'LoginController@logoutt');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');