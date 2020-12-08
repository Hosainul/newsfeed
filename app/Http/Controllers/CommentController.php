<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $id){
        
        $this->validate($request, [
            'comment' => 'required'
        ]);

        $comment = new Comment();
        $comment->post_id = $request->id;
        $comment->user_id = Auth::id();
        $comment->comment = $request->comment;
        $comment->save();

        Toastr::success('Commented Successfully Published!','Success');
        return redirect()->back();
    }
}
