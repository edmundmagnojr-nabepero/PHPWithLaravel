<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

/*
|--------------------------------------------------------------------------
| DATABASE Raw SQL Queries
|--------------------------------------------------------------------------
|*/

Route::get('/insert', function(){
    DB::insert('insert into posts(title, content) values(?, ?)',['Learning Laravel', 'Laravel is the best thing that happened to PHP.']);
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
| Eloquent
|--------------------------------------------------------------------------
|*/

Route::get('/find', function(){
    $posts = Post::all();

    foreach($posts as $post){
        return $post->title;
    }
});

Route::get('/findwhere', function(){
    $posts = Post::where('id', 2)->orderBy('id', 'desc')->take(1)->get();
    return $posts;
});

Route::get('/findmore',function(){
    $posts = Post::findOrFail(4);
    //$postswhere = Post::where('users_count', '<', 50)->firstOrFail();
    return $posts;
});

Route::get('/basicinsert', function(){
    $post = new Post;
    $post->title = "New Eloquent title insert";
    $post->content = "Wow Eloquent is really cool, look as this content.";
    $post->save();
});

Route::get('/basicinsert2', function(){
    $post = Post::find(5);
    $post->is_admin = 0;
    $post->save();
});

Route::get('/create', function(){
    Post::create(['title'=>'The create method', 'content'=>'WOw I am learning a lot with Laravel']);
});

Route::get('/update2', function(){
    Post::where('id', 2)->where('is_admin', 1)->update(['title'=>"New PHP Title", 'content'=>'I love my instructor']);
});

Route::get('/delete2', function(){
    $post = Post::find(2);
    $post->delete();
});

Route::get('/delete3', function(){
    Post::destroy(3);
});

Route::get('/delete4', function(){
    Post::destroy([4, 5, 6]);
});

Route::get('/delete5', function(){
    Post::where('is_admin', 0)->delete();
});

Route::get('/softdelete', function(){
    Post::find(2)->delete();
});

Route::get('/readsoftdelete', function(){
    // $post = Post::find(1);
    // return $post;

    // $post = Post::withTrashed()->where('id', 1)->get();
    // return $post;

    $post = Post::onlyTrashed()->where('id', 1)->get();
    return $post;
});

Route::get('/restore', function(){
    Post::withTrashed()->where('is_admin', 0)->restore();
});

Route::get('/forcedelete', function(){
    Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
});

/*
|--------------------------------------------------------------------------
| Eloquent Relationships
|--------------------------------------------------------------------------
*/

Route::get('/user/{id}/post', function($id){
    return User::find($id)->post->content;
});

Route::get('/post/{id}/user', function($id){
    return Post::find($id)->user->name;
});

Route::get('/userposts', function(){
    $user = User::find(1);
    foreach($user->posts as $post){
        echo $post->title . "<br>";
    }
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
