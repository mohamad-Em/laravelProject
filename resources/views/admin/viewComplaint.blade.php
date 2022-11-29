<link rel="stylesheet" href="..\css\user-info.css">
<link rel="stylesheet" href="..\css\forms.css">
<link rel="stylesheet" href="..\css\posts.css">
<link rel="stylesheet" href="..\css\main.css">
<link rel="stylesheet" href="..\css\dashboard.css">
<link rel="stylesheet" href="..\css\styling-forms.css">

<div class="container">
    <div class="main-title-sec">
        <h2>{{ $viewComplaint[0]->complaintTitle }} Post:</h2>
    </div>
    <div class="content">

        <div class="content-info">
            <div class="label name">
                <span>complaintID: {{ $viewComplaint[0]->complaintID  }}</span><span>  </span>
            </div>
            <div class="label fullname">
                <span>complaintTitle: {{ $viewComplaint[0]->complaintTitle }}</span><span> </span>
            </div>
            <div class="label email">
                <span>complaintDate: {{ $viewComplaint[0]->complaintDate }}</span><span> </span>
            </div>
            <form action="{{ url('replyComplaint',$viewComplaint[0]->complaintID) }}" method="POST">
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
                <a href="{{ url('allComplaints') }}">Back To allComplaints.</a>
            </div>
        </div>
    </div>

</div>
<div class="container">
    <div class="main-title-sec">
        <h2>all Reply:</h2>
    </div>
    @foreach ($replyComs as $replyCom)
    <div class="content">

        <div class="content-info">
            <div class="label name">
                <span>replyID: {{ $replyCom->replyID }} </span><span>  </span>
            </div>
            <div class="label email">
                <span>replytTitle:{{ $replyCom->replyTitle }} </span><span> </span>
            </div>
            <div class="label name">
                <span>replyDate: {{ $replyCom->replyDate }} </span><span>  </span>
            </div>
                <div class="control-btn">
                    <a href="{{ url('deleteReplyComp/'.$replyCom->replyID) }}" class="btn btn-danger">delete</a>
            </div>
        </div>
    </div>

</div>
    @endforeach
