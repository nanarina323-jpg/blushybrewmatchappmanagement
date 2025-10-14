<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('image/favicon.png') }}">

    <title>Blushy Brewmatch-Web Application</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/script.js')}}">
    <link rel="stylesheet" href="{{asset('assets/style2.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


<!-- Custom css
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">-->

</head>
<body>

<nav class="navbar navbar-expand-lg" style="background-color:#1e1e2f; padding:10px;">
  <div class="container-fluid d-flex justify-content-between align-items-center">

    <!-- Left Side: Menu Links -->
    <ul class="navbar-nav d-flex flex-row mb-0">
      <li class="nav-item me-3">
        <a class="nav-link {{ request()->routeIs('drinkflavour*') ? 'active-link' : '' }}" 
           href="{{ route('drinkflavour.index') }}"> Flavour Drink
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('category*') ? 'active-link' : '' }}" 
           href="{{ route('category.index') }}">Category Drink
        </a>
      </li>
    </ul>

    <!-- Right Side: User Info & Dropdown -->
    <div class="d-flex align-items-center">
      @if(Auth::check())
        <p class="mb-0 me-3" style="color:white;">
          <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
        </p>
      @endif

      <div class="nav-item dropdown">
        <button class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-gear"></i> Setting
        </button>
        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
          <li>
            <a class="dropdown-item" href="#">
              <i class="bi bi-person-fill"></i> Profile
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="#"
               onclick="event.preventDefault(); 
                        if (confirm('Are you sure you want to logout?')) { 
                          document.getElementById('logout-form').submit(); 
                        }">
              <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="post" style="display:none;">
              @csrf
            </form>
          </li>
        </ul>
      </div>
    </div>

  </div>
</nav>

<br>
    <div class="container">
        <h2 style="color:black; font-weight:bold; text-align:center;">BLUSHY BREWMATCH - APP MANAGEMENT</h2>
        <br>   
