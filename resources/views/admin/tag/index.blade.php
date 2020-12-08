@extends('layouts.backend.app')

@section('title','Tag')

@section('content')
<div class="content">
  <div class="container-fluid">
    <a href="{{route('admin.tag.create')}}" class="btn btn-primary">New Tag</a>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">All Tags</h4>
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
                    @foreach ($tags as $key=>$tag)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$tag->name}}</td>
                        <td>{{$tag->slug}}</td>
                        <td>{{$tag->posts->count()}}</td>
                        <td>{{$tag->created_at}}</td>
                        <td>
                          <a href="{{route('admin.tag.edit',$tag->id)}}"> <i class="material-icons">edit</i></a>

                          <form id="delete-form-{{ $tag->id }}" action="{{route('admin.tag.destroy',$tag->id)}}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                          </form>
                        <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure want t delete this?')){
                          event.preventDefault();
                          document.getElementById('delete-form-{{ $tag->id }}').submit();
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