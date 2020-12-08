@extends('layouts.backend.app')

@section('title','Photography')

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Upload Photo</h4>
            </div>
            <div class="card-body">
              <form action="{{route('author.photography.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                      <label class="bmd-label-floating">Title</label>
                      <input type="text" class="form-control" name="title">
                    </div>
                  </div>
                  </div>
                  <div class="col-md-10">
                    <label class="bmd-label-floating">Image</label>
                    <input type="file" name="image">
                  </div>
                <button type="submit" class="btn btn-primary btn-sm pull-left">Create</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a href="{{route('author.photography.index')}}" class="btn btn-info btn-sm">Back</a>
  </div>
@endsection