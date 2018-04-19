<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <div class="navbar-brand">
          <a href="{{ url('/') }}" >
            <span class="glyphicon glyphicon-home "></span></a>
           <span class="text h3">Penchala PetShop</span></div>
          
        </div>
        @guest
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form" method="POST" action="{{route('login')}}">
            {{ csrf_field() }}
            <div class="form-group">
              <input name="email" type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input name="password" type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success glyphicon glyphicon-log-in" data-toggle="tooltip" title="Log In"></button>
            <a href="{{ route('password.request') }}">
          <span class="glyphicon glyphicon-log-out"  data-toggle="tooltip" title="Forgot Password"></span>
          </a>
          </form>
          
        </div><!--/.navbar-collapse -->
        @else
          <div class="navbar-brand text-right navbar-right">
            Selamat Datang, {{ Auth::user()->name }}
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">

                <span class="glyphicon glyphicon-log-out"  data-toggle="tooltip" title="Log Out"></span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
            </div>
        @endguest
      </div>
    </nav>