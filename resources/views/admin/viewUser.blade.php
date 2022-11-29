<link rel="stylesheet" href="..\css\user-info.css">
<link rel="stylesheet" href="..\css\forms.css">
<link rel="stylesheet" href="..\css\posts.css">
<link rel="stylesheet" href="..\css\main.css">
<link rel="stylesheet" href="..\css\dashboard.css">
<link rel="stylesheet" href="..\css\styling-forms.css">

<body>

<div class="container">
    <div class="main-title-sec">
        <h2>{{ $user[0]->userName }} information:</h2>
    </div>
    <div class="content">

        <div class="content-info">
            <div class="label name">
                <span>name: {{ $user[0]->userName }} </span><span>  </span>
            </div>
            <div class="label fullname">
                <span>full name: {{ $user[0]->userFullname }} </span><span> </span>
            </div>
            <div class="label email">
                <span>email: {{ $user[0]->userEmail }} </span><span> </span>
            </div>
            @if($user[0]->userStats == 1)
            <div class="control-btn">
                <span>Stats:<a href="{{ url('approve/'.$user[0]->userID) }}" class="btn btn-danger">Approved</a></span>
            </div>
            @elseif($user[0]->userStats == 2)
            <div class="control-btn">
                <span>Stats:<a href="{{ url('unApprove/'.$user[0]->userID) }}" class="btn btn-danger">unApproved</a></span>
            </div>
            @endif

                <div class="control-btn">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="main-title-sec">
            <h2>{{ $user[0]->userName }} Posts:</h2>
            <div style="overflow-x:auto;">
                <table class="bills-table">
                    <thead>
                        <th>postID</th>
                        <th>postTitle</th>
                        <th>postDecraption</th>
                        <th>postDate</th>
                        <th colspan="2">control</th>
                    </thead>
                @foreach ($postsUser as $postUser)
                    <tr>
                        <td>{{ $postUser->postID }}</td>
                        <td>{{ $postUser->postTitle }}</td>
                        <td>{{ $postUser->postDecraption }}</td>
                        <td>{{ $postUser->postDate }}</td>

                        <td><a href="{{url('deletePost/'.$postUser->postID) }}">Delete</a></td>
                    </tr>
                @endforeach
        </div>
</div>

