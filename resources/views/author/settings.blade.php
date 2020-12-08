@extends('layouts.backend.app')

@section('title','Settings')

@section('content')
<div class="content">
<div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Profile</h4>
            <p class="card-category">Complete your profile</p>
          </div>
          <div class="card-body">
            <form action="{{route('author.profile.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email address</label>
                    <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}">
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-10">
                        <label class="bmd-label-floating">Image</label>
                        <input type="file" name="image">
                    </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">About</label>
                    {{-- <input type="text" name="about" class="form-control" value="{{Auth::user()->about}}"> --}}
                  </div>
                  <div class="form-group">
                    <textarea name="about" id="" cols="75" rows="5">{{Auth::user()->about}}</textarea>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-profile">
          <div class="card-avatar">
            <a href="javascript:;">
              <img class="img" src="../assets/img/faces/marc.jpg" />
            </a>
          </div>
          <div class="card-body">
            <h6 class="card-category text-gray">Author</h6>
            <h4 class="card-title">{{Auth::user()->name}}</h4>
            <p class="card-description">
              {{Auth::user()->about}}
            </p>
            <a href="javascript:;" class="btn btn-primary btn-round">Follow</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection