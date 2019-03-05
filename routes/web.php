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

// Route::get('/', function () {
//     return view('home');
// });


Route::view('/', 'home');
Route::view('/{any}', 'home');
Route::view('/{any}/{param}', 'home');

// Route::get('notific', function(){
//     $user = App\User::find(1);
//     $data = [];
//     $count = 0;
//     foreach ($user->unreadNotifications as $notification) {
//         $data[$count]['replyBy'] =  $notification->data['replyBy'];
//         $data[$count]['questioId'] =  $notification->data['questionId'];
//         $data[$count]['path'] =  $notification->data['path'];
//         $count++;
//     }
//     return $data;

//     // $user = App\User::find(1);
//     // return $user->unreadNotifications();
// });
