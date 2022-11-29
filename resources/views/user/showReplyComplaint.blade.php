<link rel="stylesheet" href="..\css\main.css">
<link rel="stylesheet" href="..\css\dashboard.css">
<link rel="stylesheet" href="..\css\styling-forms.css">

<div class="container">
    <div class="main-title-sec">
        <h2>complaint:</h2>
    </div>
    <div class="content">

        <div class="content-info">
            <div class="label name">
                <span>complaintID : {{ $Complaint[0]->complaintID  }}</span><span>  </span>
            </div>
            <div class="label fullname">
                <span>complaintTitle: {{ $Complaint[0]->complaintTitle }}</span><span> </span>
            </div>
            <div class="label fullname">
                <span>complaintDate: {{ $Complaint[0]->complaintDate }}</span><span> </span>
            </div>

                <div class="control-btn">
                    <div class="main-title-sec">
                        <h2>reply:</h2>
                        @foreach ($showReplys as $showReply)
                        <div class="content">

                            <div class="content-info">

                                <div class="label fullname">
                                    <span>replyTitle: {{ $showReply->replyTitle }}</span><span> </span>
                                </div>
                                <div class="label fullname">
                                    <span>replyDate: {{ $showReply->replyDate }}</span><span> </span>
                                </div>

                    </div>

                        @endforeach


                    </div>
            </div>
        </div>
    </div>

</div>
