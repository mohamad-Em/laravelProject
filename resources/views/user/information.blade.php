<link rel="stylesheet" href="css/user-info.css">
<link rel="stylesheet" href="css/forms.css">
<link rel="stylesheet" href="css/posts.css">
<link rel="stylesheet" href="css\dashboard.css">
<link rel="stylesheet" href="css\main.css">
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
                <span>email: {{ Session::get('userEmail') }}</span><span> </span>
            </div>

                <div class="control-btn">
                    <a href="{{ url('editUser/'.Session::get('ID')) }}" class="btn btn-danger">edit info</a>

            </div>
        </div>
    </div>

</div>
<br><br>
<div class="main-title-sec">
    <h2>{{ Session::get('Name') }} friend: </h2>
</div>
<div class="container">

@foreach ($myFriends as  $myFriend)
<div class="card-container">

    <a href="{{ url('showUser/'.$myFriend->userID) }}" class="card">
        <i class="card-icon fas fa-running"></i>
        <span class="name">{{ $myFriend->userName }}</span>
        @if($myFriend->friendStatus ==1)
        <a href="{{ url('approvedFriend/'.$myFriend->friendID) }}">approved</a>
    @elseif($myFriend->friendStatus ==2)
        <a href="{{ url('unApprovedFriend/'.$myFriend->friendID) }}">unApproved</a>
        <a href="{{ url('deleteFriend/'.$myFriend->friendID) }}">delete</a>
    @endif
        <span class="num">

        </span>

    </a>

</div>
@endforeach

<div class="container">
    <div class="main-title-sec">
        <h2>my messages:</h2>
    </div>
    @foreach ($myMessages as $myMessage )
    <div class="content">

        <div class="content-info">
            <div class="label name">
                <span>messageTitle: {{ $myMessage->messageTitle }}</span><span>  </span>
            </div>
            <div class="label fullname">
                <span>messageDate: {{ $myMessage->messageDate }}</span><span> </span>
            </div>
            <div class="label email">
                <span>userName: {{ $myMessage->userName }}</span><span> </span>
            </div>

                <div class="control-btn">
                    <div class="main-title-sec">

                    </div>
                    <a href="{{ url('deleteMessage/'.$myMessage->messageID) }}" class="btn btn-danger">delete</a>
                    <a href="{{ url('viewMessage/'.$myMessage->messageID) }}" class="btn btn-danger">view</a>

            </div>
        </div>
    </div>

</div>
    @endforeach

<br><br>
    <div class="main-title-sec">
        <h2>my Posts:</h2>
        <div class="control-btn">
            <a href="{{ url('addPostUser/'.Session::get('ID')) }}" class="btn btn-info" >add Post</a>
        </div>
    </div>
    @foreach ($myPosts as $myPost )


    <div class="content">

        <div class="content-info">
            <div class="label name">
                <span>user name: {{ $myPost->userName }}</span><span>  </span>
            </div>
            <div class="label fullname">
                <span>post title: {{ $myPost->postTitle }}</span><span> </span>
            </div>
            <div class="label email">
                <span>post decraption: {{ $myPost->postDecraption }}</span><span> </span>
            </div>
            <div class="label email">
                <span>post date: {{ $myPost->postDate }}</span><span> </span>
            </div>
            @if($myPost->postStatus == 1)
            <div class="label email">
                <span>post status: Off</span><span> </span>
            </div>
            @else
            <div class="label email">
                <span>post status: On</span><span> </span>
            </div>
            @endif


                <div class="control-btn">
                    <a href="{{ url('showCommentMyPost/'.$myPost->postID) }}" class="btn btn-danger">Comments</a>
                    <a href="{{ url('deletetMyPost/'.$myPost->postID) }}" class="btn btn-danger">Delete</a>
                    @if($myPost->postStatus != 1)
                    <a href="{{ url('editPostUser/'.$myPost->postID) }}" class="btn btn-danger">edit Post</a>

                    @else

                    @endif

            </div>
        </div>
    </div>

</div>
@endforeach
<div class="container">
    <div class="main-title-sec">
        <h2>my complaints:</h2>
        <div class="control-btn">
            <a href="{{ url('addComplaints/'.Session::get('ID')) }}" class="btn btn-info" >add</a>
        </div>
    </div>
    @foreach ($mycomplaints as $mycomplaint )
    <div class="content">
        <div class="content-info">
            <div class="label name">

                <span>complaintTitle: {{ $mycomplaint->complaintTitle }}</span><span>  </span>
            </div>
            <div class="label fullname">
                <span>complaintDate: {{ $mycomplaint->complaintDate }}</span><span> </span>
            </div>
            <div class="control-btn">
                <a href="{{ url('showReplyComplaint/'.$mycomplaint->complaintID) }}" class="btn btn-info" >view</a>
                <a href="{{ url('deleteComplaint/'.$mycomplaint->complaintID) }}" class="btn btn-info" >delete</a>
            </div></div></div>
        @endforeach
