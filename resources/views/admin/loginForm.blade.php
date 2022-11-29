<link rel="stylesheet" href="css\main.css">
<link rel="stylesheet" href="css\dashboard.css">
<link rel="stylesheet" href="css\styling-forms.css">

<!-- front end  -->
</head>

<body style="min-height: 100vh; display: flex;
            justify-content: center; align-items: center;
            background-image: url('layout/1.png');
            background-position: top; background-repeat: no-repeat; background-size: cover;" >

        <form class="login-form" action="{{ route('save') }}" method="POST">
            @csrf
            <h2 class="login-title">login</h2>
            <div class="input-field">
                <label for="">Admin Name:</label>
                <input type="email" name="adminEmail">
                @error('adminEmail')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="input-field">
                <label for="">Admin password:</label>
                <input type="password" name="adminPassword">
                @error('adminPassword')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="input-field">
                <input class="btn btn-info" type="submit" name="submit" value="login">
            </div>
        </form>
