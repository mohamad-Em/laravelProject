<link rel="stylesheet" href="..\css\main.css">
<link rel="stylesheet" href="..\css\dashboard.css">
<link rel="stylesheet" href="..\css\styling-forms.css">
<body>
<div class="container">
    <div class="main-title-sec">
        <h2>{{ $viewPostUser[0]->postTitle }} Post:</h2>
    </div>
    <div class="content">

        <div class="content-info">
            <div class="label name">
                <span>postID: {{ $viewPostUser[0]->postID }}</span><span>  </span>
            </div>
            <div class="label fullname">
                <span>postTitle: {{ $viewPostUser[0]->postTitle }}</span><span> </span>
            </div>
            <div class="label email">
                <span>postDecraption: {{ $viewPostUser[0]->postDecraption }}</span><span> </span>
            </div>
            <div class="label email">
                <span>postDate: {{ $viewPostUser[0]->postDate }}</span><span> </span>
            </div>
                <div class="control-btn">
                    <div class="main-title-sec">
                        <h2>add comment:</h2>
                    </div>
                        <form action="{{ route('commentPost',$viewPostUser[0]->postID) }}" method="POST">
                            @csrf
                            <input type="text" name="commentTitle">
                            <input type="submit" name="send" value="comment">
                        </form>
                    </div>
            </div>
        </div>
    </div>

</div>
<div class="control-btn">
    <div class="main-title-sec">
        <h2>all comment:</h2>
    </div>
        @foreach ($allCommentPosts as $allCommentPost )
        <div class="content">

            <div class="content-info">
                <div class="label name">
                    <span>commentTitle: {{ $allCommentPost->commentTitle }}</span><span>  </span>
                </div>
                <div class="label fullname">
                    <span>commentDate: {{ $allCommentPost->commentDate }}</span><span> </span>
                </div>
                <div class="label fullname">
                    <span>commentDate: {{ $allCommentPost->userName }}</span><span> </span>
                </div>
        @if( $allCommentPost->userID == Session::get('ID'))
        <a href="{{ url('deleteMyComment/'. $allCommentPost->commentID) }}">Delete</a><br><br>

        @else

        @endif
        @endforeach
