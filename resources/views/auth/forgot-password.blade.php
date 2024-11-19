@extends('layouts.app')

@section('content')
<style>
    #form{
        position: relative;
        top: 100px;
        height: 400px;
    }
</style>
<main class="flex-grow-1">
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
                <div class="col-md-5">
                    <img style="width: 700px;height:600px;position:relative;top:50px;left:-70px" src="{{asset('assets/images/Forgot password-bro.png')}}" alt="" class="forgot-img">
                </div>
            <div class="col-md-5" id="form">
                <div class="card shadow border-0 p-5" style="height: 480px">
                    <h1 class="h3" style="position: relative;top:50px">Forgot Password</h1>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="mb-3" style="position: relative;top:100px">
                            <label for="" class="mb-2">Email*</label>
                            <input type="text" value="{{ old('email') }}" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="example@example.com">

                            @error('email')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror

                        </div> 
                        
                        <div class="justify-content-between d-flex">
                            <button style="position: relative;top:110px" class="btn btn-primary mt-2">Submit</button>
                        </div>
                    </form>                    
                </div>
                <div class="mt-4 text-center">
                    <p>Do not have an account? <a href="{{ route('login') }}">Back to Login</a></p>
                </div>
            </div>
        </div>
        <div class="py-lg-5">&nbsp;</div>
    </div>
</section>
</main>

@endsection 