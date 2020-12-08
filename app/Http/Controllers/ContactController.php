<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Contact;
use App\Models\Tag;
use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{
    public function create(){

        $tags = tag::all();
        $lat_posts = Post::approved()->published()->latest()->take(9)->get();
        $popular_posts = Post::withCount('comments')
                                ->orderBy('view','desc')
                                ->orderBy('comments_count','desc')
                                ->take(5)->get();
        return view('contact',compact('lat_posts','popular_posts','tags'));
    }

    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name; 
        $contact->email = $request->email; 
        $contact->message = $request->message;
        $contact->save();

        Toastr::success('Message Sent Successfully','Success');
        return redirect()->back();
    }
}
