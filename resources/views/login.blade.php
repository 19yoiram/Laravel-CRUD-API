<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <section class=" p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                    <div class="card border border-light-subtle rounded-4">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    @if ($errors->has('error'))
                                        <div class="text-danger">
                                            {{ $errors->first('error') }}
                                        </div>
                                    @endif
                                    <div class="mb-5">
                                        <h4 class="text-center">Login</h4>
                                    </div>
                                </div>
                            </div>
                            <form id="loginForm" >
                                @csrf
                                <div class="row gy-3 overflow-hidden">
                                    <div class="col-12">
                                        @if (Session::has('success'))
                                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                                        @endif

                                        @if (Session::has('error'))
                                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                        @endif
                                        <div class=" mb-3">
                                            <label for="email" class="form-label">Email:</label>
                                            <input type="text" class="form-control" name="email" id="email"
                                                value="{{ old('email') }}" placeholder = "name@example.com">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password:</label>
                                            <input type="password" class="form-control" name="password" id="password"
                                                value="" placeholder="Password">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button id="loginButton" class="btn bsb-btn-xl btn-primary py-3"
                                                type="submit">Log in
                                                now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12">
                                    <hr class="mt-5 mb-4 border-secondary-subtle">
                                    <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-center">
                                        <a href="{{ route('account.register') }}"
                                            class="link-secondary text-decoration-none">Create new account</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#loginButton").on('click', function(event) {
                event.preventDefault();

                const email = $("#email").val();
                const password = $("#password").val();

                $.ajax({
                    url: '/api/auth/login',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        email: email,
                        password: password,
                    }),
                    success: function(response) {
                    console.log(response);
                    localStorage.setItem('token',response.authorization.token);
                    window.location.href = "{{route('products.index')}}"; 
                    
    
                    },
                    error: function(xhr,status,error){
                        alert('Error:' + xhr.responseText);

                    }
                  
                });
            });
        });
    </script>
</body>

</html>
