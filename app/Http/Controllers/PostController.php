<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    // public function index(){

    //     $categories = Category::all();

    //     return view('post',compact('categories'));
    // }


    public function details($slug){
        
        $categories = Category::all();
        $tags = Tag::all();
        $business_post = Post::where('slug',$slug)->approved()->published()->first();
        $busi_post = Post::inRandomOrder()->where('category_id',1)->approved()->published()->take(4)->get();
        $rel_cat_posts = Post::where('Category_id',1)->approved()->published()->take(3)->get();
        $lat_posts = Post::approved()->published()->latest()->take(9)->get();
        $popular_posts = Post::withCount('comments')
                                ->orderBy('view','desc')
                                ->orderBy('comments_count','desc')
                                ->take(4)->get();

        $news = 'news_' . $business_post->id;
        if(!Session::has($news)){
            $business_post->increment('view');
            Session::put($news,1);
        }
        // $randomposts = Post::all()->take(3)->inRandomOrder()->get();
        
        return view('post',compact('business_post','busi_post','rel_cat_posts','categories','tags','lat_posts','popular_posts'));
    }

    public function postByCategory($slug){

        $posts = Category::where('slug',$slug)->first()->posts;
        $lat_posts = Post::approved()->published()->latest()->take(9)->get();
        $tags = Tag::all();
        $categories = Category::all();
        $business_post = Post::where('slug',$slug)->approved()->published()->first();
        $popular_posts = Post::withCount('comments')
                                ->orderBy('view','desc')
                                ->orderBy('comments_count','desc')
                                ->take(4)->get();

        return view('posts',compact('categories','posts','lat_posts','tags','popular_posts','business_post'));
    }

    public function postByTag($slug){

        $posts = Tag::where('slug',$slug)->first()->posts;
        $tags = tag::all();
        $categories = Category::all();

        return view('tags',compact('posts','tags','categories'));
    }
}
