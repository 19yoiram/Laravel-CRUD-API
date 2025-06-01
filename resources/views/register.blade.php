
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register</title>
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
                                        <div class="mb-5">
                                            <h4 class="text-center">Register</h4>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{route('account.processRegister')}}" method="post">
                                    @csrf
                                    <div class="row gy-3 overflow-hidden">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name:</label>
                                                <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" placeholder="Name" >
                                                @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="age" class="form-label">Age:</label>
                                                <input type="age" class="form-control" name="age" id="age" value="{{old('age')}}" placeholder="Age" >
                                                @error('age')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="gender" class="form-label">Gender:</label>
                                                <select name="gender" id="gender" class="form-select">
                                                <option value="Select Gender"></option>
                                                <option value="female" {{old('gender')== 'female' ? 'selected' : ''}}>Female</option>
                                                <option value="male" {{old('gender')== 'male' ? 'selected' : ''}}>Male</option>
                                                <option value="other" {{old('gender') == 'other' ? 'selected' : ''}}>Other</option>
                                            </select>
                                                @error('gender')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="dob" class="form-label">Date of Birth:</label>
                                                 <input type="date" name="dob" id="dob" class="form-control" value="{{old('dob')}}">
                                                @error('dob')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email:</label>
                                                <input type="text" class="form-control" name="email" id="email" value="{{old('email')}}" placeholder="name@example.com" >
                                                @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address:</label>
                                                <input type="text" class="form-control" name="address" id="address" value="{{old('address')}}" placeholder="Address" >
                                                @error('address')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="State" class="form-label">State:</label>
                                                <input type="text" class="form-control" name="state" id="state" value="" placeholder="State" >
                                                @error('state')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="country" class="form-label">Country:</label>
                                                <input type="text" class="form-control" name="country" id="country" value="" placeholder="Country" >
                                                @error('country')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password:</label>
                                                <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" >
                                                @error('password')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Confirm Password:</label>
                                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="" placeholder="Confirm Password" >
                                                 {{-- @error('password_confirmation')
                                                 <span class="text-danger">{{$message}}</span>
                                                 @enderror --}}
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button class="btn bsb-btn-xl btn-primary py-3" type="submit">Register Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-12">
                                        <hr class="mt-5 mb-4 border-secondary-subtle">
                                        <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-center">
                                            <a href="{{route('account.login')}}" class="link-secondary text-decoration-none">Click here to login</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
