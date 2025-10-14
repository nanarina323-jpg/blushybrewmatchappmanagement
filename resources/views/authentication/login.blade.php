<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blushy Brewmatch-Web Application</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/script.js')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">

<!-- Custom css
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">-->

</head>
<body class="bg-light" style="margin:40px;">
    <div class="container d-flex justify-content-center align-items-center min-vh- 90">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px; border-radius: 6px;">
            <h2 class="text-center mb-4 text-primary fw-bold">LOGIN</h2>

            <form action="{{ route('loginProcess') }}" method="POST">
                @csrf

                {{-- Email Field --}}
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input type="email" class="form-control" name="email" id="email" 
                           placeholder="Enter your email" required>
                </div>

                {{-- Password Field --}}
                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input type="password" class="form-control" name="password" id="password" 
                           placeholder="Enter your password" required>
                </div>

                {{-- Error Message (if any) --}}
                @if ($errors->any())
                    <div class="alert alert-danger py-2">
                        {{ $errors->first() }}
                    </div>
                @endif

                {{-- Submit Button --}}
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>

                {{-- Optional: Link --}}
                <div class="text-center mt-3">
                    <a href="#" class="text-decoration-none text-secondary">Forgot your password?</a>
                </div>
            </form>
        </div>
    </div>
<br>
@include('layout.footer')
