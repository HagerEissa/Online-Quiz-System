
@extends('layouts.app')

@section('content')
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
          <style>
            .img-icon{
                height: 570px;
            }
            #container{
                margin-top: 50px;
            }
            #form-container {
                height: 485px;
                overflow-y: auto;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }
          </style>
        <div class="row d-flex justify-content-center align-items-center" >
            <div class="col-md-6">
                <img class="img-icon" src="{{asset('Assets/Images/6325247.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="col-md-6" id="container">
                <div id="form-container" class="card shadow border-0 p-5" >
                    <h1 class="h3">Reset Password</h1>
            <form method="POST" action="{{ route('password.store') }}">
                 @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" style="width: 450px;position:relative;left:30px" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" style="width: 450px;" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" style="width: 450px; position:relative;left:70px" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button style="background-color: rgba(166, 170, 168, 0.616)">
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
@endsection
