@extends('layouts.frontend.app')

@push('css')
    <link rel="stylesheet" href="{{asset('frontend/css/comment.css')}}">
@endpush

@section('content')
<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
            <ol class="breadcrumb">
              <li><a href="{{route('home')}}">Home</a></li>
              <li><a href="#">Technology</a></li>
              <li class="active">Mobile</li>
            </ol>
            <h1>{{$business_post->slug}}</h1>
            <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Wpfreeware</a> <span><i class="fa fa-calendar"></i>{{$business_post->created_at}}</span> <a href="#"><i class="fa fa-tags"></i>Technology</a> </div>
            <div class="single_page_content"> <img class="img-center" src="{{asset('storage/post/'.$business_post->image)}}" alt="">
              <p>{{$business_post->body}}.</p>
              <div class="view">
                <h5 style="color: black;">View: {{$business_post->view}}</h5>
              </div><hr>

              <h4>Post a Comment:</h4>
              @guest
                <p class="text-info">For post a comment you need to login first. <a style="color:blue;" href="{{route('login')}}">Login</a></p><br>
                <p class="text-primary">Don't have a account? <a style="color:blue;"  href="{{route('register')}}">Register</a></p><br>
              @else
                <form action="{{route('comment.store',$business_post->id)}}" method="POST">
                  @csrf
                  <div class="form-group">
                    <textarea name="comment" rows="2" class="text-area-messge form-control"
                            placeholder="Enter your comment" aria-required="true" aria-invalid="false">
                      </textarea >
                  </div>
                  <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </form>
              @endguest
              <hr>
              
              <h4>Comments:  <span style="color: black;">( {{$business_post->comments->count()}} )</span></h4>
              @foreach ($business_post->comments as $comment)
                  
              <div class="commnets-area ">
                <div class="comment">
                  <div class="post-info">
                    <div class="left-area">
                            <a class="avatar" href="#"><img style="height: 50px; width:50px" src="{{asset('storage/profile/'.$comment->user->image)}}" alt="Profile Image"></a>
                    </div>
                    <div class="middle-area">
                            <a class="name" href="#"><b>{{$comment->user->name}}</b></a>
                            <h6 class="date">on {{$comment->created_at->diffForHumans()}}</h6>
                        </div>
                  </div><!-- post-info -->
                       <p>{{$comment->comment}}</p>
                </div>
              </div><!-- commnets-area -->
            @endforeach

            </div>
            <div class="social_link">
              <ul class="sociallink_nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
              </ul>
            </div>
            <div class="related_post">
              <h2>Related Post <i class="fa fa-thumbs-o-up"></i></h2>
              <ul class="spost_nav wow fadeInDown animated">

                @foreach ($rel_cat_posts as $rel_cat_post)
                    <li>
                      <div class="media"> <a class="media-left" href="single_page.html"> <img src="{{asset('storage/post/'.$rel_cat_post->image)}}" alt=""> </a>
                        <div class="media-body"> <a class="catg_title" href="single_page.html">{{$rel_cat_post->title}}</a> </div>
                      </div>
                    </li>
                @endforeach

              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Author</span></h2>
            <a class="sideAdd" href="#">
              <img src="{{asset('storage/profile/'.$business_post->user->image)}}" alt="">
              <p style="margin-top: 10px;">Name: {{$business_post->user->name}}</p>
            </a>
            
          </div>
          <div class="single_sidebar">
            <h2><span>Popular Post</span></h2>
            <ul class="spost_nav">

              @foreach ($popular_posts as $post)
                  <li>
                    <div class="media wow fadeInDown"> <a href="{{route('post.details',$post->slug)}}" class="media-left"> <img alt="" src="{{asset('storage/post/'.$post->image)}}"> </a>
                      <div class="media-body"> <a href="{{route('post.details',$post->slug)}}" class="catg_title"> {{$post->title}}</a> </div>
                    </div>
                </li>
              @endforeach
              
            </ul>
          </div>
          <div class="single_sidebar">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Category</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="category">
                <ul>
                  
                  @foreach ($categories as $category)
                  <li class="cat-item"><a href="{{route('category.posts',$category->slug)}}">{{$category->name}}</a></li>
                  @endforeach
                  
                </ul>
              </div>
            </div>
          </div>

          <div class="single_sidebar">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Tag</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="category">
                <ul>
                  
                  @foreach ($tags as $tag)
                  <li class="cat-item"><a href="{{route('tag.posts',$tag->slug)}}">{{$tag->name}}</a></li>
                  @endforeach
                  
                </ul>
              </div>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </section>
@endsection