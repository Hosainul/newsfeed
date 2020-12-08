@extends('layouts.backend.app')

@section('title','Slider')

@section('content')
<div class="content">
  <div class="container-fluid">
    <a href="{{route('admin.slider.create')}}" class="btn btn-primary">New Slider</a>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">All Sliders</h4>
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
                    @foreach ($sliders as $key=>$slider)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$slider->title}}</td>
                        <td>
                          <img src="{{asset('storage/slider/'.$slider->image)}}" class="img-responsive img-thumbnail"
                          style="width: 150px; height: 100px;">
                        </td>
                        <td>{{$slider->created_at}}</td>
                        <td>
                          <a href="{{route('admin.slider.edit',$slider->id)}}"> <i class="material-icons">edit</i></a>

                          <form id="delete-form-{{ $slider->id }}" action="{{route('admin.slider.destroy',$slider->id)}}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                          </form>
                        <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure want t delete this?')){
                          event.preventDefault();
                          document.getElementById('delete-form-{{ $slider->id }}').submit();
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