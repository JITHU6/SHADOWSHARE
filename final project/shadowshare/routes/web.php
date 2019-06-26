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
    session(['loginurl'=>'']);
    session(['catname'=>'']);
    return view('Pageviews/index');
});
Route::get('/needyreg', function () {
    return view('needy/needyRegistration');
    
});
Route::get('/sprofile','SellerController@Sellerprofile');
    
Route::get('/viewitem', function () {
    return view('seller/viewitemlist');
    
});

Route::get('/menua', function () {
    return view('layouts/menubar');

});
Route::any('test', 'ShadowindexController@Viewcasedetailes');
 Route::any('autocomplete', 'EquipmentController@autocomplete');
Route::any('/equipsearch','EquipmentController@equipsearch');
Route::any('/itemrequest','ShadowindexController@itemrequest');
Route::any('/individual','ShadowindexController@individual');
Route::any('/viewequipments','ShadowindexController@viewequipments');
Route::any('/donateequipment','ShadowindexController@donateequipment');
Route::any('/Donateindividual','ShadowindexController@Donateindividual');
Route::any('/deleteurgent/{id}','FundraiseController@deleteurgent');
Route::any('/qdelete/{id}','QuestionController@qdelete');
Route::any('/donationpayment','FundraiseController@Donationtransaction');
Route::any('/savedonors','FundraiseController@savedonors');

Route::any('/donationform/{id}','FundraiseController@donationform');
Route::any('/fundraiseevent','FundraiseController@fundraise');
Route::any('/updatestatus/{id}','FundraiseController@updatestatus');
Route::any('/updatecase','FundraiseController@updatecase');
Route::any('/viewcase','FundraiseController@view');
Route::any('/save','FundraiseController@save');
Route::resource('fundraise','FundraiseController');
Route::any('/userequipment','AdminController@userequipment');
Route::any('/userfunddonor','AdminController@userfunddonor');
Route::any('/userneedy','AdminController@userneedy');
Route::any('/adminviewneedy','AdminController@viewneedy');
Route::any('/viewefunddonor','AdminController@viewefunddonor');
Route::any('/viewequipdonor','AdminController@viewequipdonor');
Route::any('/sellerhome','sellerController@sellerhome');
Route::any('/contactus','shadowindexController@contactus');
Route::any('/contact','shadowindexController@contact');
Route::any('/whatwedo','shadowindexController@whatwedo');
Route::any('/feedback','shadowindexController@feedback');
Route::any('/email','shadowindexController@email');
Route::any('/history','NeedyprofileController@History');
Route::any('/confirmdelivery','SellerController@confirmdelivery');
Route::any('/historytable','NeedyprofileController@historytable');
Route::any('/spdonations','SponsorController@Donations');
Route::any('/transaction','SponsorController@Transaction');
Route::any('/fundpayment','SponsorController@Payment');
Route::any('/confirmpay','FundstoryController@Confirmpay');
Route::any('/needyapprovedfund','FundstoryController@Approvedfund');
Route::any('/approvedfundcase','SponsorController@Approvedfundcase');
Route::any('/approvefundcase','SponsorController@Approvefundcase');
Route::any('/needydetailsmodal','SponsorController@Viewmodalneedy');
Route::any('/needydetails','SponsorController@Viewneedy');
Route::any('/sponsorupdateprofile','SponsorController@Updateprofile');
Route::any('/sponsorregaction','SponsorController@store');
Route::any('/sponsorprofile','SponsorController@profile');
Route::any('/sponsorregister','SponsorController@Register');
Route::any('/equipmentapproved','EquipmentController@Equipmentapproved');
Route::any('/approvedrequests','sellerController@Approvedrequests');
Route::any('/approveequipcase','sellerController@Approveequipcase');
Route::any('/viewneedydetails','sellerController@Viewmodalneedy');
Route::any('/viewequipneedy','sellerController@Viewequipneedy');
Route::any('/removeequip/{id}','EquipmentController@Removequip');
Route::any('/saveeqstory','EquipmentController@SaveEquipmentstory');
Route::any('/eqstory','EquipmentController@Equipmentstory');
Route::any('/getequipdata','EquipmentController@Getequipdata');
Route::any('/needyequipment','EquipmentController@Needyequipment');
Route::any('/removecase/{id}','FundstoryController@Removecase');
Route::any('/getquestions','FundstoryController@Getquestions');
Route::any('/getcasedata','FundstoryController@Viewcasedetailes');
Route::get('/fundraiselist','FundstoryController@Showstorylist');
Route::any('/savestory','FundstoryController@Savestorydetails');

Route::any('/updateeqdata','SellerController@updateeqdata');
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