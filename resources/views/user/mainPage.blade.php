<link rel="stylesheet" href="css\dashboard.css">
<link rel="stylesheet" href="css\main.css">
<body>
@if(Session::get('ID'))
<div class="container">
    <div class="header-sec">
        <div class="icon"><i class="fas fa-bars"></i></div>
        <a href="{{ route('logoutUser') }}" class="logut-btn">
            logout<i class="fas fa-sign-out-alt"></i>
        </a>
    </div>
    <div class="main-title-sec">
        <h2>{{ Session::get('Name') }} dashboard: </h2>
    </div>
    <div class="card-container">
        <a href="{{ route('userInfo') }}" class="card">
            <i class="card-icon fas fa-running"></i>
            <span class="name">my information</span>
            <span class="num">

            </span>
        </a>
        <a href="{{ route('allUser') }}" class="card">
            <i class="card-icon fas fa-running"></i>
            <span class="name">all users  </span>
            <span class="num">

            </span>
        </a>
        <a href="{{ route('allPostsUser') }}" class="card">
            <span><i class="card-icon fas fa-user"></i></span>
            <span class="name">all posts</span>
            <span class="num">

            </span>
        </a>


    </div>


@else
<?php
return view('admin.loginForm');
?>
@endif

