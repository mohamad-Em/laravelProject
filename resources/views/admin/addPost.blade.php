<link rel="stylesheet" href="..\css\main.css">
<link rel="stylesheet" href="..\css\dashboard.css">
<link rel="stylesheet" href="..\css\styling-forms.css">

<!-- front end  -->
</head>

<body style="min-height: 100vh; display: flex;
            justify-content: center; align-items: center;
            background-image: url('layout/1.png');
            background-position: top; background-repeat: no-repeat; background-size: cover;" >

        <form class="login-form" action="{{ route('savePost',$ID) }}" method="POST">
            @csrf
            <h2 class="login-title">add post</h2>
            <div class="input-field">
                <label for="">post title:</label>
                <input type="text" name="postTitle">
                @error('postTitle')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="input-field">
                <label for="">post decraption:</label>
                <input type="text" name="postDecraption">
                @error('postDecraption')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="input-field">
                <input class="btn btn-info" type="submit" name="submit" value="save">
            </div>
        </form>
