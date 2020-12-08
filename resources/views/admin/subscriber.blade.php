@extends('layouts.backend.app')

@section('title','Subscriber')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">All Subscribers</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>Id</th>
                  <th>Name</th>
                  <th>Craeted At</th>
                  <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($subscribers as $key=>$subscriber)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$subscriber->email}}</td>
                        <td>{{$subscriber->created_at}}</td>
                        <td>
                          <form id="delete-form-{{ $subscriber->id }}" action="{{route('admin.subscriber.destroy',$subscriber->id)}}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                          </form>
                        <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure want t delete this?')){
                          event.preventDefault();
                          document.getElementById('delete-form-{{ $subscriber->id }}').submit();
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