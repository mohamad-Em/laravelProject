<link rel="stylesheet" href="css\main.css">
<link rel="stylesheet" href="css\forms.css">
<link rel="stylesheet" href="css\dashboard.css">
<link rel="stylesheet" href="css\styling-forms.css">

<div style="overflow-x:auto;">
    <table class="bills-table">
        <thead>
            <th>postID</th>
            <th>postTitle</th>
            <th>postDecraption</th>
            <th>postDate</th>
            <th>userName</th>
            <th>postStatus</th>
            <th colspan="2">control</th>
        </thead>
        @foreach ($allPosts as $allPost)
            <tr>
                <td>{{ $allPost->postID }}</td>
                <td>{{ $allPost->postTitle }}</td>
                <td>{{ $allPost->postDecraption }}</td>
                <td>{{ $allPost->postDate }}</td>
                <td>{{ $allPost->userName }}</td>
                @if($allPost->postStatus ==1)
                <td><a href="{{ url('approvePost/'.$allPost->postID) }}">Approved</a></td>
                @elseif($allPost->postStatus ==2)
                <td><a href="{{ url('unApprovePost/'.$allPost->postID) }}">unApproved</a></td>

                @endif
                <td><a href="{{ url('viewPost/'.$allPost->postID) }}">view</a></td>
                <td><a href="{{ url('deletePost/'.$allPost->postID) }}">Delete</a></td>
            </tr>
        @endforeach
    </table>
</div>
