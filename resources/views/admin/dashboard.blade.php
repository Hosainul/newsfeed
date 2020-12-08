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
              <p class="card-category">Total Posts</p>
              <h3 class="card-title">{{$posts->count()}}
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-danger">content_copy</i>
                <a href="{{route('admin.post.index')}}">View Posts</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">warning</i>
              </div>
              <p class="card-category">Pending Posts</p>
              <h3 class="card-title">{{$pending_posts}}
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-danger">content_copy</i>
                <a href="{{route('admin.post.pending')}}">View Posts</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">library_books</i>
              </div>
              <p class="card-category">Categories</p>
              <h3 class="card-title">{{$categories}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i>
                <a href="{{route('admin.category.index')}}">View Categories</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">content_paste</i>
              </div>
              <p class="card-category">Tags</p>
              <h3 class="card-title">{{$tags}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">local_offer</i>
                <a href="{{route('admin.tag.index')}}">View Tags</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">person</i>
              </div>
              <p class="card-category">Authors</p>
              <h3 class="card-title">{{$authors}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">update</i>
                <a href="{{route('admin.author.index')}}">View Authors</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">person</i>
              </div>
              <p class="card-category">New Authors</p>
              <h3 class="card-title">{{$new_authors_today}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">update</i>Today
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">subscriptions</i>
              </div>
              <p class="card-category">Subscribers</p>
              <h3 class="card-title">{{$subscribers}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">update</i>
                <a href="{{route('admin.subscriber.index')}}">View Subscribers</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">contacts</i>
              </div>
              <p class="card-category">Contacts</p>
              <h3 class="card-title">{{$contacts}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">update</i>
                <a href="{{route('admin.contact.index')}}">View Contacts</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title">Popular Posts</h4>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>ID</th>
                  <th>title</th>
                  <th>Comment</th>
                  <th>View</th>
                </thead>
                <tbody>
                  @foreach ($popular_posts as $key=>$post)
                    <tr>
                      <td>{{$key + 1}}</td>
                      <td>{{Str::limit($post->title, 45)}}</td>
                      <td>{{$post->comments->count()}}</td>
                      <td>{{$post->view}}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Active Authors</h4>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>ID</th>
                  <th>Name</th>
                </thead>
                <tbody>
                  @foreach ($active_authors as $key=>$author)
                    <tr>
                      <td>{{$key + 1}}</td>
                      <td>{{$author->name}}</td>
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
