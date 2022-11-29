<link rel="stylesheet" href="..\css\main.css">
<link rel="stylesheet" href="..\css\dashboard.css">
<link rel="stylesheet" href="..\css\styling-forms.css">
<div class="container">
    <div class="main-title-sec">
        <h2>Comments:</h2>
    </div>
    @foreach ($showComments as $showComment )


    <div class="content">

        <div class="content-info">
            <div class="label name">
                <span>commentTitle: {{ $showComment->commentTitle }}</span><span>  </span>
            </div>
            <div class="label fullname">
                <span>commentDate: {{ $showComment->commentDate }}</span><span> </span>
            </div>
            <div class="label email">
                <span>userName: {{ $showComment->userName}}</span><span> </span>
            </div>
                <div class="control-btn">
                    <form action="{{ url('saveReplyUser/'.$showComment->commentID) }}" method="POST">
                        @csrf

                        <div class="input-field">
                            <label for="">replyTitle:</label>
                            <input type="text" name="replyTitle">
                        </div>
                        <div class="input-field">
                            <input class="btn btn-info" type="submit" name="submit" value="reply">
                        </div>
                    </form>
            </div>
        </div>
    </div>

</div>
@endforeach
