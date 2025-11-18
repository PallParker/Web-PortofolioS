<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
  <style>
    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
      background-size: 400% 400%;
      animation: gradientShift 10s ease infinite;
      font-family: 'Poppins', sans-serif;
      color: #fff;
    }
    .login-card {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      padding: 50px 40px;
      border-radius: 20px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.4);
      width: 380px;
      text-align: center;
      animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .login-card img {
      width: 110px;
      height: 110px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 20px;
      border: 4px solid rgba(255, 255, 255, 0.7);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }

    .login-card h3 {
      margin-bottom: 25px;
      font-weight: 700;
      color: #fff;
      letter-spacing: 1px;
    }

    .input-group-text {
      border-radius: 12px 0 0 12px;
      background: rgba(255, 255, 255, 0.2);
      border: none;
      font-size: 16px;
      color: #fff;
    }

    .form-control {
      border-radius: 0 12px 12px 0;
      padding: 12px;
      font-size: 15px;
      border: none;
      background: rgba(255, 255, 255, 0.15);
      color: #fff;
    }

    .form-control::placeholder {
      color: #ddd;
    }

    .form-control:focus {
      box-shadow: 0 0 10px rgba(18, 194, 233, 0.6);
    }

    .btn-login {
      background: linear-gradient(45deg, #00b09b, #96c93d);
      border: none;
      color: #fff;
      font-size: 16px;
      font-weight: 600;
      border-radius: 12px;
      padding: 12px;
      transition: all 0.3s ease;
      margin-top: 10px;
    }

    .btn-login:hover {
      background: linear-gradient(45deg, #96c93d, #00b09b);
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(0, 176, 155, 0.4);
    }

    .alert {
      font-size: 14px;
      padding: 8px;
      border-radius: 8px;
    }
  </style>
</head>
<body>
  <div class="login-card">
    <!-- Logo -->
    <img src="{{ asset('img/logo.jpeg') }}" alt="Logo Sekolah">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <h3>Login Admin</h3>

    <form id="loginForm" action="{{ route('login') }}" method="POST">
      @csrf
      <div class="mb-3">
        <div class="input-group">
          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
          <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email" required>
        </div>
      </div>
      <div class="mb-3">
        <div class="input-group">
          <span class="input-group-text"><i class="fas fa-lock"></i></span>
          <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password" required>
        </div>
      </div>
      <button type="submit" class="btn btn-login w-100">
        <i class="fas fa-sign-in-alt me-2"></i>Login
      </button>
    </form>
  </div>
</body>
</html>
