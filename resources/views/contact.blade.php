@extends('layouts.frontend.app')

@push('css')
    <link rel="stylesheet" href="{{asset('frontend/css/comment.css')}}">
@endpush

@section('content')

<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="contact_area">
            <h2>Contact Us</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dosectetur adipisicing elit, sed do.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <form action="#" method="POST" class="contact_form">
                @csrf
              <input class="form-control" type="text" name="name" placeholder="Name*" required="">
              <input class="form-control" type="email" name="email" placeholder="Email*" required="">
              <textarea class="form-control" cols="30" rows="10" name="message" placeholder="Message*" required=""></textarea>
              <input type="submit" value="Send Message">
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
            <div class="single_sidebar">
                <h2><span>Popular Post</span></h2>
                <ul class="spost_nav">
    
                  @foreach ($popular_posts as $post)
                      <li>
                        <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="{{asset('storage/post/'.$post->image)}}"> </a>
                          <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> {{$post->title}}</a> </div>
                        </div>
                    </li>
                  @endforeach
                  
                </ul>
              </div>
        </aside>
      </div>
    </div>
  </section>

@endsection