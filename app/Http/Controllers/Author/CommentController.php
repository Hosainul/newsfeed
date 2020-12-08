<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(){

        $posts = Auth::user()->posts;
        return view('author.comment',compact('posts'));
    }

    public function destroy($id){
        
        $comment = Comment::findOrFail($id);

        if($comment->post->user->id == Auth::id()){
            
            $comment->delete();
            Toastr::success('Comment Deleted','Success');
            return redirect()->back();
        }else{

            Toastr::success('You are not authorized to Delete this comment!','Success');
            return redirect()->back();
            
        }
    }
}
