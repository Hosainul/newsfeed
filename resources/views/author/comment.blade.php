@extends('layouts.backend.app')

@section('title','Comment')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">All Comments</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>Id</th>
                  <th>Author</th>
                  <th>Post</th>
                  <th>Comment</th>
                  <th>Craeted At</th>
                  <th>Action</th>
                </thead>
                <tbody>

                  @foreach ($posts as $post)
                    @foreach ($post->comments as $key=>$comment)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$comment->user->name}}</td>
                        <td>{{Str::limit($comment->post->title, '20')}}</td>
                        <td>{{Str::limit($comment->comment, '35')}}</td>
                        <td>{{$comment->created_at}}</td>
                        <td>
                          <a href="{{route('admin.category.edit',$comment->id)}}"> <i class="material-icons">edit</i></a>

                          <form id="delete-form-{{ $comment->id }}" action="{{route('author.comment.destroy',$comment->id)}}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                          </form>
                        <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure want to delete this comment?')){
                          event.preventDefault();
                          document.getElementById('delete-form-{{ $comment->id }}').submit();
                        }else{
                          event.preventDefault();
                        }"><i class="material-icons">delete</i></button>
                        </td>
                      </tr>
                    @endforeach
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