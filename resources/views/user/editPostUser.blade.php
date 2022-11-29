<link rel="stylesheet" href="css\main.css">
<link rel="stylesheet" href="css\dashboard.css">
<link rel="stylesheet" href="css\styling-forms.css">

<!-- front end  -->
</head>

<body style="min-height: 100vh; display: flex;
            justify-content: center; align-items: center;
            background-image: url('layout/1.png');
            background-position: top; background-repeat: no-repeat; background-size: cover;" >

        <form class="login-form" action="{{ url('updatePostUser/'.$editPostUser[0]->postID) }}" method="POST">
            @csrf
            <h2 class="login-title">add post</h2>
            <div class="input-field">
                <label for="">postTitle:</label>
                <input type="text" name="postTitle" value="{{ $editPostUser[0]->postTitle }}">
            </div>
            <div class="input-field">
                <label for="">postDecraption:</label>
                <input type="text" name="postDecraption" value="{{ $editPostUser[0]->postDecraption }}">
            </div>
            <div class="input-field">
                <input class="btn btn-info" type="submit" name="submit" value="update">
            </div>

        </form>
