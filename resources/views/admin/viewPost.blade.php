<link rel="stylesheet" href="..\css\user-info.css">
<link rel="stylesheet" href="..\css\forms.css">
<link rel="stylesheet" href="..\css\posts.css">
<link rel="stylesheet" href="..\css\main.css">
<link rel="stylesheet" href="..\css\dashboard.css">
<link rel="stylesheet" href="..\css\styling-forms.css">

<div class="container">
    <div class="main-title-sec">
        <h2>{{ $viewPost[0]->postTitle }} Post:</h2>
    </div>
    <div class="content">

        <div class="content-info">
            <div class="label name">
                <span>postID: {{ $viewPost[0]->postID }}</span><span>  </span>
            </div>
            <div class="label fullname">
                <span>postTitle: {{ $viewPost[0]->postTitle }}</span><span> </span>
            </div>
            <div class="label email">
                <span>postDecraption: {{ $viewPost[0]->postDecraption }}</span><span> </span>
            </div>
            <div class="label email">
                <span>postDate: {{ $viewPost[0]->postDate }}</span><span> </span>
            </div>
                <div class="control-btn">
                <a href="{{ url('allPosts') }}">Back To allPost</a>
            </div>
        </div>
    </div>

</div>
