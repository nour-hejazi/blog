<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 20px">

    <a class="navbar-brand" href="/">BLog</a>
 
  	<div class="collapse navbar-collapse" id="navbarNavDropdown">

    	<ul class="navbar-nav">

      		<li class="nav-item {{ Request::is('/') ? 'active' : '' }}">

        		<a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>

      		</li>

            <li class="nav-item {{ Request::is('blog') ? 'active' : '' }}">

                <a class="nav-link" href="/blog">Blog <span class="sr-only">(current)</span></a>

            </li>

      	     <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">

        		<a class="nav-link" href="/about">About</a>

      		</li>

      		<li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">

        		<a class="nav-link" href="/contact">Contact</a>

      		</li>

          
          @if(Auth::check())
        		<li class="nav-item dropdown ">

          		    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            			Hi {{ ucfirst(Auth::user()->name) }}

          		    </a>

          	        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

  				      <a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a>



              <a class="dropdown-item" href="{{ route('tags.index') }}">Tags</a>

  		        

                        {!! Form::open(array('route' => 'logout')) !!}
                    <a href="">

                        {{ Form::submit('Logout', array('class' => 'form-control btn btn-default')) }}
                  </a>
<!--   	             	<a class="dropdown-item" href="{{ route('logout') }}">Logout</a> -->
                
                
                {!! Form::close() !!}
          		</div>

        		</li>
          @else
          
          

          
            <a href="{{ route('login') }}" class="nav-link ">Login</a>
          
          
          @endif

    	</ul>
  	</div>

</nav>


