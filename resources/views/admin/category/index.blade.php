@extends('layouts.backend.app')

@section('title','Category')

@section('content')
<div class="content">
  <div class="container-fluid">
    <a href="{{route('admin.category.create')}}" class="btn btn-primary">New Category</a>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">All Category</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>Id</th>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Posts</th>
                  <th>Craeted At</th>
                  <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($categories as $key=>$category)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>
                        <td>{{$category->posts->count()}}</td>
                        <td>{{$category->created_at}}</td>
                        <td>
                          <a href="{{route('admin.category.edit',$category->id)}}"> <i class="material-icons">edit</i></a>

                          <form id="delete-form-{{ $category->id }}" action="{{route('admin.category.destroy',$category->id)}}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                          </form>
                        <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure want t delete this?')){
                          event.preventDefault();
                          document.getElementById('delete-form-{{ $category->id }}').submit();
                        }else{
                          event.preventDefault();
                        }"><i class="material-icons">delete</i></button>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection