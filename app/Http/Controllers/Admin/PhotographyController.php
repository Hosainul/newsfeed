<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photography;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class PhotographyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photography::all();
        return view('admin.photography.index',compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.photography.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|mimes:jpg,png,bmp,jpeg',
        ]);

        $image = $request->file('image');
       
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('photography')){
                Storage::disk('public')->makeDirectory('photography');
            }

            $photoImage = Image::make($image)->resize(500,375)->stream();
            Storage::disk('public')->put('photography/'.$imageName,$photoImage);
        }else{
            $imageName = "default.png";
        }

        $photos = new Photography();
        $photos->user_id = Auth::id();;
        $photos->title = $request->title;
        $photos->image = $imageName;
        $photos->save();

        Toastr::success('Success','Photo Uploaded Successfully!');
        return redirect()->route('admin.photography.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = photography::find($id);
        
        if(Storage::disk('public')->exists('photography/'.$photo->image)){
            Storage::disk('public')->delete('photography/'.$photo->image);
        }
        $photo->delete();

        Toastr::success('Success','Slider Deleted Successfully!');
        return redirect()->route('admin.photography.index');
    }
}
