<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('backend/admin/css/admin-login.css') }}" />
</head>
<body>
<div class="login-box">
  <h2>Login</h2>

  @if (session()->has('error'))
  <p style="color:red">{{ session()->get('error') }} </p>
  @endif

  <form action="{{ url('/admin/login') }}" method="POST">
    @csrf
    <div class="user-box">
      <input type="text" name="email" required="">
      <label>Email</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" required="">
      <label>Password</label>
    </div>
    <button type="submit">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Submit
    </button>
  </form>
</div>
</body>
</html>