<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('assets/css/indexPage.css')}}" />
</head>

<style>
    #pass{

        padding-top: 10px;
    }
    #forget{
        position: relative;
        right: 210px;
    }
</style>

<section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>

        @if(Session::has('success'))
        <div class="alert alert-success">
            <p class="mb-0 pb-0">{{ Session::get('success') }}</p>
        </div>
        @endif

        @if(Session::has('error'))
        <div class="alert alert-danger">
            <p class="mb-0 pb-0">{{ Session::get('error') }}</p>
        </div>
        @endif

        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card shadow border-0 p-5">
                    <div class="row">
                        <div class="col-md-6 d-flex align-items-center">
                            
                            <img src="{{ asset('Assets\Images\Computer login-bro.png') }}" alt="Login Image" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <h1 class="h3 mb-3 mt-5">Login</h1>
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="mb-2">Email*</label>
                                    <input type="text" value="{{ old('email') }}" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="example@example.com">
                                    @error('email')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div> 
                                <div class="mb-3 mt-3"  id="pass">
                                    <label for="" class="mb-2">Password*</label>
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password">
                                    @error('password')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div> 
                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="btn btn-primary mt-2">Login</button>
                                    <a id="forget" href="{{ route('password.request') }}" class="mt-3">Forgot Password?</a>
                                </div>
                            </form>                    
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <p>Do not have an account? <a href="{{ route('register') }}">Register</a></p>
                </div>
            </div>
        </div>
        <div class="py-lg-5">&nbsp;</div>
    </div>
</section>


</html>