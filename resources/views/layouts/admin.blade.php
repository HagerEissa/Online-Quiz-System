<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assetsforadmin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}l">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Quizify</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
          
            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="{{route('admin.dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                 <a class="nav-link" href="{{route('admin.students')}}">
                    <i class='bx bx-male-female'></i>                   
                    <span>Students</span>
                </a>
               
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.categories')}}">
                    <i class='bx bxs-add-to-queue' ></i>
                    <span>Categories</span>
                </a>
                
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.quizzes')}}">
                    <i class='bx bxs-add-to-queue' ></i>
                    <span>Quizzes</span>
                </a>
                
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.questions')}}">
                    <i class='bx bx-archive-out' ></i>
                    <span>Questions</span>
                </a>
                
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('display.results')}}">
                    <i class='bx bx-archive-in' ></i>
                    <span>Ranking With Scores</span>
                </a>
                
            </li>
           

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
           

            <!-- Nav Item - Charts -->
            

            <!-- Sidebar Message -->
            <!-- <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                       {{-- notification --}}
                      
                       
                       <ul class="nav">
                        <li class="nav-item nav-notif">
                            <div class="flex">
                                <a class="nav-link text-muted my-2 notificationicon" href="#" data-toggle="modal" data-target=".modal-notif">
                            {{-- @if($unreadNotificationsCount > 0) --}}
                                <i class='bx bx-bell' style="position: relative;top:-8px"></i>
                            {{-- @else
                                <i class='bx bxs-bell'></i>
                            @endif                                           --}}
                            @if(Auth::check() && Auth::user()->type === 'admin')
                            <span class="dot dot-md text-danger" id="notificationiconcounter" >
                                <b>{{ Auth::user()->unreadNotifications->count() }}</b>
                            </span>
                        @endif                                </a>
                            </div>
                            
                        </li>
                    </ul>
                    
                    <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-right" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="notificationsmodal">
                                    @if(Auth::check() && Auth::user()->type === 'admin' && Auth::user()->notifications->count() > 0)
                                    <div class="list-group list-group-flush my-n3">
                                        @foreach(Auth::user()->notifications as $notification)
                                        <div class="list-group-item @if ($notification->unread()) bg-light @else bg-transparent @endif">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="fe fe-box fe-24"></span>
                                                </div>
                                                <div class="col">
                                                    <small><strong>New User Registered</strong></small>
                                                            <div class="my-0 text-muted small">{{ $notification->data['message'] }}</div>
                                                            <small class="badge badge-pill badge-light text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal" onclick="" id="clearnotification">Clear All</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <style>
                        .flex {
                            display: flex;
                        }
                        
                        .modal-dialog.modal-dialog-right {
                            position: fixed;
                            right: 0;
                            top: 0;
                            margin: 0;
                            height: 100%;
                            display: flex;
                            flex-direction: column;
                            justify-content: flex-start;
                            max-width: 300px; /* Adjust width as needed */
                            z-index: 1050;
                        }
                        
                        .modal-backdrop {
                            display: none; /* Hide the backdrop by default */
                        }
                        
                        .modal.show .modal-backdrop {
                            display: none; /* Ensure the backdrop remains hidden when modal is shown */
                        }
                        
                        .modal-content {
                            height: 100%;
                            overflow-y: auto;
                        }
                        
                        .modal.fade.modal-notif .modal-dialog {
                            transition: transform 0.3s ease-out;
                            transform: translateX(100%);
                        }
                        
                        .modal.show.modal-notif .modal-dialog {
                            transform: translateX(0);
                        }
                        </style>


<script>
    $(document).on('click', "#clearnotification", function() {
        $.ajax({
            url: "{{ route('notifications.clear') }}",
            type: "get",
            success: function(data) {
                console.log('kimo');
                // Update the notification icon counter
                $('#notificationiconcounter').html('<b>0</b>');
                // Update the modal content
                $('#notificationsmodal').html('<p>No notifications</p>');
            },
            error: function() {
                alert('Please try again.');
            }
        });
    });
    </script>
                    {{-- notification --}}
                    
                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class='bx bxs-message-alt-detail'></i>                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                               
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <!-- Logout button styled properly -->
                                <form action="{{ route('logout') }}" method="POST" class="m-0">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i> Logout
                                    </button>
                                </form>
                            </div>
                            
                        </li>

                    </ul>
         
                </nav>


                @yield('main')


    <script src="{{asset('assetsforadmin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assetsforadmin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('assetsforadmin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('assetsforadmin/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('assetsforadmin/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('assetsforadmin/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('assetsforadmin/js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>