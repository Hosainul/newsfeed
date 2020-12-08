<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use App\Models\Subscriber;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $posts = Post::all();
        $popular_posts = Post::withCount('comments')
                            ->orderBy('view','desc')
                            ->orderBy('comments_count','desc')
                            ->take(5)->get();

        $pending_posts = Post::where('is_approved',false)->count();

        $all_views = Post::sum('view');

        $authors = User::where('role_id',2)->count();
        
        $new_authors_today = User::where('role_id',2)
                                ->whereDate('created_at',Carbon::today())->count();

        $active_authors = user::where('role_id',2)
                                ->withCount('posts')
                                ->withCount('comments')
                                ->orderBy('posts_count','desc')
                                ->orderBy('comments_count','desc')
                                ->take(5)->get();

        $categories = Category::all()->count();

        $tags = Tag::all()->count();
        $subscribers = Subscriber::all()->count();
        $contacts = Contact::all()->count();
        
        return view('admin.dashboard',compact('posts','popular_posts','pending_posts','all_views','authors', 'new_authors_today','active_authors','categories','tags','subscribers','contacts'));
    }
    
}
