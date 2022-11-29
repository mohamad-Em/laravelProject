<link rel="stylesheet" href="css/user-info.css">
<link rel="stylesheet" href="css/forms.css">
<link rel="stylesheet" href="css/posts.css">
<div class="container">
    <div class="main-title-sec">
        <h2>my information:</h2>
    </div>
    <div class="content">

        <div class="content-info">
            <div class="label name">
                <span>name: {{ Session::get('Name') }}</span><span>  </span>
            </div>
            <div class="label fullname">
                <span>full name: {{ Session::get('Fullname') }}</span><span> </span>
            </div>
            <div class="label email">
                <span>email: {{ Session::get('Email') }}</span><span> </span>
            </div>

                <div class="control-btn">
                    <a href="{{ url('editAdmin/'.Session::get('ID')) }}" class="btn btn-danger">edit info</a>

            </div>
        </div>
    </div>

</div>
<br>
<div class="main-title-sec">
    <h2>my Posts:</h2>
    <div class="control-btn">
        <a href="{{ url('addPost/'.Session::get('ID')) }}" class="btn btn-info" align='right'>addPost</a>
    </div>

                @foreach ($adminPosts as $adminPost)
                <div class="content">
                    <div class="content-info">
                        <div class="label name">
                <div class="label name">
                    <span>postID: {{ $adminPost->postID }}</span><span>  </span>
                </div>
                <div class="label name">
                    <span>postTitle: {{ $adminPost->postTitle }}</span><span>  </span>
                </div>
                <div class="label name">
                    <span>postDecraption: {{ $adminPost->postDecraption }}</span><span>  </span>
                </div>
                <div class="label name">
                    <span>postDate: {{ $adminPost->postDate }}</span><span>  </span>
                </div>
                <br>
                <div class="control-btn">
                    <a href="{{ url('commentsPost/'.$adminPost->postID) }}" class="btn btn-info">Comments</a>
                    <a href="{{ url('deletePostAdmin/'.$adminPost->postID) }}" class="btn btn-primary">Delete</a>
                </div>

            </div>
        </div>
    </div>
@endforeach
<div class="container">
    <div class="main-title-sec">
        <h2>my news:</h2>
        <div class="control-btn">
            <a href="{{ url('addNews/'.Session::get('ID')) }}" class="btn btn-info" align='right'>addNews</a>
        </div>
    </div>
    @foreach ($adminNewss as $adminNews)
    <div class="content">
        <div class="content-info">
            <div class="label name">
    <div class="label name">
        <span>newsID: {{ $adminNews->newsID }}</span><span>  </span>
    </div>
    <div class="label name">
        <span>newsTitle: {{ $adminNews->newsTitle }}</span><span>  </span>
    </div>
    <div class="label name">
        <span>newsDescraption: {{ $adminNews->newsDescraption }}</span><span>  </span>
    </div>
    <div class="label name">
        <span>newsDate: {{ $adminNews->newsDate }}</span><span>  </span>
    </div>
    <br>
    <div class="control-btn">
        <a href="{{ url('commentsNews/'.$adminNews->newsID) }}" class="btn btn-info">Comments</a>
        <a href="{{ url('deleteNews/'.$adminNews->newsID) }}" class="btn btn-primary">Delete</a>
    </div>

</div>
</div>
</div>
@endforeach


