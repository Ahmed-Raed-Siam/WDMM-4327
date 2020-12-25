<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        //
        //$posts = Post::all();
        ////$posts = DB::table('posts')->get();
        //$posts = DB::table('posts')->limit(10)->get();
        //$posts = DB::table('posts')->where('category_id',2)->get();
        //$posts = DB::table('posts')->where('category_id','<=',2)->get();
        /*$posts = DB::table('posts')->where([
           ['category_id',2],
           ['user_id','>=',5]
        ])->get();*/

        /*        foreach ( $posts as $post){
                    echo $post->title.'<br>';
                }*/
//        $posts = DB::table('posts')->select('title', 'views')->get();
        /*$posts = DB::table('posts')
                    ->where('user_id', 10)
                    ->where('category_id', 3)
                    ->select('title', 'views')
                    ->get();*/
//        $posts = DB::table('posts')->pluck('id');
//        $posts = DB::table('posts')->pluck('title');
//        $posts = DB::table('posts')->pluck('title','views');
//        $posts = DB::table('posts')->find('10');
//        $posts = DB::table('posts')
//            ->where('category_id', 3)
//            ->select('title', 'views')
//            ->orderBy('views', 'desc')
//            ->get();
//        $views_avg = DB::table('posts')->avg('views');
//        $views_min = DB::table('posts')->min('views');
//        $views_max = DB::table('posts')->max('views');
//        $posts = DB::table('posts')->get();
        /*        $posts = DB::table('posts')->orderBy('shares','asc')->chunk(20,function ($items){
                    foreach ($items as $item){
                        echo $item->shares.'/'. $item->title ."<br>";
                    }
                });*/

//        dd($posts->toArray());
//        dd($views_max);
//        $posts=DB::table('posts')->whereIn('category_id',[8,10])->get();
//        $posts=DB::table('posts')->whereBetween('category_id',[3,5])->get();
//        $posts=DB::table('posts')->whereNull('category_id')->get();
        /*        $posts = DB::table('posts')->join('categories', 'posts.category_id', 'categories.id')
                    ->select('posts.title', 'categories.name', 'posts.views')->get();*/
//        $posts = DB::table('posts')->skip(10)->take(5)->get();
//        $posts = DB::table('posts')->where([['category_id', 2], ['user_id', 2]])->get();
//        $posts = DB::table('posts')->where('category_id', 2)->get();
//        $posts = DB::table('posts')->where('category_id', 2)->first();
//        $posts = DB::table('posts')->find(2);
//        $posts = DB::table('categories')->insert([
//            ['name' => 'Health',
//                'code' => 'HLT',
//                'created_at' => Carbon::now(),
//                'updated_at' => Carbon::now()],
//            ['name' => 'Finance',
//                'code' => 'FN',
//                'created_at' => Carbon::now(),
//                'updated_at' => Carbon::now()]
//        ]);
//        $posts = DB::table('categories')->where('id', 14)->update(['created_at'=>Carbon::now()]);
//        $posts = DB::table('categories')->where('id', 14)->update([
//            'created_at'=>Carbon::now(),
//            'updated_at'=>Carbon::tomorrow()
//        ]);

//        dd($posts);
//        dd($posts->toArray());
//        $posts = DB::table('posts')->where('id', 14)->increment('views',5);
//        $posts = DB::table('posts')->where('id', 14)->decrement('views',5);
//        $posts = DB::table('posts')->where('id', 14)->delete();
//        $posts = DB::table('comments')->delete();
//        $posts = DB::table('posts')->whereIn('category_id',[2,5])->get();
//
//
//        $posts = DB::table('posts')->whereBetween('category_id',[2,5])->get();

//        DB::connection()->enableQueryLog();
//        $posts = DB::table('posts')->where('category_id','<=',2)->get();
//
//        $posts = DB::table('posts')->where([
//            ['category_id', 2],
//            ['user_id', '>=', 5]
//        ])->get();
//
//        $queries = DB::getQueryLog();
//        dd($queries);
//        $posts = Post::all();
//        $posts = DB::table('posts')->get();
        $posts = DB::table('posts')->orderByDesc('created_at')->paginate(10);
//        $posts = DB::table('posts')->simplePaginate(10);
        /*        $tag = Tag::find(4);

                foreach ($tag->posts as $post) {
                    echo "<h1>Posts</h1>";
                    echo "<p>$post->id</p>";
                    echo "<p>$post->title</p>";
                    echo "<p>$post->body</p>";
                }
                foreach ($tag->videos as $video) {
                    echo "<h1>Videos</h1>";
                    echo "<p>$video->id</p>";
                    echo "<p>$video->title</p>";
                    echo "<p>$video->url</p>";
                }*/
//        dd($tag->videos);
//        dd($tag->posts);
        return response()->view('dashboard.posts.index', ['posts' => $posts]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        // Get all categories from category table;
        $categories = Category::all();
        return response()->view('dashboard.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Get all inputs from the form
        $input = $request->all();
        // Validate inputs
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'feature_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'large_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required',
        ]);

        // Create instance from post model
        $post = new Post();
        $post_title = $input['title'];
        $post_body = $input['body'];
        $post_feature_image = $input['feature_image'];
        // Make feature image name
        $feature_image_filename = Str::slug(time() . ' ' . now() . ' ' . substr($post_feature_image->getClientOriginalName(), 0, -3), '-') . '.' . $post_feature_image->extension();// Current time with file name and file extension
        // Store feature image path in feature_image_path variable
        $feature_image_path = $post_feature_image->storeAs('images/posts', $feature_image_filename);// Store in storage/images/posts file
        // Assign  feature image path to database
        $post->feature_image = $feature_image_path;
        $post_large_image = $input['large_image'];
        // Make large image name
        $large_image_filename = Str::slug(time() . ' ' . now() . ' ' . substr($post_large_image->getClientOriginalName(), 0, -3), '-') . '.' . $post_large_image->extension();// Current time with file name and file extension
        // Store large image path in large _image_path variable
        $large_image_path = $post_large_image->storeAs('images/posts', $large_image_filename);// Store in storage/images/posts file
        // Assign  feature image path to database
        $post->large_image = $large_image_path;
        $post_category_id = $input['category'];
        $post_user_id = 10;
        $post->title = $post_title;
        $post->body = $post_body;
//        $post->feature_image = $post_feature_image;
        $post->large_image = $post_large_image;
        $post->user_id = $post_user_id;
        $post->category_id = $post_category_id;
        // Save Image into storage
//        $feature_image_post_thumbnail = $request->file('feature_image');
//        $feature_image_filename = time() . '.' . $feature_image_post_thumbnail->getClientOriginalExtension();// Current time with file extension
//        $feature_image_filename = time() . ' ' . $feature_image_post_thumbnail->getClientOriginalName();// Current time with file name and file extension
//        $feature_image_filename = Str::slug(time() . ' ' . now() . ' ' . substr($feature_image_post_thumbnail->getClientOriginalName(), 0, -3), '-') . '.' . $feature_image_post_thumbnail->getClientOriginalExtension();// Current time with file name and file extension
//        $feature_image_filename = Str::slug(time() . ' ' . now() . ' ' . substr($feature_image_post_thumbnail->getClientOriginalName(), 0, -3), '-') . '.' . $feature_image_post_thumbnail->extension();// Current time with file name and file extension
//        $feature_image_path = $feature_image_post_thumbnail->storeAs('images/posts', $feature_image_filename);// Store in storage/images/posts file
        // OR
//        $feature_image_path=$feature_image_post_thumbnail->move(public_path('images/posts'), $feature_image_filename);
//        $post->feature_image = $feature_image_path;
//        dd($feature_image_filename,$large_image_filename);
        // OR

        // Insert in posts Table--Database
        $post->save();

        // Get Last ID || Post ID
        $post_id = Post::all()->last();

        // Status for Adding the New Post To The System!
        $alert_status = 'alert-success';
        // Msg
        $msg = 'New User Added Successfully.';
        // Pref
        $pref = "You Add $post_title As New Post To The System!<br>Post ID : {$post_id['id']} ,Author id : $post_user_id . ";
        $status = ['alert_status' => $alert_status, 'msg' => $msg, 'pref' => $pref];

        return redirect()->back()->with('status', $status);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        // Post ID
        $post = Post::findOrFail($id);
        return response()->view('dashboard.posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(int $id): Response
    {
        // Post ID
        $post = Post::findOrFail($id);
        // Get All Categories
        $categories = Category::all();
        return response()->view('dashboard.posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        // Get all inputs from the form
        $input = $request->all();
        // Validate inputs
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
        ]);

        // Post ID
        $post = Post::findOrFail($id);
        $post_id = $post->id;
        $post_user_id = $post->user_id;
        $post_user_name = User::withoutTrashed()->where('id', $post_user_id)->select('name')->get('name')[0]->name;
        $post_title = $input['title'];
        $post_body = $input['body'];
        $post_category_id = $input['category'];
        $post->title = $post_title;
        $post->body = $post_body;
        $post->user_id = $post_user_id;
        $post->category_id = $post_category_id;

        // Check Data
//        dd($post,$post_user_name);

        // Update New Data in post Table--Database
        $post->save();

        // Status for Adding the New Post To The System!
        $alert_status = 'alert-success';
        // Msg
        $msg = 'New User Added Successfully.';
        // Pref
        $pref = "You Edit $post_title Post in The System!<br>Post ID : {$post_id} ,Author id : $post_user_id . ,Author name : . $post_user_name ";
        $status = ['alert_status' => $alert_status, 'msg' => $msg, 'pref' => $pref];

        return redirect()->route('dashboard.posts.index')->with('status', $status);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        // Post ID
        $post = Post::findOrFail($id);
        $post_id = $id;
        $post_title = $post->title;

        // Status for Adding the New Role To The System!
        $alert_status = 'alert-warning';
        // Msg
        $msg = "Delete Post $post_title Successfully.";
        // Pref
        $pref = "You Delete $post_title User Role From The System!<br>Post ID : {$post_id} . ";
        $status = ['alert_status' => $alert_status, 'msg' => $msg, 'pref' => $pref];

        $post->delete();

        return redirect()->route('dashboard.posts.index')->with('status', $status);
    }
}
