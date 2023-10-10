<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Socialite Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h3>Login/Register with Social Media</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 m-auto">
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name">Name</label>
                                        <input type="name" name="name" class="form-control">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control">
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control">
                                        @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password_confirmation">Password Confirmation</label>
                                        <input type="password" name="password_confirmation" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button class="btn btn-primary" type="submit">Register</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="google mb-3 text-center">
                            <a href="{{ route('googleLogin') }}" class="btn btn-danger"><i class="fa-brands fa-google-plus"></i> Continue With Google</a>
                        </div>
                        <div class="facebook mb-3 text-center">
                            <a href="{{ route('facebookLogin') }}" class="btn btn-primary"><i class="fa-brands fa-facebook"></i> Continue With Facebook</a>
                        </div>
                        <div class="github mb-3 text-center">
                            <a href="{{ route('githubLogin') }}" class="btn btn-secondary"><i class="fa-brands fa-github"></i> Continue With Github</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>