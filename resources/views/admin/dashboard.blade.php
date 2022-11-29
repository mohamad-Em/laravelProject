<link rel="stylesheet" href="css\dashboard.css">
<link rel="stylesheet" href="css\main.css">
<body>

<div class="container">
    <div class="header-sec">
        <div class="icon"><i class="fas fa-bars"></i></div>
        <a href="{{ route('logout') }}" class="logut-btn">
            logout<i class="fas fa-sign-out-alt"></i>
        </a>
    </div>
    <div class="main-title-sec">
        <h2>dashboard:</h2>
    </div>
    <div class="card-container">
        <a href="{{ route('myInfo') }}" class="card">
            <i class="card-icon fas fa-running"></i>
            <span class="name">my information</span>
            <span class="num">

            </span>
        </a>
        <a href="{{ route('users') }}" class="card">
            <i class="card-icon fas fa-running"></i>
            <span class="name">all users  </span>
            <span class="num">

            </span>
        </a>
        <a href="{{ route('allPosts') }}" class="card">
            <span><i class="card-icon fas fa-user"></i></span>
            <span class="name">all posts</span>
            <span class="num">

            </span>
        </a>
        <a href="{{ url('allComplaints') }}" class="card">
            <span><i class="card-icon fas fa-user-md"></i></span>

            <span class="name">all complaints</span>
            <span class="num">

            </span>
        </a>

    </div>



