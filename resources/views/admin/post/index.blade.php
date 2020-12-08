@extends('layouts.backend.app')

@section('title','Post')

@section('content')
<div class="content">
  <div class="container-fluid">
    <a href="{{route('admin.post.create')}}" class="btn btn-primary">New Post</a>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">All Posts <span class="badge bg-primary">{{$posts->count()}}</span></h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>Id</th>
                  <th>Athur</th>
                  <th>Title</th>
                  <th><i class="material-icons">visibility</i></th>
                  <th>Approved</th>
                  <th>Status</th>
                  <th>Created At</th>
                  <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($posts as $key=>$post)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{Str::limit($post->title,'10')}}</td>
                        <td>{{$post->view}}</td>
                        <td>
                            @if ($post->is_approved == true)
                                <span class="badge bg-green">Approved</span>
                            @else
                                <span class="badge bg-blue">Not Approved</span>
                            @endif
                        </td>
                        <td>
                            @if ($post->status == true)
                                <span class="badge bg-green">Published</span>
                            @else
                                <span class="badge bg-blue">Not Published</span>
                            @endif
                        </td>
                        <td>{{$post->created_at}}</td>
                        <td>
                          <a href="{{route('admin.post.edit',$post->id)}}"> <i class="material-icons">edit</i></a>

                          <form id="delete-form-{{ $post->id }}" action="{{route('admin.post.destroy',$post->id)}}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                          </form>
                        <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure want t delete this?')){
                          event.preventDefault();
                          document.getElementById('delete-form-{{ $post->id }}').submit();
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