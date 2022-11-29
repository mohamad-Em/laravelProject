<link rel="stylesheet" href="..\css\main.css">
<link rel="stylesheet" href="..\css\dashboard.css">
<link rel="stylesheet" href="..\css\styling-forms.css">

<div class="container">
    <div class="main-title-sec">
        <h2>Message:</h2>
    </div>
    <div class="content">

        <div class="content-info">
            <div class="label name">
                <span>messageID: {{ $viewMessage[0]->messageID }}</span><span>  </span>
            </div>
            <div class="label fullname">
                <span>messageTitle: {{ $viewMessage[0]->messageTitle }}</span><span> </span>
            </div>
            <div class="label fullname">
                <span>messageDate: {{ $viewMessage[0]->messageDate }}</span><span> </span>
            </div>

                <div class="control-btn">
                    <div class="main-title-sec">
                        <h2>add reply:</h2>

                        <form action="{{ route('replyMessage',$viewMessage[0]->messageID) }}" method="POST">
                            @csrf
                            <input type="text" name="replyTitle">
                            <input type="submit" name="send" value="reply">
                        </form>
                    </div>
            </div>
        </div>
    </div>

</div>

<div class="main-title-sec">
    <h2>Reply:</h2>
    @foreach ($viewReplyMessages as $viewReplyMessage)
    <div class="content">

        <div class="content-info">
            <div class="label name">
                <span>replyID: {{ $viewReplyMessage->replyID }}</span><span>  </span>
            </div>
            <div class="label fullname">
                <span>replyTitle: {{ $viewReplyMessage->replyTitle }}</span><span> </span>
            </div>
            <div class="label fullname">
                <span>replyDate: {{ $viewReplyMessage->replyDate }}</span><span> </span>
            </div>
            <div class="label fullname">
                <a href="{{ url('deleteReplyMessage/'.$viewReplyMessage->replyID) }}">delete</a>
            </div>
</div>

    @endforeach
