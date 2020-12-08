<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('backend/img/sidebar-1.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
        NEWS FEED
      </a></div>
    <div class="sidebar-wrapper">
      <ul class="nav">

        @if (Request::is('admin*'))
            
        <li class="nav-item  {{Request::is('admin/dashboard') ? 'active' : ''}}">
          <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item {{Request::is('admin/slider*') ? 'active' : ''}}">
          <a class="nav-link" href="{{route('admin.slider.index')}}">
            <i class="material-icons">slideshow</i>
            <p>Slider</p>
          </a>
        </li>
        <li class="nav-item {{Request::is('admin/tag*') ? 'active' : ''}}">
          <a class="nav-link" href="{{route('admin.tag.index')}}">
            <i class="material-icons">content_paste</i>
            <p>Tag</p>
          </a>
        </li>
        <li class="nav-item {{Request::is('admin/category*') ? 'active' : ''}}">
          <a class="nav-link" href="{{route('admin.category.index')}}">
            <i class="material-icons">library_books</i>
            <p>Category</p>
          </a>
        </li>
        <li class="nav-item {{Request::is('admin/post*') ? 'active' : ''}}">
          <a class="nav-link" href="{{route('admin.post.index')}}">
            <i class="material-icons">playlist_add_check</i>
            <p>Post</p>
          </a>
        </li>
        <li class="nav-item {{Request::is('admin/pending/post') ? 'active' : ''}}">
          <a class="nav-link" href="{{route('admin.post.pending')}}">
            <i class="material-icons">warning</i>
            <p>Pending Post</p>
          </a>
        </li>
        <li class="nav-item {{Request::is('admin/subscriber') ? 'active' : ''}}">
          <a class="nav-link" href="{{route('admin.subscriber.index')}}">
            <i class="material-icons">subscriptions</i>
            <p>Subscribers</p>
          </a>
        </li>
        <li class="nav-item {{Request::is('admin/comment') ? 'active' : ''}}">
          <a class="nav-link" href="{{route('admin.comment.index')}}">
            <i class="material-icons">comments</i>
            <p>Comments</p>
          </a>
        </li>
        <li class="nav-item {{Request::is('admin/author') ? 'active' : ''}}">
          <a class="nav-link" href="{{route('admin.author.index')}}">
            <i class="material-icons">account_circle</i>
            <p>Authors</p>
          </a>
        </li>
        <li class="nav-item {{Request::is('admin/photography*') ? 'active' : ''}}">
          <a class="nav-link" href="{{route('admin.photography.index')}}">
            <i class="material-icons">camera</i>
            <p>Photography</p>
          </a>
        </li>
        <li class="nav-item {{Request::is('admin/contact') ? 'active' : ''}}">
          <a class="nav-link" href="{{route('admin.contact.index')}}">
            <i class="material-icons">contacts</i>
            <p>Contacts</p>
          </a>
        </li>
        <li class="nav-item {{Request::is('admin/settings') ? 'active' : ''}}">
          <a class="nav-link" href="{{route('admin.settings')}}">
            <i class="material-icons">settings</i>
            <p>Settings</p>
          </a>
        </li>
        @endif

        @if (Request::is('author*'))
        <li class="nav-item  {{Request::is('author/dashboard') ? 'active' : ''}}">
          <a class="nav-link" href="{{route('author.dashboard')}}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item {{Request::is('author/post*') ? 'active' : ''}}">
          <a class="nav-link" href="{{route('author.post.index')}}">
            <i class="material-icons">playlist_add_check</i>
            <p>Post</p>
          </a>
        </li>
        <li class="nav-item {{Request::is('author/comment') ? 'active' : ''}}">
          <a class="nav-link" href="{{route('author.comment.index')}}">
            <i class="material-icons">comments</i>
            <p>Comments</p>
          </a>
        </li>
        <li class="nav-item {{Request::is('author/photography*') ? 'active' : ''}}">
          <a class="nav-link" href="{{route('author.photography.index')}}">
            <i class="material-icons">camera</i>
            <p>Photography</p>
          </a>
        </li>
        
        <li class="nav-item {{Request::is('author/settings') ? 'active' : ''}}">
          <a class="nav-link" href="{{route('author.settings')}}">
            <i class="material-icons">settings</i>
            <p>Settings</p>
          </a>
        </li>
        @endif
      </ul>
    </div>
  </div>