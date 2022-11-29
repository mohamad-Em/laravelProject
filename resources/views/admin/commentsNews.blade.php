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
    @foreach ($commentNewss as $commentNews)
    @if(count($commentNews) > 0)

    @else

    @endif
    <div class="content">
        <div class="main-title-sec">
            <h2> commentsNumber {{ $commentNews->commentID }}:</h2>
        </div>
        <div class="content-info">
            <div class="label name">
                <span>commentID: {{ $commentNews->commentID }} </span><span>  </span>
            </div>
            <div class="label email">
                <span>Comment Title:{{ $commentNews->commentTitle }} </span><span> </span>
            </div>
            <div class="label email">
                <span>Comment Title:{{ $commentNews->commentDate }} </span><span> </span>
            </div>
            <div class="label name">
                <span>newsTitle: {{ $commentNews->newsTitle }} </span><span>  </span>
            </div>
            <div class="label fullname">
                <span>newsDescraption: {{ $commentNews->newsDescraption }} </span><span> </span>
            </div>

            <div class="label email">
                <span>User Name:{{ $commentNews->userName }} </span><span> </span>
            </div>
            <form action="{{ url('saveReplyNews/'.$commentNews->commentID) }}" method="POST">
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
                    <a href="{{ url('deleteComment/'.$commentNews->commentID) }}" class="btn btn-danger">delete</a>

            </div>
        </div>
    </div>

</div>
<div class="container">
    <div class="main-title-sec">
        <h2>all Reply:</h2>
    </div>
    @foreach ($replyNewss as $replyNews)
    <div class="content">

        <div class="content-info">
            <div class="label name">
                <span>adminName: {{ $replyNews->adminName }} </span><span>  </span>
            </div>
            <div class="label email">
                <span>replytTitle:{{ $replyNews->replyTitle }} </span><span> </span>
            </div>
            <div class="label name">
                <span>replyDate: {{ $replyNews->replyDate }} </span><span>  </span>
            </div>
                <div class="control-btn">
                    <a href="{{ url('deleteReply/'.$replyNews->replyID) }}" class="btn btn-danger">delete</a>
            </div>
        </div>
    </div>

</div>
    @endforeach
    @endforeach
