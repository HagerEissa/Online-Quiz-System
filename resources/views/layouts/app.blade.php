<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/Home.css">
    <title>Online Quizzes</title>
</head>

<body>
    <!-- Start of loading page -->
    

    <!-- Start of homepage content -->
   
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark  fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <i class="fas fa-brain" style="color: #5BC0BE !important; font-size: 35px;"></i>
                    <!-- Changed to a working icon -->
                    Quizify
                </a>
                @if (Auth::check())
                <p  style="color: #5BC0BE !important; font-size: 25px;position:relative;top:10px;">Hello {{Auth::user()->name}} </p>
                @else
                <p></p>
                @endif
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Categories
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark"
                                aria-labelledby="custom-navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{route('quiz.list')}}">All Categories</a></li>
                            </ul>
                        </li>
                        </li>
                        @if(request()->is('dashboard'))
                            <li class="nav-item">
                            <a class="nav-link" href="#blogs">Blogs</a>
                            </li>
                            @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.contactus')}}">Contact Us</a>
                        </li>
                        @if (Auth::check() && Auth::user()->type !== 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.show') }}">Profile</a>
                        </li>
                    @endif
                    
                        @if (!Auth::check())
                    <a class="btn btn-outline-primary me-2" href="{{ route('login') }}">Login</a>
                @else
                    <li class="nav-item">
                @if (Auth::user()->type == 'admin')
                    <a class="btn btn-outline-primary me-2" href="{{ route('admin.dashboard') }}">Admin</a>
                @else
                    <a class="btn btn-outline-primary me-2" href="{{ route('home') }}">Account</a>
                @endif
                <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST" style="display: inline;color:rgba(240, 255, 255, 0.434)">
                    @csrf
                    <button type="submit" class="nav-link" style="background: none; border: none; color: inherit; cursor: pointer;">Logout</button>
                </form>
                </li>
            </li>
        @endif
                </div>
            </div>
        </nav>

        
            @yield('content')
        
    



    <!-- Footer -->
    
    <!-- end of footer -->

    <!-- Modals -->
    <div class="modal fade" id="loginModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="login-form">
                        <div class="mb-3">
                            <label for="login-email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="login-email" required>
                        </div>
                        <div class="mb-3">
                            <label for="login-password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="login-password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="signupModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sign Up</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="signup-form">
                        <div class="mb-3">
                            <label for="signup-email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="signup-email" required>
                        </div>
                        <div class="mb-3">
                            <label for="signup-password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="signup-password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <!-- end of models -->
{{-- <script>
    window.addEventListener("load", function() {
    // Hide the loading screen and show the main content
    document.getElementById("loading-screen").style.display = "none";
    document.getElementById("background-video").style.display = "none";

    document.getElementById("content").style.display = "block";
    
    // Show the footer after loading completes
    document.querySelector("footer").style.display = "block";
});

</script> --}}
    <!-- Script files -->
    <script src="{{ asset('js/Home.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/contact.js') }}"></script>
    <script src="{{ asset('js/About.js') }}"></script>
    <script src="{{ asset('js/Categories.js') }}"></script>
    <script src="{{ asset('js/Blogs.js') }}"></script>
    <script src="{{ asset('js/QuizList.js') }}"></script>

    
</html>
