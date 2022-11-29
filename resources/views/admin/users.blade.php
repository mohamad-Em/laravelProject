<link rel="stylesheet" href="css\main.css">
<link rel="stylesheet" href="css\forms.css">
<link rel="stylesheet" href="css\dashboard.css">
<link rel="stylesheet" href="css\styling-forms.css">

<div style="overflow-x:auto;">
    <table class="bills-table">
        <thead>
            <th>userID</th>
            <th>userName</th>
            <th>userEmail</th>
            <th>userFullname</th>
            <th>userStats</th>
            <th colspan="2">control</th>
        </thead>
        @foreach ($users as $user )
            <tr>
                <td>{{ $user->userID }}</td>
                <td>{{ $user->userName }}</td>
                <td>{{ $user->userEmail }}</td>
                <td>{{ $user->userFullname }}</td>
                @if($user->userStats == 1)
                <div class="control-btn">
                    <td><a href="{{ url('approve/'.$user->userID) }}" class="btn btn-danger">Approved</a></td>
                </div>
                @else
                <div class="control-btn">
                    <td><a href="{{ url('unApprove/'.$user->userID) }}" class="btn btn-danger">unApproved</a></td>
                </div>
                @endif
                <td><a href="{{ url('viewUser/'.$user->userID) }}">view</a></td>
                <td><a href="{{ url('delete/'.$user->userID) }}">Delete</a></td>
            </tr>
        @endforeach
    </table>
</div>
