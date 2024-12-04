<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// will show welcome page with data from DB
Route::get('/', [controller::class, 'Welcomepage']);

// will save msg from contact us to DB
Route::POST('/sendmsg', [controller::class, 'sendmsg']);

// To   show Protfolio Detial   
Route::get('portfolio_details/{id}',[controller::class, 'portfolio_details']);


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {

    // To Show Dashboard page
    Route::get('/dashboard', [controller::class, 'dashboard'])->name('dashboard');

    // To Show events as json
    Route::get('/events', [controller::class, 'events']);

    // To Show save events to DB page
    Route::post('/storevents', [controller::class, 'storevents']);

    // To Show calender 
    Route::get('/calendar', [controller::class, 'calendar']);

    // To Show skills page
    Route::get('/skills', [controller::class, 'skills']);

    // To save skills to DB 
    Route::post('/storeskills', [controller::class, 'storeskills']);

    // To delete Skille from DB
    Route::get('remove_skille/{id}',[controller::class, 'remove_skille']);

    // To show edit Skille bage
    Route::get('edit_skille/{id}',[controller::class, 'edit_skille']);

    //rout for update the Skille info in DB
    Route::post('update_skille', [controller::class, 'update_skille']);

    // To Show About page 
    Route::get('/about', [controller::class, 'showabout']); 
    
    // To Update About in DB 
    Route::post('/update_about', [controller::class, 'update_about']); 

    // To Show Resume page in dash 
    Route::get('/Resume', [controller::class, 'show_Resume']); 

    // To Store resume element to DB 
    Route::post('/Storresume', [controller::class, 'Storresume']);

    // To delete resume from DB
    Route::get('remove_resume/{id}',[controller::class, 'remove_resume']);

    // To  edit show resume element to edit it 
    Route::get('edit_resume/{id}',[controller::class, 'edit_resume']);

    // To Update resume element in DB 
    Route::post('/update_resume', [controller::class, 'update_resume']);
    
    // To Show Portfolio in dash 
    Route::get('/Portfolio', [controller::class, 'Portfolio']);

    // To Store Projects for Portfolio on DB 
    Route::post('/storeprotfolio', [controller::class, 'storeprotfolio']);

    
    // To delete Project from Portfolio table in DB
    Route::get('remove_portfolio/{id}',[controller::class, 'remove_portfolio']);

    // To show Edit Protfolio Page   
    Route::get('edit_Portfolio/{id}',[controller::class, 'edit_Portfolio']);

    // To Store Projects for Portfolio on DB 
    Route::post('/update_protfolio', [controller::class, 'update_protfolio']);

    // To Show Servec Page in dashboard
    Route::get('/Services', [controller::class, 'Services']);    

    // To Store services to DB 
    Route::post('/storeservices', [controller::class, 'storeservices']);

    // To delete service from remove_services table in DB
    Route::get('remove_services/{id}',[controller::class, 'remove_services'])->name('remove_services');
    
    // To show Edit Services Page   
    Route::get('edit_service/{id}',[controller::class, 'edit_service']);

    // To Update service on DB 
    Route::post('/update_service', [controller::class, 'update_service']);

    // To Show Messages Page in dashboard
    Route::get('/Messages', [controller::class, 'showMessages']); 

    // To delete Messagre from Messages table in DB
    Route::get('remove_msg/{id}',[controller::class, 'remove_msg']);

    // To Show Social media Page in dash
    Route::get('/showsocial',[controller::class, 'showsocial']);
    
    //rout for tmpUpload photo to public file and save it temp to db (filetemp)
    Route::post('/tmpUpload', [controller::class, 'tmpUpload']);

    //rout for tmpDelete the file
    Route::delete('/tmpDelete', [controller::class, 'tmpDelete']);
    
    //  TO store Link of SocialMedia on DB
    Route::post('/storesocial', [controller::class, 'storesocial']);

    // To delete Link of SocialMedia from social table in DB
    Route::get('remove_social/{id}',[controller::class, 'remove_social']);

    // To delete Event of  from Event table in DB
    Route::get('remove_event/{id}',[controller::class, 'remove_event'])->name('remove_event');

    //rout for logout
    Route::get('logout', [controller::class, 'logout']);

        // To Show profile page
        Route::get('/profile', function () {
            return view('profile/show');
        })->name('profile');

        // To Show Item page
        Route::get('/item', function () {
            return view('dashboard/item');
        })->name('item');

});
