<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href="{{asset('main.css')}}">
    <link href="{{asset('bootstrap-5.0.2-dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                 {{-- <ion-icon class="iconFootball1" name="ticket-outline"></ion-icon>
               <ion-icon class="iconFootball2" name="ticket-outline"></ion-icon>
               <ion-icon class="iconFootball3" name="ticket-outline"></ion-icon> --}}
               Sport
            </a>
         <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="navbar-collapse collapse" id="navMenu">
            <!-- <ul class="navbar-nav">
                <li class='nav-item'><a href='index.php' class='nav-link fw-bolder'>Bright Iptv</a></li>                
                   </ul> -->
            <ul class="navbar-nav ms-auto">
      @if(route('index') === url()->current())
            <li class='nav-item'><a href='/' class='nav-link active'>Home</a></li>  
            @else
            <li class='nav-item'><a href='/' class='nav-link'>Home</a></li>  
            @endif

         @if(session()->has('id_cart'))
                  {{-- for the admin  --}}
                  @if(session('isAdmin')==1)

                  @if(route('Stadium') === url()->current() || route('FormStaduim')===url()->current())

                  <li class='nav-item'><a href='Stadium' class='nav-link active'>Stadiums</a></li>       
@else
<li class='nav-item'><a href='Stadium' class='nav-link'>Stadiums</a></li>       

                  @endif

                  @if(route('location') === url()->current())

                  <li class='nav-item'><a href='location' class='nav-link active'>Locations</a></li>       
@else
<li class='nav-item'><a href='location' class='nav-link'>Locations</a></li>       

                  @endif

                  @if(route('listTypeLocation') === url()->current())

                  <li class='nav-item'><a href='listTypeLocation' class='nav-link active'>Type Location</a></li>       
@else
<li class='nav-item'><a href='listTypeLocation' class='nav-link'>Type Location</a></li>       

                  @endif

                  @endif
                  {{-- for the admin  --}}
         
         @if(route('SignIn') === url()->current())
            <li class='nav-item'><a href='login.php' class='nav-link active'>{{session('first_name')}} {{session('last_name')}}</a></li>       
        @else
            <li class='nav-item'><a href='SignIn' class='nav-link'> {{session('first_name')}} {{session('last_name')}}</a></li>       
         @endif
         @if(route('LogIn')===url()->current())
            <li class='nav-item'><a href='logOut' class='nav-link active'>Log Out</a></li>       
         @else
         <li class='nav-item'><a href='logOut' class='nav-link'>Log Out</a></li>       
         @endif
         @else
         @if(route('SignIn') === url()->current())
            <li class='nav-item'><a href='login.php' class='nav-link active'>Sign In</a></li>       
        @else
            <li class='nav-item'><a href='SignIn' class='nav-link'> Sign In</a></li>       
         @endif
         @if(route('LogIn')===url()->current())
            <li class='nav-item'><a href='LogIn' class='nav-link active'>Login</a></li>       
         @else
         <li class='nav-item'><a href='LogIn' class='nav-link'>Login</a></li>       
         @endif
         @endif            
            </ul>
         </div>
    </div>
    </nav>

    @yield('content')
    <script src="{{asset('bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('main.js')}}"></script>
</body>
</html>