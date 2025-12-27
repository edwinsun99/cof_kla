@extends('ce.layout.app')

@section('title', 'Edit Profile')

@section('content')
<div class="container py-4">
    <h4>Edit Profile</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- PROFILE INFO -->
    <form action="{{ route('ce.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Profile Picture</label><br>
            @if($user->profile_photo)
<img src="{{ $user->profile_photo 
    ? asset('storage/'.$user->profile_photo) 
    : asset('images/default-avatar.png') }}"
     width="100" class="mb-2 rounded">

     @endif
            <input type="file" name="profile_photo" class="form-control">
        </div>

        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="{{ $user->username }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
        </div>

        <button class="btn btn-primary">Save Profile</button>
    </form>

    <hr>

    <!-- CHANGE PASSWORD -->
    <form action="{{ route('ce.profile.password') }}" method="POST">
        @csrf

      <div class="mb-3">
    <label>Password Lama</label>
    <div class="input-group">
        <input type="password" name="old_password" id="old_password"
               class="form-control" required>
        <button type="button" class="btn btn-outline-secondary"
                onclick="togglePassword('old_password', this)">
            <i class="bi bi-eye"></i>
        </button>
    </div>
</div>

      <div class="mb-3">
    <label>Password Baru</label>
    <div class="input-group">
        <input type="password" name="new_password" id="new_password"
               class="form-control" required>
        <button type="button" class="btn btn-outline-secondary"
                onclick="togglePassword('new_password', this)">
            <i class="bi bi-eye"></i>
        </button>
    </div>
</div>

   <div class="mb-3">
    <label>Konfirmasi Password Baru</label>
    <div class="input-group">
        <input type="password" name="new_password_confirmation"
               id="new_password_confirmation"
               class="form-control" required>
        <button type="button" class="btn btn-outline-secondary"
                onclick="togglePassword('new_password_confirmation', this)">
            <i class="bi bi-eye"></i>
        </button>
    </div>
</div>
        <button class="btn btn-warning">Change Password</button>
    </form>

    <script>
function togglePassword(inputId, btn) {
    const input = document.getElementById(inputId);
    const icon  = btn.querySelector('i');

    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
    }
}
</script>

</div>
@endsection
