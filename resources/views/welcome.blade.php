@extends('layouts.frontend.app')

@push('css')
    
@endpush

@section('content')
<section id="sliderSection">
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8">
      <div class="slick_slider">

        @foreach ($sliders as $slider)
          
        <div class="single_iteam"> <a href="pages/single_page.html"> <img src="{{ asset('storage/slider/'.$slider->image) }}" alt=""></a>
          <div class="slider_article">
            <h2><a class="slider_tittle" href="pages/single_page.html">{{$slider->title}}</a></h2>
            <p>{{$slider->description}}</p>
          </div>
        </div>

        @endforeach

      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
      <div class="latest_post">
        <h2><span>Latest post</span></h2>
        <div class="latest_post_container">
          <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
          
            <ul class="latest_postnav">
              @foreach ($latest_posts as $post)
              <li>
                <div class="media"> <a href="{{route('post.details',$post->slug)}}" class="media-left"> <img alt=""
                  src="{{asset('storage/post/'.$post->image)}}"> </a>
                  <div class="media-body"> <a href="{{route('post.details',$post->slug)}}" class="catg_title">{{$post->title}}</a> </div>
                </div>
              </li>
              @endforeach
            </ul>
          
          <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
            <h2><span>Business</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                @foreach ($business_posts as $business_post)
                <li>
                  <figure class="bsbig_fig"> <a href="{{route('post.details',$business_post->slug)}}" class="featured_img"> <img alt="" src="{{asset('storage/post/'.$business_post->image)}}"> <span class="overlay"></span> </a>
                    <figcaption> <a href="{{route('post.details',$business_post->slug)}}">{{$business_post->title}}</a> </figcaption>
                    <p>{{Str::limit($business_post->title, '80')}}</p>
                  </figure>
                </li>
                @endforeach
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                @foreach ($busi_posts as $busi_post)
                <li>
                  <div class="media wow fadeInDown"> <a href="{{route('post.details',$busi_post->slug)}}" class="media-left"> <img alt="" src="{{asset('storage/post/'.$busi_post->image)}}"> </a>
                    <div class="media-body"> <a href="{{route('post.details',$busi_post->slug)}}" class="catg_title">{{$busi_post->title}}</a> </div>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="fashion_technology_area">
            <div class="fashion">
              <div class="single_post_content">
                <h2><span>Fashion</span></h2>
                <ul class="business_catgnav wow fadeInDown">

                  @foreach ($fashion_posts as $fashion_post)
                    <li>
                      <figure class="bsbig_fig"> <a href="{{route('post.details',$fashion_post->slug)}}" class="featured_img"> <img alt="" src="{{asset('storage/post/'.$fashion_post->image)}}"> <span class="overlay"></span> </a>
                        <figcaption> <a href="{{route('post.details',$fashion_post->slug)}}">{{$fashion_post->title}}</a> </figcaption>
                        <p>{{Str::limit($fashion_post->title, '80')}}</p>
                      </figure>
                    </li>
                  @endforeach
              
                </ul>
                <ul class="spost_nav">

                  @foreach ($fash_posts as $fash_post)
                    <li>
                      <div class="media wow fadeInDown"> <a href="{{route('post.details',$fash_post->slug)}}" class="media-left"> <img alt="" src="{{asset('storage/post/'.$fash_post->image)}}"> </a>
                        <div class="media-body"> <a href="{{route('post.details',$fash_post->slug)}}" class="catg_title"> {{$busi_post->title}}</a> </div>
                      </div>
                    </li>
                  @endforeach
                  
                </ul>
              </div>
            </div>
            <div class="technology">
              <div class="single_post_content">
                <h2><span>Technology</span></h2>
                <ul class="business_catgnav">

                  @foreach ($technology_posts as $technology_post)
                  <li>
                    <figure class="bsbig_fig wow fadeInDown"> <a href="{{route('post.details',$technology_post->slug)}}" class="featured_img"> <img alt="" src="{{asset('storage/post/'.$technology_post->image)}}"> <span class="overlay"></span> </a>
                      <figcaption> <a href="{{route('post.details',$technology_post->slug)}}">{{$technology_post->title}}</a> </figcaption>
                      <p>{{Str::limit($technology_post->title, '80')}}</p>
                    </figure>
                  </li>
                  @endforeach
                  
                </ul>
                <ul class="spost_nav">
                  @foreach ($tech_posts as $tech_post)
                  <li>
                    <div class="media wow fadeInDown"> <a href="{{route('post.details',$tech_post->slug)}}" class="media-left"> <img alt="" src="{{asset('storage/post/'.$tech_post->image)}}"> </a>
                      <div class="media-body"> <a href="{{route('post.details',$tech_post->slug)}}" class="catg_title">{{$tech_post->title}}</a> </div>
                    </div>
                  </li>
                  @endforeach
                 
                </ul>
              </div>
            </div>
          </div>
          <div class="single_post_content">
            <h2><span>Photography</span></h2>
            
              @foreach ($photogrphs as $photograph)
              <ul class="photograph_nav  wow fadeInDown">
                <li>
                  <div class="photo_grid">
                    <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="{{asset('storage/photography/'.$photograph->image)}}" title="Photo Title: {{$photograph->title}} | Author: {{$photograph->user->name}} "> <img src="{{asset('storage/photography/'.$photograph->image)}}" alt=""/></a> </figure>
                  </div>
                </li>
              </ul>
              @endforeach
             
            
          </div>
          <div class="single_post_content">
            <h2><span>Games</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                @foreach ($games_posts as $games_post)
                <li>
                  <figure class="bsbig_fig"> <a href="{{route('post.details',$games_post->slug)}}" class="featured_img"> <img alt="" src="{{asset('storage/post/'.$games_post->image)}}"> <span class="overlay"></span> </a>
                    <figcaption> <a href="{{route('post.details',$games_post->slug)}}">{{$games_post->title}}</a> </figcaption>
                    <p>{{Str::limit($games_post->title, '80')}}</p>
                  </figure>
                </li>
                @endforeach
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                @foreach ($game_posts as $game_post)
                <li>
                  <div class="media wow fadeInDown"> <a href="{{route('post.details',$game_post->slug)}}" class="media-left"> <img alt="" src="{{asset('storage/post/'.$game_post->image)}}"> </a>
                    <div class="media-body"> <a href="{{route('post.details',$game_post->slug)}}" class="catg_title">{{$game_post->title}}</a> </div>
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
                    <li class="cat-item"><a href="{{route('category.posts',$tag->slug)}}">{{$tag->name}}</a></li>
                  @endforeach
                 </ul>
              </div>
            </div>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Category Archive</span></h2>
            <select class="catgArchive">
              <option>Select Category</option>
              <option>Life styles</option>
              <option>Sports</option>
              <option>Technology</option>
              <option>Treads</option>
            </select>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Links</span></h2>
            <ul>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Rss Feed</a></li>
              <li><a href="#">Login</a></li>
              <li><a href="#">Life &amp; Style</a></li>
            </ul>
          </div>
        </aside>
      </div>
    </div>
  </section>
@endsection


@push('js')
    
@endpush