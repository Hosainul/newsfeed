@extends('layouts.backend.app')

@section('title','Dashboard')

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">playlist_add_check</i>
              </div>
              <p class="card-category">Total Post</p>
              <h3 class="card-title">{{$posts->count()}}
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-danger">content_copy</i>
                <a href="{{route('author.post.index')}}">View Posts</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">store</i>
              </div>
              <p class="card-category">Popular Post</p>
              <h3 class="card-title">{{$popular_posts->count()}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">forum</i>
              </div>
              <p class="card-category">Pending Post</p>
              <h3 class="card-title">{{$pending_posts}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">local_offer</i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">visibility</i> 
              </div>
              <p class="card-category">All Views</p>
              <h3 class="card-title">{{$all_views}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">visibility</i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Posts</h4>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>ID</th>
                  <th>title</th>
                  <th>Comment</th>
                  <th>View</th>
                  <th>Status</th>
                  <th>Approve</th>
                </thead>
                <tbody>
                  @foreach ($posts as $key=>$post)
                    <tr>
                      <td>{{$key + 1}}</td>
                      <td>{{Str::limit($post->title, 45)}}</td>
                      <td>{{$post->comments->count()}}</td>
                      <td>{{$post->view}}</td>
                      <td>
                        @if($post->status == true)
                          <span class="label bg-success">Published</span>
                        @else 
                          <span class="label bg-danger">Pending</span>
                        @endif
                      </td>
                      <td>
                        @if ($post->is_approved == true)
                            <span class="badge bg-success">Approved</span>
                        @else
                            <span class="badge bg-warning">Not Approved</span>
                        @endif
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
@endsection
