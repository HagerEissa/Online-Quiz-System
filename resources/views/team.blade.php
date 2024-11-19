<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="{{asset('css/Home.css')}}">
    <title>Contact Us</title>
    {{-- <link rel="stylesheet" href="style.css"> --}}
</head>

<body>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
}

.contact-us {
    text-align: center;
    padding: 50px;
}

h1 {
    font-size: 2.5rem;
    margin-bottom: 20px;
    color: #333;
    color: #007bff;
}

.card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.card {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 220px;
    /* Smaller card width */
    text-align: center;
    overflow: hidden;
    padding: 20px;
    transition: transform 0.3s;
}

.card:hover {
    transform: translateY(-10px);
}

.card img {
    width: 100px;
    /* Smaller image */
    height: 100px;
    object-fit: cover;
    border-radius: 50%;
    /* Makes the image circular */
    margin-bottom: 10px;
    margin-left: 33px;
}

.card-content {
    padding: 10px 0;
}

.card-content h2 {
    font-size: 1.2rem;
    margin-bottom: 5px;
}

.card-content p {
    margin-bottom: 5px;
    color: #666;
}

/* Responsive design */
@media (max-width: 768px) {
    .card-container {
        flex-direction: column;
        align-items: center;
    }
}


/* Navbar styles */
.navbar {
    transition: all 0.3s ease;
    padding: 1rem;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    background-color: #f8f9fa;
    backdrop-filter: blur(10px);
    width: 100%;
}

.navbar-brand {
    font-weight: bold;
    font-size: clamp(1.2rem, 2vw, 1.5rem);
    color: #007bff;
}

.navbar-brand:hover,
.navbar-brand:focus {
    color: #007bff !important;
}

.nav-item {
    color: #343a40;
}

.dropdown-toggle::after {
    display: none !important;
}

.nav-link,
.navbar-nav .dropdown-toggle {
    position: relative;
    margin: 0 0.5rem;
    color: #343a40 !important;
    text-decoration: none;
    font-size: clamp(0.9rem, 1.5vw, 1rem);
}

.navbar-toggler {
    background-color: #007bff;
}

.nav-link::before,
.navbar-nav .dropdown-toggle::before {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: -2px;
    left: 0;
    background-color: #007bff;
    transition: width 0.3s ease;
}

.nav-link:hover::before,
.navbar-nav .dropdown-toggle:hover::before {
    width: 100%;
}

.nav-link:hover,
.navbar-nav .dropdown-toggle:hover {
    color: #007bff !important;
}

.nav-link.active,
.navbar-nav .dropdown-toggle.active {
    color: #007bff !important;
}

.nav-link.active::before,
.navbar-nav .dropdown-toggle.active::before {
    width: 100%;
}

/* Dropdown menu styling */
.dropdown-menu {
    border: none;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    background-color: white;
    color: blue;
    padding: 0.5rem 0;
}

.dropdown-item {
    color: #343a40 !important;
    padding: 0.5rem 1.5rem;
    transition: all 0.3s ease;
    font-size: clamp(0.9rem, 1.5vw, 1rem);
}

.dropdown-item:hover,
.dropdown-item:active,
.dropdown-item:focus {
    background-color: #007bff;
    color: white !important;
}
</style>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark  fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-brain" style="color: #5BC0BE !important; font-size: 35px;"></i>
                <!-- Changed to a working icon -->
                Quizify
            </a>
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
                        <a class="nav-link dropdown-toggle" href="{{route('quiz.list')}}" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark"
                            aria-labelledby="custom-navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{route('quiz.list')}}">All Categories</a></li>
                        </ul>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#blogs">Blogs</a>
                    </li>
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
    <!-- End of Navbar -->

    <section class="contact-us">
        <h1 style="margin-top: 50px;">Contact Us</h1>
        <div class="card-container">
            <!-- Card 1 -->
            <div class="card">
                <img src="{{asset('Assets/Images/photo_5818921697095567775_y.jpg')}}" alt="Person 1">
                <div class="card-content">
                    <h2>Ahmed Atef</h2>
                    <p>Front-end</p>
                    <p>Email: ahmedatef@gmail.com</p>
                    <p>Phone: 01118551826</p>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="card">
                <img src="{{asset('Assets/Images/WhatsApp Image 2024-10-22 at 10.56.43 PM.jpeg')}}" alt="Person 2">
                <div class="card-content">
                    <h2>Ahmed Yahia</h2>
                    <p>Front-end</p>
                    <p>Email: ahmedYahia@gmail.com</p>
                    <p>Phone: 01122002015</p>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="card">
                <img src="{{asset('Assets/Images/WhatsApp Image 2024-10-22 at 11.09.55 PM.jpeg')}}" alt="Person 3">
                <div class="card-content">
                    <h2>Kareem Amr</h2>
                    <p>Back-end</p>
                    <p>Email: Kareem@gmail.com</p>
                    <p>Phone: 01140962420</p>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="card">
                <img src="{{asset('Assets/Images/team-4.jpg')}}" alt="Person 5">
                <div class="card-content">
                    <h2>Hager Salah</h2>
                    <p>Back-end</p>
                    <p>Email: Hager@gmail.com</p>
                    <p>Phone: (123) 777-7890</p>
                </div>
            </div>
        
        <!-- Card 5 -->
        <div class="card">
            <img src="{{asset('Assets/Images/s4.jpg')}}" alt="Person 4">
            <div class="card-content">
                <h2>Mariam Ahmed</h2>
                <p>Front-end</p>
                <p>Email: Mariam@gmail.com</p>
                <p>Phone: (123) 888-7890</p>
            </div>
        </div>
    </div>
    </section>
    <footer style="background-color: white;" class="footer">
        <!-- Start Middle Top -->
        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-5 col-12">
                        <!-- Single Widget -->
                        <div class="f-about single-footer">
                            <div class="logo">
                                <a class="navbar-brand" href="#">
                                    <i class="fas fa-brain" style="color: #5BC0BE !important; font-size: 35px;"></i>
                                    <!-- Changed to a working icon -->
                                    Quizify
                                </a>
                            </div>
                            <p style="font-family: sans-serif; font-size: revert;">no one belives in you lost agian
                                and agian and agian the lights are cut off but you
                                still looking for at the dreams
                                reivew every day and say your self it is not over until i win.</p>
                            <div style="margin-top: 20px; position: relative; left: -25px;" class="footer-social">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="#"><i class='bx bxl-twitter'></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-5 col-md-7 col-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-6">
                                <!-- Single Widget -->
                                <div class="single-footer f-link">
                                    <h3>Company</h3>
                                    <ul style="font-family: sans-serif; font-size: revert;">
                                        <li><a href="#">About Comapny</a></li>
                                        <li><a href="#">World Wide Clients</a></li>
                                        <li><a href="#">Happy People’s</a></li>
                                        <li><a href="#">Winning Awards</a></li>
                                        <li><a href="#">Company Statics</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                    </ul>
                                </div>
                                <!-- End Single Widget -->
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <!-- Single Widget -->
                                <div class="single-footer f-contact f-link">
                                    <h3>Contact Us</h3>
                                    <p style="font-family: sans-serif; font-size: revert;">Untrammelled & nothing
                                        preven our being able</p>
                                    <ul class="footer-contact">
                                        <li><i class="fa-solid fa-phone"></i><a href="#">01118551826</a></li>
                                        <li><i class="fa-regular fa-envelope"></i> <a
                                                href="mailto:support@gmail.com">support@gmail.com</a></li>
                                        <li><i class="fa-solid fa-location-dot"></i> Egypt_Cairo </li>
                                        <li><i class="fa-solid fa-globe"></i><a href="#">www.Quizify.com</a></li>
                                    </ul>
                                </div>
                                <!-- End Single Widget -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer gallery">
                            <h3>Instagram Feed</h3>
                            <ul class="list">
                                <li><a href="#"><img src="{{asset('Assets/Images/photo_5863754412567151427_m.jpg')}}">
                                <li><a href="#"><img src="{{asset('Assets/Images/photo_5863754412567151428_m.jpg')}}">
                                <li><a href="#"><img src="{{asset('Assets/Images/photo_5863754412567151429_m.jpg')}}">
                                <li><a href="#"><img src="{{asset('Assets/Images/photo_5863754412567151430_m.jpg')}}">
                                <li><a href="#"><img src="{{asset('Assets/Images/photo_5863754412567151431_m.jpg')}}">
                                <li><a href="#"><img src="{{asset('Assets/Images/photo_5863754412567151428_m.jpg')}}">
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Footer Middle -->
    </footer>

    <script src="script.js"></script>
</body>

</html>