<?php
use App\Models\Post;
use App\Http\Controllers\Abc;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostController;
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
    return view('posts', [
      'posts' => Post::latest()->get()
    ]);
});

Route::get('posts/{post:slug}', function(Post $post) {
    return view('post', [
      'post' => $post
    ]);
});

Route::post('createpost', [PostController::class, 'store'])->middleware('auth');

/*Route::post('/submit', function() {
    $post = new Post();
    $post->title = request('title');
    $post->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $post->title)));
    $post->author = request('author');
    $post->body = request('body');

    $target = DB::table('posts')
                ->where('slug', '=', $post->slug)
                ->get();

    if ($post->title == '' or $post->author == '' or $post->body == '') {
        return redirect('/')->with('message', 'Empty fields');
    } else if ($target->count() == 0){
        $post->save();
        return redirect('/')->with('message', 'Success');
    } else {
        $message = "There is already a Post with that title";
        return redirect('/')->with('message', 'Post Title Exists');
    }
}); */

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
