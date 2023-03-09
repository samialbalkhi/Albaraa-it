<nav class="navbar navbar-expand-lg navbar-light bg-light">
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('add_brandes')}}">Add Brandes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('product')}}">Add  Product</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('view_section')}}">Add Section</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('about_us')}}">profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('view_bnars')}}">Add bnars</a>
          </li>
      </ul>
    </div>
  </nav>

  @yield("nav")
