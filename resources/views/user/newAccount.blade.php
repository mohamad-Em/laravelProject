<link rel="stylesheet" href="css\main.css">
<link rel="stylesheet" href="css\dashboard.css">
<link rel="stylesheet" href="css\styling-forms.css">

<!-- front end  -->
</head>

<body style="min-height: 100vh; display: flex;
            justify-content: center; align-items: center;
            background-image: url('layout/1.png');
            background-position: top; background-repeat: no-repeat; background-size: cover;" >

        <form class="login-form" action="{{ route('createAccount') }}" method="POST">
            @csrf
            <h2 class="login-title">new account user</h2>
            <div class="input-field">
                <label for="">user Name:</label>
                <input type="text" name="userName">
                @error('userName')
                    <p>{{ $message }}</p>
                @enderror
            </div>
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
                <label for="">user Fullname:</label>
                <input type="text" name="userFullname">
                @error('userFullname')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="input-field">
                <input class="btn btn-info" type="submit" name="submit" value="create">
            </div>

        </form>
