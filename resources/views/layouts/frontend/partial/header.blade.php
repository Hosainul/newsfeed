<header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
              <li><a href="{{route('home')}}">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="{{route('contact.create')}}">Contact</a></li>
            </ul>
          </div>
          <div class="header_top_right">
            <p id="date"></p>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
          <div class="logo_area"><a href="index.html" class="logo"><img src="{{asset('frontend/images/logo.jpg')}}" alt=""></a></div>
          <div class="add_banner"><a href="#"><img src="{{asset('frontend/images/addbanner_728x90_V1.jpg')}}" alt=""></a></div>
        </div>
      </div>
    </div>
  </header>
  <section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav main_nav">
          <li class="active"><a href="{{route('home')}}"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
          <li><a href="#">Business</a></li>
          <li><a href="#">Fashion</a></li>
          <li><a href="#">Technology</a></li>
          <li><a href="#">Photography</a></li>
          <li><a href="#">Games</a></li>
          <li><a href="{{route('contact.create')}}">Contact Us</a></li>
        </ul>
      </div>
    </nav>
  </section>
  <section id="newsSection">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="latest_newsarea"> <span>Latest News</span>
          <ul id="ticker01" class="news_sticker">

            @foreach ($lat_posts as $post)
                <li><a href="#"><img style="width: 20px; height: 20px;" src="{{asset('storage/post/'.$post->image)}}" alt="">{{$post->title}}</a></li>
            @endforeach
            
          </ul>
          <div class="social_area">
            <ul class="social_nav">
              <li class="facebook"><a href="#"></a></li>
              <li class="twitter"><a href="#"></a></li>
              <li class="flickr"><a href="#"></a></li>
              <li class="pinterest"><a href="#"></a></li>
              <li class="googleplus"><a href="#"></a></li>
              <li class="vimeo"><a href="#"></a></li>
              <li class="youtube"><a href="#"></a></li>
              <li class="mail"><a href="#"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

<script>
    var d = new Date();
    document.getElementById("date").innerHTML = d;
</script>