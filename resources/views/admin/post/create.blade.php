@extends('layouts.backend.app')

@section('title','Post')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css ">
@endpush

@section('content')

<div class="content">
    <div class="container-fluid">

      <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="row">
          <div class="col-lg-8">
            <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Create Post</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-10">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" class="form-control" name="title">
                        </div>
                      </div>
                      <div class="col-md-10">
                        <label class="bmd-label-floating">Image</label>
                        <input type="file" name="image">
                      </div>
                      <div class="col-md-10">
                        <div class="form-group">
                          <input type="checkbox" id="publish" class="filled-in" name="status" value="1">
                          <label for="publish">Publish</label>
                        </div>
                      </div>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Select Category & Tag</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-10">
                        <div class="form-group">
                          <label class="bmd-label-floating">Category</label>
                          <select name="category" class="form-control">
                          @foreach ($categories as $category)
                              <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                          </select>
                        </div>
                      </div>
                      
                  </div>
                  <div class="row">
                      <div class="col-md-10">
                        <div class="form-line {{ $errors->has('tags') ? 'focused error' : ''  }}">
                          <label for="tag">Tag</label>
                          <select name="tags[]" id="tags" class="form-control show-tick"
                          data-live-search="true" multiple="multiple">
                          @foreach ($tags as $tag)
                              <option value="{{$tag->id}}">{{$tag->name}}</option>
                          @endforeach
                          </select>
                        </div>
                      </div>
                  </div>
                  
                </div>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Body</h4>
                </div>
                <div class="body">
                  <textarea name="body" id="ckeditor" cols="30" rows="10"></textarea>
                </div>
            </div>
          </div>
          
        </div>
        <a href="{{route('admin.post.index')}}" class="btn btn-info btn-sm">Back</a>
        <button type="submit" class="btn btn-primary btn-sm pull-left">Create</button>
      </form>
    </div>
    
  </div>

  @endsection

@push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
      <script type="text/javascript">
            $("#tags").select2({
              placeholder: 'select a option',
              allowClear: true
            });
      </script>

<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
      <script>
        CKEDITOR.replace( 'ckeditor' );
    </script>

@endpush