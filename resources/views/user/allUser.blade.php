<link rel="stylesheet" href="css\main.css">
<link rel="stylesheet" href="css\forms.css">
<link rel="stylesheet" href="css\dashboard.css">
<link rel="stylesheet" href="css\styling-forms.css">

<div style="overflow-x:auto;">
    <table class="bills-table">
        <thead>

            <th>userName</th>
            <th>userEmail</th>
            <th>userFullname</th>
            <th colspan="2">control</th>
        </thead>
        @foreach ($allUsers as $allUser )
            <tr>

                <td>{{ $allUser->userName }}</td>
                <td>{{ $allUser->userEmail }}</td>
                <td>{{ $allUser->userFullname }}</td>

                <td><a href="{{ url('showUser/'.$allUser->userID) }}">view</a></td>
            </tr>
        @endforeach
    </table>
</div>
