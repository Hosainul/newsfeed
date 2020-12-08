<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Brian2694\Toastr\Facades\Toastr;

class CommentController extends Controller
{
    public function index(){

        $comments = Comment::latest()->get();
        return view('admin.comment',compact('comments'));
    }

    public function destroy($id){
        
        $comment = Comment::find($id);
        $comment->delete();

        Toastr::success('Comment Deleted Successfully!','Success');
        return redirect()->back();
    }
}
