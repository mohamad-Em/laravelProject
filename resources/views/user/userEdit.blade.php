<link rel="stylesheet" href="..\css\main.css">
<link rel="stylesheet" href="..\css\dashboard.css">
<link rel="stylesheet" href="..\css\styling-forms.css">

<body style="min-height: 100vh; display: flex;
            justify-content: center; align-items: center;
            background-image: url('layout/1.png');
            background-position: top; background-repeat: no-repeat; background-size: cover;" >
<div class="container">
    <form action="{{ route('updateUser',$editUser[0]->userID) }}" method="POST" class="form">
        @csrf
        <h2 class="login-title">edit user</h2>
        <div class="input-field">
            <label for="" class="label">user name:</label>
            <input type="text" name="userName" value="{{ $editUser[0]->userName }}" class="input">
        </div>
        <div class="input-field">
            <label for="" class="label">user email: </label>
            <input type="text" name="userEmail" value="{{ $editUser[0]->userEmail }}" class="input">
        </div>

        <div class="input-field">
            <label for="" class="label">user full: </label>
            <input type="text" name="userFullname" value="{{ $editUser[0]->userFullname }}" class="input">
        </div><br>
        <div class="control-btn">
            <input type="submit" name="update" value="update" class="btn btn-danger">
        </div>
    </form>
</div>
