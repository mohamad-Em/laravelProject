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
            <th colspan="2">control</th>
        </thead>
        @foreach ($allPostsUser as $allPosts)
            <tr>
                <td>{{ $allPosts->postID }}</td>
                <td>{{ $allPosts->postTitle }}</td>
                <td>{{ $allPosts->postDecraption }}</td>
                <td>{{ $allPosts->postDate }}</td>
                <td>{{ $allPosts->userName }}</td>

                <td><a href="{{ url('viewPostUser/'.$allPosts->postID) }}">view</a></td>
            </tr>
        @endforeach
    </table>
</div>
