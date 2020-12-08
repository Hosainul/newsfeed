<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Slider;
use App\Models\post;
use App\Models\Tag;
use App\Models\Photography;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $sliders = Slider::all();
        $tags = Tag::all();
        $business_posts = Post::where('category_id',1)->approved()->published()->latest()->take(1)->get();
        $busi_posts = Post::inRandomOrder()->where('category_id',1)->approved()->published()->take(4)->get();

        $fashion_posts = Post::where('category_id',2)->approved()->published()->latest()->take(1)->get();
        $fash_posts = Post::inRandomOrder()->where('category_id',2)->approved()->published()->take(4)->get();

        $technology_posts = Post::where('category_id',3)->approved()->published()->latest()->take(1)->get();
        $tech_posts = Post::inRandomOrder()->where('category_id',3)->approved()->published()->take(4)->get();
        
        $games_posts = Post::where('category_id',5)->approved()->published()->latest()->take(1)->get();
        $game_posts = Post::inRandomOrder()->where('category_id',5)->approved()->published()->take(4)->get();

        $photogrphs = Photography::inRandomOrder()->latest()->take(6)->get();
        $latest_posts = Post::approved()->published()->latest()->take(5)->get();
        $lat_posts = Post::approved()->published()->latest()->take(9)->get();

        $popular_posts = Post::withCount('comments')
                                ->orderBy('view','desc')
                                ->orderBy('comments_count','desc')
                                ->take(4)->get();
        
        return view('welcome',
        compact('categories','sliders','tags','business_posts','busi_posts','latest_posts','fashion_posts','fash_posts',
            'technology_posts','tech_posts','games_posts','game_posts','photogrphs','lat_posts','popular_posts'));
    }
}
