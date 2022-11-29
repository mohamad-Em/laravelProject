<link rel="stylesheet" href="css\main.css">
<link rel="stylesheet" href="css\forms.css">
<link rel="stylesheet" href="css\dashboard.css">
<link rel="stylesheet" href="css\styling-forms.css">

<div style="overflow-x:auto;">
    <table class="bills-table">
        <thead>
            <th>complaintID</th>
            <th>complaintTitle</th>
            <th>complaintDate</th>
            <th>userName</th>
            <th colspan="2">control</th>
        </thead>
        @foreach ($allComplaints as $allComplaint )
            <tr>
                <td>{{ $allComplaint->complaintID }}</td>
                <td>{{ $allComplaint->complaintTitle }}</td>
                <td>{{ $allComplaint->complaintDate }}</td>
                <td>{{ $allComplaint->userName }}</td>
                <td><a href="{{ url('viewComplaint/'.$allComplaint->complaintID) }}">view</a></td>
                <td><a href="{{ url('deleteComplaint/'.$allComplaint->complaintID) }}">delete</a></td>
            </tr>
        @endforeach
    </table>
</div>
