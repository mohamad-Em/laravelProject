<link rel="stylesheet" href="css\main.css">
<link rel="stylesheet" href="css\dashboard.css">
<link rel="stylesheet" href="css\styling-forms.css">

<!-- front end  -->
</head>

<body style="min-height: 100vh; display: flex;
            justify-content: center; align-items: center;
            background-image: url('layout/1.png');
            background-position: top; background-repeat: no-repeat; background-size: cover;" >

        <form class="login-form" action="{{ route('saveUser') }}" method="POST">
            @csrf
            <h2 class="login-title">login user</h2>
            <div class="input-field">
                <label for="">user Email:</label>
                <input type="email" name="userEmail">
                @error('userEmail')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="input-field">
                <label for="">user password:</label>
                <input type="password" name="userPassword">
                @error('userPassword')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="input-field">
                <input class="btn btn-info" type="submit" name="submit" value="login">
            </div>
            <div class="input-field">
                <a href="{{ url('newAccount') }}" class="btn btn-info">New Account</a>
            </div>
        </form>
