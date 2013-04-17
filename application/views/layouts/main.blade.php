<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>MyApp</title>
        {{ Asset::styles() }}
        {{ Asset::scripts() }}
    </head>
 
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="home">MyApp</a>
                     
                    <!-- <div class="nav-collapse"> -->
                        <!-- <ul class="nav"> -->
                            @section('navigation')
                            <!-- <li class="active"><a href="home">Home</a></li> -->
                            <!-- <li class="active"><a href="about">About</a></li> -->
                            <!-- <li class="active"><a href="developer">Developer</a></li> -->
                            @yield_section
                        <!-- </ul> -->
                    <!-- </div> -->

                    <!-- /.nav-collapse -->
                </div>
            </div>
        </div>
 
        <div class="container">
            @yield('content')
            <hr>
            <footer>
            <p>&copy;MyApp 2013</p>
            </footer>
        </div> <!-- /container -->
    </body>
</html>