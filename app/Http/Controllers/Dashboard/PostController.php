<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $posts = DB::table('posts')->paginate(12);

        return view('dashboard.posts.index', ['posts' => $posts]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): \Illuminate\Http\Response
    {
        //
//        return view('dashboard.posts.show', ['post' => $id]);
        return view('dashboard.posts.show', ['post' => Post::findOrFail($id)]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
