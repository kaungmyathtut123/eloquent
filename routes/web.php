<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Post;
use App\City;
use App\Teacher;
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
    return view('welcome');
});

//One to one >

Route::get('/post/{id}/show',function($id){

        $post=Post::find($id);
        echo $post->content."<br>";
        echo $post->user->name."<hr>";
});

Route::get('/posts/show',function(){
    $posts=Post::all();
    foreach($posts as $post){
        echo 'title=> '.$post->title."<br>";
        echo 'username=> '.$post->user->name."<br>";
        echo  'content=> '.$post->content."<hr>";
    }
});

Route::get('/post/insert',function(){
Post::create(['user_id'=>1,'title'=>'eighth Post','content'=>'This is the eighth post of our webiste.']);
});

//One to one />

//has many >

Route::get('/user/{id}/posts',function($id){
        $user=User::where('id',$id)->FirstOrFail();
        echo $user->name."<br>";
        foreach($user->posts as $post){
            echo $post->title."<br>";
        }
        echo "<hr>";
});

//has many />

//<has one >

Route::get('/user/{id}/city',function($id){
  // $user=User::where('id',$id)->FirstOrFail();
  $user=User::find($id);
  echo $user->name."<br>";
  echo $user->city->name."<hr>";
});

//</has one>

//<many to many>

Route::get('/user/{id}/role',function($id){
       $user=User::find($id);
       echo $user->name."<br>";
       foreach ($user->roles as $role ) {
         echo $role->rank."<br>";
       }
       echo "<hr>";
});

//</many to many>

//<has many through>

Route::get('/city/{id}/post',function($id){
  $city=City::find($id);
  foreach ($city->posts as $post) {
    echo $post->title."<br>";
  }
});

//</has many through>

Route::get('/user/insert',function(){
$user=new User();
$user->name='Hlane';
$user->city_id=4;
$user->email='hlane@gmail.com';
$user->password=Hash::make('12345678');
$user->save();
});


Route::get('join','UserController@users_datas');
Route::get('teacher_left','TeacherController@left');
Route::get('teacher_right','TeacherController@right');
Route::get('teacher_complecate','TeacherController@complecate');