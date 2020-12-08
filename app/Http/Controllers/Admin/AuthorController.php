<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;

class AuthorController extends Controller
{
    public function index(){

        $authors = User::where('role_id',2)
                        ->withCount('posts')
                        ->withCount('comments')
                        ->get();
    
        return view('admin.authors',compact('authors'));
    }

    public function destroy($id){
        
        $author = User::findOrFail($id)->delete();
        Toastr::success('Author Successfully Deleted!','Success');
        return redirect()->back();
    }
}
