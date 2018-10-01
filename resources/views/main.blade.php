<!doctype html>
<html>


    <head>
        @include('partials._head')
        @yield('stylesheet')
    </head>

   
    <body>


	
        @include('partials._nav')

        <div class="container"><!-- Start of Container -->



            @include('partials._message')

        	@yield('content')

        	@include('partials._footer')

        </div><!-- End of Container -->

        @include('partials._javascript')
       
                   
    </body>


</html>
