@extends('layouts.backend.app')

@section('title','Category')

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Create Category</h4>
            </div>
            <div class="card-body">
              <form action="{{route('admin.category.store')}}" method="POST">
                @csrf
                <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                      <label class="bmd-label-floating">Name</label>
                      <input type="text" class="form-control" required="" name="name">
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm pull-left">Create</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a href="{{route('admin.category.index')}}" class="btn btn-info btn-sm">Back</a>
  </div>
@endsection