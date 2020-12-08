@extends('layouts.backend.app')

@section('title','Authors')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">All Authors</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>Id</th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Posts</th>
                  <th>Comments</th>
                  <th>Craeted At</th>
                  <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($authors as $key=>$author)
                      <tr>
                          <td>{{$key + 1}}</td>
                          <td>{{$author->name}}</td>
                          <td><img src="{{asset('storage/profile/'.$author->image)}}"
                            style="width: 90px; height: 90px; border-radius:15px;" alt=""></td>
                          <td>{{$author->posts_count}}</td>
                          <td>{{$author->comments_count}}</td>
                          <td>{{$author->created_at}}</td>
                          <td>
                            <form id="delete-form-{{ $author->id }}" action="{{route('admin.author.destroy',$author->id)}}" method="POST" style="display: none;">
                              @csrf
                              @method('DELETE')
                            </form>
                          <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure want t delete this?')){
                            event.preventDefault();
                            document.getElementById('delete-form-{{ $author->id }}').submit();
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