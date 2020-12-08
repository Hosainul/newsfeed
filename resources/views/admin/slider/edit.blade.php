@extends('layouts.backend.app')

@section('title','Slider')

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Create Slider</h4>
            </div>
            <div class="card-body">
              <form action="{{route('admin.slider.update',$slider->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                      <label class="bmd-label-floating">Title</label>
                      <input type="text" class="form-control" name="title" value="{{$slider->title}}">
                    </div>
                  </div>
                  <div class="col-md-10">
                    <div class="form-group">
                      <label class="bmd-label-floating">Description</label>
                      <input type="text" class="form-control" name="description" value="{{$slider->description}}">
                    </div>
                  </div>
                  </div>
                  <div class="col-md-10">
                    <label class="bmd-label-floating">Image</label>
                    <input type="file" name="image">
                  </div>
                <button type="submit" class="btn btn-primary btn-sm pull-left">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a href="{{route('admin.slider.index')}}" class="btn btn-info btn-sm">Back</a>
  </div>
@endsection