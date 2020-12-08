<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,bmp,jpeg',
        ]);

        $image = $request->file('image');
       
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('slider')){
                Storage::disk('public')->makeDirectory('slider');
            }

            $sliderImage = Image::make($image)->resize(660,502)->stream();
            Storage::disk('public')->put('slider/'.$imageName,$sliderImage);
        }else{
            $imageName = "default.png";
        }

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->image = $imageName;
        $slider->save();

        Toastr::success('Success','Slider Created Successfully!');
        return redirect()->route('admin.slider.index');

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
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
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
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpg,png,bmp,jpeg',
        ]);

        $image = $request->file('image');
        $slider = Slider::find($id);
       
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('slider')){
                Storage::disk('public')->makeDirectory('slider');
            }

            if(Storage::disk('public')->exists('slider/'.$slider->image)){
                Storage::disk('public')->delete('slider/'.$slider->image);
            }

            $sliderImage = Image::make($image)->resize(660,502)->stream();
            Storage::disk('public')->put('slider/'.$imageName,$sliderImage);
        }else{
            $imageName = $slider->image;
        }

        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->image = $imageName;
        $slider->save();

        Toastr::success('Success','Slider Updated Successfully!');
        return redirect()->route('admin.slider.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        
        if(Storage::disk('public')->exists('slider/'.$slider->image)){
            Storage::disk('public')->delete('slider/'.$slider->image);
        }
        $slider->delete();

        Toastr::success('Success','Slider Deleted Successfully!');
        return redirect()->route('admin.slider.index');
        
    }
}
