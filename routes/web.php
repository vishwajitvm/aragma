<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\completeProfleCOntroller;
use App\Http\Controllers\userdashboardController ;
use App\Http\Controllers\userProfileController ;
use Illuminate\Support\Facades\Auth ;
use App\Models\User ;
use App\Http\Controllers\partyController ;
use App\Http\Controllers\userPartyController ;
use App\Http\Controllers\userPartyRequestController ;
use App\Http\Controllers\partyRequestController ;
use App\Http\Controllers\userMessageController ;


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

/*
||
||
back rout start here
||
||
*/
Route::group(['middleware' => 'prevent-back-history'],function(){
    // Auth::routes();
    // Route::get('/home', 'HomeController@index');

  /*
||
||
back rout end here
||
||
*/

//redirect route after login
Route::get('redirects' , [AdminController::class , 'loginRedirects'])->middleware('admin') ;

// Route::get('user', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('auth.login');
});

//authentication
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // return view('dashboard');
    return view('admin.index');
})->name('dashboard')->middleware('admin');


Route::get('dashboard' ,
function() {
    return view('admin.index') ;
}
)->name('dashboard')->middleware('admin') ;


//Logout functionality here--
Route::get('/admin/logout' , [AdminController::class , 'Logout'])->name('admin.logout') ;


//  USER MANAGMENT ALL ROUTES WILL BE HERE
//group for users[xyz]<=-=URLS
Route::prefix('users')->group(function() {
    //view Route for Users
    Route::get('/view' , [UserController::class , 'UserView'])->name('user.view') ;   //user view

    //ADD user Group Route
    Route::get('/add' , [UserController::class , 'UserAdd'])->name('users.add') ;   

    Route::post('/store' , [UserController::class , 'UserStore'])->name('users.store') ;  
    
    //view user profile here viewuserprofile
    Route::get('/viewuserprofile/{id}' , [UserController::class , 'UserProfileDetailsData'])->name('users.viewuserprofile') ;   

    //edit users
    Route::get('/edit/{id}' , [UserController::class , 'UserEdit'])->name('users.edit') ;   

    Route::post('/update/{id}' , [UserController::class , 'UserUpdate'])->name('users.update') ;   

    //Delete Users
    Route::get('/delete/{id}' , [UserController::class , 'UserDelete'])->name('users.delete') ;   

    //manage requests here
    Route::get('/managerequest' , [UserController::class , 'UserManageRequsts'])->name('user.managerequest') ; 
    
    //manage inacive users
    Route::get('/inactiveusers' , [UserController::class , 'UserInactiveUsers'])->name('user.inactiveusers') ; 

    

}) ;

//
//GROUP FOR YOUR PROFILE AND CHAANGE PASSWORD 
//
Route::prefix('profile')->group(function() {
    //view Route for Users
    Route::get('/view' , [ProfileController::class , 'ProfileView'])->name('profile.view') ; 

    //EDIT profile
    Route::get('/edit' , [ProfileController::class , 'ProfileEdit'])->name('profile.edit') ;   

    Route::post('/store' , [ProfileController::class , 'ProfileStore'])->name('profile.store') ;   

    //Update Password OR change Password
    Route::get('/password/view' , [ProfileController::class , 'PasswordView'])->name('password.view') ;   

    Route::post('/password/update' , [ProfileController::class , 'PasswordUpdate'])->name('password.update') ;   
}) ;

//
//admin party here
Route::prefix('adminparty')->group(function() {
    //view the page to add the partys and all
    Route::get('/add' , [partyController::class , 'adminPartyAdd'])->name('adminparty.add') ; 

    //storing or posting the party from admin pannel
    Route::post('/store' , [partyController::class , 'adminPartyStore'])->name('adminparty.store') ; 

    //view the party at admin pannel here
    Route::get('/viewparty' , [partyController::class , 'adminPartyViewParty'])->name('adminparty.viewparty') ; 

    //view party in details  
    Route::get('/viewpartydetail/{id}' , [partyController::class , 'adminPartyDetailsView'])->name('adminparty.viewpartydetail') ;   

    //edit the party here
    Route::get('/edit/{id}' , [partyController::class , 'adminPartyEdit'])->name('adminparty.edit') ; 
    
    //editdata [post] 
    Route::post('/update/{id}' , [partyController::class , 'adminPartyUpdate'])->name('adminparty.update') ;   

    //delete the party from here  
    Route::get('/delete/{id}' , [partyController::class , 'adminPartyDelete'])->name('adminparty.delete') ; 

    //approv or deny the party ststus [view] partystatus
    Route::get('/partystatus/{id}' , [partyController::class , 'adminPartyStatusEdit'])->name('adminparty.partystatus') ; 

    //approve or deny the party status [post] approveupdate
    Route::post('/approveupdate/{id}' , [partyController::class , 'adminPartyApproveOrDenyUpdate'])->name('adminparty.approveupdate') ;  
    
    
    ///View passed party here passedparty
    Route::get('/passedparty' , [partyController::class , 'adminPassedPartyView'])->name('adminparty.passedparty') ; 

    //view upcomingpartys here 
    Route::get('/upcomingparty' , [partyController::class , 'adminUpcomingParty'])->name('adminparty.upcomingparty') ; 

}) ;

//
//user party request functionality here
Route::prefix('partyrequest')->group(function() {
    //user request view accoring to party based
    Route::get('/partyview' , [partyRequestController::class , 'partyRequestPartyView'])->name('partyrequest.partyview') ;
    
    //user no of peoples requested for party partyrequestpeoples
    Route::get('/partyrequestview/{id}' , [partyRequestController::class , 'partyRequestView'])->name('partyrequest.partyrequestview') ;

    //arroval status of user party  
    Route::get('/userpartystatus/{id}' , [partyRequestController::class , 'partyRequestUserStatus'])->name('partyrequest.userpartystatus') ;

    //user party status request approval or update
    Route::post('/updateuserstatus/{id}' , [partyRequestController::class , 'partyRequestUserStatusUpdate'])->name('partyrequest.updateuserstatus') ;

    //view user profile here viewuserprofiles
    Route::get('/viewuserprofiles/{id}' , [partyRequestController::class , 'partyRequestUserProfileData'])->name('partyrequest.viewuserprofiles') ;



}) ;





//************************************************************ *//
////////////////USERS DASHBOARD ROUTING//////////////////////////
//********************************************************* *//

//loading user index page after login as user
Route::get('userdashboard', function () {
    return view('users_dashboard.index');
})->name('userdashboard');

Route::view('calendar' , 'users_dashboard.body.calendar')->name('calendar') ;

Route::get('/userdashboard/logout' , [userdashboardController::class , 'logout'])->name('userdashboard.logout') ;

//manage user profile at userdashbord
Route::prefix('userprofile')->group( function() {
    //view the profile of users
    Route::get('/view' , [userProfileController::class , 'userprofileview'])->name('userprofile.view') ;

    //edit user profile
    Route::get('/edit' , [userProfileController::class , 'userprofileEdit'])->name('userprofile.edit') ;

    //updating the profile
    Route::post('/store' , [userProfileController::class , 'userprofileStore'])->name('userprofile.store') ;

    //view the change password page
    Route::get('/userpassword/view' , [userProfileController::class , 'userPasswordView'])->name('userpassword.view') ;

    //updating the password
    Route::post('/userpassword/update' , [userProfileController::class , 'userPasswordUpdate'])->name('userpassword.update') ;
}) ;

//manage users party here
Route::prefix('userparty')->group( function() {
    //getiing the view for upcomming party here   upcomingparty
    Route::get('/upcomingpartyview' , [userPartyController::class , 'userUpcommingPartyView'])->name('userparty.upcomingpartyview') ;

    //missied party here missedparty
    Route::get('/missedparty' , [userPartyController::class , 'userMissedPartyView'])->name('userparty.missedparty') ;

    //getiing the detail view of party at user end partyfulldetails
    Route::get('/partyfulldetails/{id}' , [userPartyController::class , 'userPartyFullDetailsView'])->name('userparty.partyfulldetails') ; 

});

//manage user request for party 
Route::prefix('userpartyrequest')->group( function() {
    //add party request 
    Route::get('/partyrequestadd' , [userPartyRequestController::class , 'userPartyRequestAdd'])->name('userpartyrequest.partyrequestadd') ;

    //storing the party request here
    Route::post('/store' , [userPartyRequestController::class , 'userPartyRequestStore'])->name('userpartyrequest.store') ;

    //view of user party request 
    Route::get('/partyrequestview' , [userPartyRequestController::class , 'userPartyRequestView'])->name('userpartyrequest.partyrequestview') ;

    //view the reqquest party details here  requestpartydetails
    Route::get('/requestpartydetails/{id}' , [userPartyRequestController::class , 'userPartyRequestPartyDetails'])->name('userpartyrequest.requestpartydetails') ;





}) ;

//message zone here
Route::prefix('usermessage')->group( function() {
    //userchat route here
    Route::get('/userchat' , [userMessageController::class , 'userMessageChatView'])->name('usermessage.userchat') ;


});







//************************************************************ *//
///////////////COMPLETE PROFILE[ W E B S I T E ]/////////////////
//********************************************************* *//

Route::get('completeprofile', function () {
    $id = Auth::user()->id ;
    $user = User::find($id) ;
return view('complete_profile.completeprofile' , compact('user'));
})->name('completeprofile');

Route::prefix('completeprofile')->group( function() {
    Route::post('/store' , [completeProfleCOntroller::class , 'userProfileCompleteStore'])->name('completeprofile.store') ;

    //logout
    Route::get('/logout' , [completeProfleCOntroller::class , 'userProfileCompleteLogout'])->name('completeprofile.logout') ;


}) ;






































}); //preventing backlogin here [clearing backhistory here don't delete it and also  make routes under this not out side this closing tags]
