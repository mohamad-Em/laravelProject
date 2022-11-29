<link rel="stylesheet" href="..\css\user-info.css">
<link rel="stylesheet" href="..\css\forms.css">
<link rel="stylesheet" href="..\css\posts.css">
<link rel="stylesheet" href="..\css\main.css">
<link rel="stylesheet" href="..\css\dashboard.css">
<link rel="stylesheet" href="..\css\styling-forms.css">

<div class="container">
    <div class="main-title-sec">
        <h2>all comment:</h2>
    </div>
    @foreach ($commentPosts as $commentPost)
    <div class="content">

        <div class="content-info">
            <div class="label name">
                <span>commentID: {{ $commentPost->commentID }} </span><span>  </span>
            </div>
            <div class="label email">
                <span>Comment Title:{{ $commentPost->commentTitle }} </span><span> </span>
            </div>
            <div class="label email">
                <span>Comment Title:{{ $commentPost->commentDate }} </span><span> </span>
            </div>
            <div class="label name">
                <span>Post Title: {{ $commentPost->postTitle }} </span><span>  </span>
            </div>
            <div class="label fullname">
                <span>Post Descraption: {{ $commentPost->postDecraption }} </span><span> </span>
            </div>

            <div class="label email">
                <span>User Name:{{ $commentPost->userName }} </span><span> </span>
            </div>
            <form action="{{ url('saveReply/'.$commentPost->commentID) }}" method="POST">
                @csrf

                <div class="input-field">
                    <label for="">replyTitle:</label>
                    <input type="text" name="replyTitle">
                </div>
                <div class="input-field">
                    <input class="btn btn-info" type="submit" name="submit" value="reply">
                </div>
            </form>
                <div class="control-btn">
                    <a href="{{ url('deleteComment/'.$commentPost->commentID) }}" class="btn btn-danger">delete</a>

            </div>
        </div>
    </div>

</div>

    @endforeach

    <div class="container">
        <div class="main-title-sec">
            <h2>all Reply:</h2>
        </div>
        @foreach ($replyCommects as $replyCommect)
        <div class="content">

            <div class="content-info">
                <div class="label name">
                    <span>adminName: {{ $replyCommect->adminName }} </span><span>  </span>
                </div>
                <div class="label email">
                    <span>replytTitle:{{ $replyCommect->replyTitle }} </span><span> </span>
                </div>
                <div class="label name">
                    <span>replyDate: {{ $replyCommect->replyDate }} </span><span>  </span>
                </div>
                    <div class="control-btn">
                        <a href="{{ url('deleteReply/'.$replyCommect->replyID) }}" class="btn btn-danger">delete</a>
                </div>
            </div>
        </div>

    </div>

        @endforeach
