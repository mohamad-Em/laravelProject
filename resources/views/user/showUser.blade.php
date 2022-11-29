<link rel="stylesheet" href="..\css\main.css">
<link rel="stylesheet" href="..\css\dashboard.css">
<link rel="stylesheet" href="..\css\styling-forms.css">
<body>

<div class="container">
    <div class="main-title-sec">
        <h2>{{ $showUser[0]->userName }} information:</h2>
    </div>
    <div class="content">

        <div class="content-info">
            <div class="label name">
                <span>name: {{ $showUser[0]->userName }} </span><span>  </span>
            </div>
            <div class="label fullname">
                <span>full name: {{ $showUser[0]->userFullname }} </span><span> </span>
            </div>
            <div class="label email">
                <span>email: {{ $showUser[0]->userEmail }} </span><span> </span>
            </div>
            <div class="label email">
                <span>add:<a href="{{ url('addFriend/'. $showUser[0]->userID) }}">add</a> </span><span> </span>
            </div>
            <div class="container">
                <div class="main-title-sec">
                    <h2>{{ $showUser[0]->userName }} posts:</h2>
                </div>
            </div>

            <div style="overflow-x:auto;">
                <table class="bills-table">
                    <thead>
                        <th>postTitle</th>
                        <th>postDecraption</th>
                        <th>postDate</th>
                    </thead>
                    @foreach ($postUsers as $postUser )
                    <tr>
                        <td>{{ $postUser->postTitle }}</td>
                        <td>{{ $postUser->postDecraption }}</td>
                        <td>{{ $postUser->postDate }}</td>

                        <td><a href="{{ url('viewPostUser/'.$postUser->postID) }}">view</a></td>
                    </tr>
                    @endforeach
                </table></div>
                <div class="container">
                    <div class="main-title-sec">
                        <h2>send message:</h2>
                    </div>


                            <form class="login-form" action="{{ url('sendMessage/'.$showUser[0]->userID) }}" method="POST">
                                @csrf
                                <div class="input-field">
                                    <label for="">messageTitle:</label>
                                    <input type="text" name="messageTitle">
                                </div>
                                <div class="input-field">
                                    <input class="btn btn-info" type="submit" name="submit" value="send">
                                </div>

                            </form>

