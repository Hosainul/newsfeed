@extends('layouts.backend.app')

@section('title','Photography')

@section('content')
<div class="content">
  <div class="container-fluid">
    <a href="{{route('author.photography.create')}}" class="btn btn-primary">New Photo</a>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">All Photos</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>Id</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Craeted At</th>
                  <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($photos as $key=>$photo)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$photo->title}}</td>
                        <td>
                          <img src="{{asset('storage/photography/'.$photo->image)}}" class="img-responsive img-thumbnail"
                          style="width: 150px; height: 100px;">
                        </td>
                        <td>{{$photo->created_at}}</td>
                        <td>
                          <form id="delete-form-{{ $photo->id }}" action="{{route('author.photography.destroy',$photo->id)}}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                          </form>
                        <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure want t delete this?')){
                          event.preventDefault();
                          document.getElementById('delete-form-{{ $photo->id }}').submit();
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