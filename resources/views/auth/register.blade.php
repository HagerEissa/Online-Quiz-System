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
<body data-instant-intensity="mousedown">
<style>
    .login{
        position: relative;
        right: -150px;
        bottom: 33px;
    }
</style>
<section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card shadow border-0 p-5">
                    <div class="row">
                        <div class="col-md-6 d-flex align-items-center">
                            <img src="{{asset('assets/images/Sign up-bro.png')}}" alt="Registration Image" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <h1 class="h3">Register</h1>
                            <form action="{{route('register')}}" method="POST" name="registrationForm" id="registrationForm">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="mb-2">Name*</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
                                    <p></p>
                                </div> 
                                <div class="mb-3">
                                    <label for="" class="mb-2">Email*</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email">
                                    <p></p>
                                </div> 
                                <div class="mb-3">
                                    <label for="" class="mb-2">Password*</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                                    <p></p>
                                </div> 
                                <div class="mb-3">
                                    <label for="" class="mb-2">Confirm Password*</label>
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Please confirm Password">
                                    <p></p>
                                </div> 
                                <button class="btn btn-primary mt-2">Register</button>
                            </form>                    
                            <p class="login">Have an account? <a  href="{{ route('login') }}">Login</a></p>

                        </div>
                    </div>
                </div>
                {{-- <div class="mt-4 text-center">
                    <p>Have an account? <a  href="{{ route('account.login') }}">Login</a></p>
                        </div> --}}
            </div>
        </div>
    </div>
</section>
{{-- <script>
$("#registrationForm").submit(function(e){
    e.preventDefault();

    $.ajax({
        url: '{{ route("processofregister") }}',
        type: 'post',
        data: $("#registrationForm").serializeArray(),
        dataType: 'json',
        success: function(response) {
            if (response.status == false) {
                var errors = response.errors;
                if (errors.name) {
                    $("#name").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback')
                    .html(errors.name)
                } else {
                    $("#name").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')
                }

                if (errors.email) {
                    $("#email").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback')
                    .html(errors.email)
                } else {
                    $("#email").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')
                }

                if (errors.password) {
                    $("#password").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback')
                    .html(errors.password)
                } else {
                    $("#password").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')
                }

                if (errors.confirm_password) {
                    $("#confirm_password").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback')
                    .html(errors.confirm_password)
                } else {
                    $("#confirm_password").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')
                }
            } else {
                $("#name").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('');

                $("#email").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')

                $("#password").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')

                $("#confirm_password").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('');
                    
                window.location.href='{{ route("login") }}';
            }
        }
    });
});
</script> --}}


</body>
</html>