<link rel="stylesheet" href="..\css\user-info.css">
<link rel="stylesheet" href="..\css\forms.css">
<link rel="stylesheet" href="..\css\posts.css">
<link rel="stylesheet" href="..\css\main.css">
<link rel="stylesheet" href="..\css\dashboard.css">
<link rel="stylesheet" href="..\css\styling-forms.css">

<body style="min-height: 100vh; display: flex;
            justify-content: center; align-items: center;
            background-image: url('layout/1.png');
            background-position: top; background-repeat: no-repeat; background-size: cover;" >
<div class="container">
    <form action="{{ route('update',$Edit[0]->adminID) }}" method="POST" class="form">
        @csrf
        <div class="input-field">
            <label for="" class="label">admin name:</label>
            <input type="text" name="adminName" value="{{ $Edit[0]->adminName }}" class="input">
        </div>
        <div class="input-field">
            <label for="" class="label">admin email: </label>
            <input type="text" name="adminEmail" value="{{ $Edit[0]->adminEmail }}" class="input">
        </div>
        <div class="input-field">
            <label for="" class="label">admin Password: </label>
            <input type="password" name="adminPassword" value="{{ $Edit[0]->adminPassword }}" class="input">
        </div>
        <div class="input-field">
            <label for="" class="label">admin full: </label>
            <input type="text" name="adminFullname" value="{{ $Edit[0]->adminFullname }}" class="input">
        </div><br>
        <div class="control-btn">
            <input type="submit" name="update" value="update" class="btn btn-danger">
        </div>
    </form>
</div>
