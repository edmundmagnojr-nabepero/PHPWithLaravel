<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

/*
|--------------------------------------------------------------------------
| DATABASE Raw SQL Queries
|--------------------------------------------------------------------------
|*/

Route::get('/insert', function(){
    DB::insert('insert into posts(title, content) values(?, ?)',['PHP with Laravel', 'Laravel is the best thing that happened to PHP.']);
});

Route::get('/read', function(){
    $results = DB::select('select * from posts where id = ?', [1]);
    foreach($results as $post){
        return $post->title;
    }
});

Route::get('/update', function(){
    $updated = DB::update('update posts set title = "Updated Title" where id = ?', [1]);

    return $updated;
});

Route::get('/delete', function(){
    $deleted = DB::delete('delete from posts where id = ?', [1]);

    return $deleted;
});

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
//     return view('welcome');
// });

// Route::get('/about', function () {
//     return "Hi about page";
// });

// Route::get('/contact', function () {
//     return "Hi contact page";
// });

// Route::get('/post/{id}/{name}', function($id, $name){
//     return "This is post number ". $id. " ". $name;
// });

// Route::get('admin/posts/example', array('as'=>'admin.home', function(){
//     $url = route('admin.home');

//     return "this url is ". $url;
// }));


// Route::get('/post', [PostsController::class, 'index']);

// Route::get('/post/{id}', [PostsController::class, 'index']);

// //Route::resource('posts', PostsController::class);

// Route::get('/contact', [PostsController::class, 'contact']);

// Route::get('/post1', [PostsController::class, 'post1']);

// Route::get('posts/{id}', [PostsController::class, 'show_post']);

// Route::get('posts/{id}/{name}/{password}', [PostsController::class, 'show_post']);
