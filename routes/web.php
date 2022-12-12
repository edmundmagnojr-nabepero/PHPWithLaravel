<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Country;
use App\Models\Photo;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

/*
|--------------------------------------------------------------------------
| DATABASE Raw SQL Queries
|--------------------------------------------------------------------------
|*/

// Route::get('/insert', function(){
//     DB::insert('insert into posts(title, content) values(?, ?)',['Learning Laravel', 'Laravel is the best thing that happened to PHP.']);
// });

// Route::get('/read', function(){
//     $results = DB::select('select * from posts where id = ?', [1]);
//     foreach($results as $post){
//         return $post->title;
//     }
// });

// Route::get('/update', function(){
//     $updated = DB::update('update posts set title = "Updated Title" where id = ?', [1]);

//     return $updated;
// });

// Route::get('/delete', function(){
//     $deleted = DB::delete('delete from posts where id = ?', [1]);

//     return $deleted;
// });

// /*
// |--------------------------------------------------------------------------
// | Eloquent
// |--------------------------------------------------------------------------
// |*/

// Route::get('/find', function(){
//     $posts = Post::all();

//     foreach($posts as $post){
//         return $post->title;
//     }
// });

// Route::get('/findwhere', function(){
//     $posts = Post::where('id', 2)->orderBy('id', 'desc')->take(1)->get();
//     return $posts;
// });

// Route::get('/findmore',function(){
//     $posts = Post::findOrFail(4);
//     //$postswhere = Post::where('users_count', '<', 50)->firstOrFail();
//     return $posts;
// });

// Route::get('/basicinsert', function(){
//     $post = new Post;
//     $post->title = "New Eloquent title insert";
//     $post->content = "Wow Eloquent is really cool, look as this content.";
//     $post->save();
// });

// Route::get('/basicinsert2', function(){
//     $post = Post::find(5);
//     $post->is_admin = 0;
//     $post->save();
// });

// Route::get('/create', function(){
//     Post::create(['title'=>'The create method', 'content'=>'WOw I am learning a lot with Laravel']);
// });

// Route::get('/update2', function(){
//     Post::where('id', 2)->where('is_admin', 1)->update(['title'=>"New PHP Title", 'content'=>'I love my instructor']);
// });

// Route::get('/delete2', function(){
//     $post = Post::find(2);
//     $post->delete();
// });

// Route::get('/delete3', function(){
//     Post::destroy(3);
// });

// Route::get('/delete4', function(){
//     Post::destroy([4, 5, 6]);
// });

// Route::get('/delete5', function(){
//     Post::where('is_admin', 0)->delete();
// });

// Route::get('/softdelete', function(){
//     Post::find(2)->delete();
// });

// Route::get('/readsoftdelete', function(){
//     // $post = Post::find(1);
//     // return $post;

//     // $post = Post::withTrashed()->where('id', 1)->get();
//     // return $post;

//     $post = Post::onlyTrashed()->where('id', 1)->get();
//     return $post;
// });

// Route::get('/restore', function(){
//     Post::withTrashed()->where('is_admin', 0)->restore();
// });

// Route::get('/forcedelete', function(){
//     Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
// });

// /*
// |--------------------------------------------------------------------------
// | Eloquent Relationships
// |--------------------------------------------------------------------------
// */

// Route::get('/user/{id}/post', function($id){
//     return User::find($id)->post->content;
// });

// Route::get('/post/{id}/user', function($id){
//     return Post::find($id)->user->name;
// });

// Route::get('/userposts', function(){
//     $user = User::find(1);
//     foreach($user->posts as $post){
//         echo $post->title . "<br>";
//     }
// });

// Route::get('/user/{id}/role', function($id){
//     $user = User::find($id)->roles()->orderBy('id', 'desc')->get();

//     return $user;
//     foreach($user->roles as $role){
//         return $role->name;
//     }
// });

// Route::get('user/pivot', function(){
//     $user = User::find(1);

//     foreach($user->roles as $role){
//         return $role->pivot->created_at;
//     }
// });

// Route::get('user/country', function(){
//     $country = Country::find(4);
//     foreach($country->posts as $post){
//         return $post->title;
//     }
// });

// /*
// |--------------------------------------------------------------------------
// | Polymorphic Relations
// |--------------------------------------------------------------------------
// */

// Route::get('user/photos', function(){
//     $user = User::find(1);
//     foreach($user->photos as $photo){
//         return $photo->path;
//     }
// });

// Route::get('post/{id}/photos', function($id){
//     $post = Post::find($id);
//     foreach($post->photos as $photo){
//         echo $photo->path. "</br>";
//     }
// });

// Route::get('photo/{id}/post', function($id){
//     $photo = Photo::findOrFail($id);
//     return $photo->imageable;
// });

// Route::get('post/tag', function(){
//     $post = Post::find(1);
//     //return $post->tags;
//     foreach($post->tags as $tag){
//         echo $tag->name;
//     }
// });

// Route::get('tag/post', function(){
//     $tag = Tag::find(2);
//     foreach($tag->posts as $post){
//         echo $post->title;
//     }
// });


// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | contains the "web" middleware group. Now create something great!
// |
// */

// Route::get('/', function () {
//     return view('welcome');
// });

// // Route::get('/about', function () {
// //     return "Hi about page";
// // });

// // Route::get('/contact', function () {
// //     return "Hi contact page";
// // });

// // Route::get('/post/{id}/{name}', function($id, $name){
// //     return "This is post number ". $id. " ". $name;
// // });

// // Route::get('admin/posts/example', array('as'=>'admin.home', function(){
// //     $url = route('admin.home');

// //     return "this url is ". $url;
// // }));


// // Route::get('/post', [PostsController::class, 'index']);

// // Route::get('/post/{id}', [PostsController::class, 'index']);

// // //Route::resource('posts', PostsController::class);

// // Route::get('/contact', [PostsController::class, 'contact']);

// // Route::get('/post1', [PostsController::class, 'post1']);

// // Route::get('posts/{id}', [PostsController::class, 'show_post']);

// // Route::get('posts/{id}/{name}/{password}', [PostsController::class, 'show_post']);

/*
|--------------------------------------------------------------------------
| CRUD Application
|--------------------------------------------------------------------------
|*/

Route::resource('/posts', PostsController::class);