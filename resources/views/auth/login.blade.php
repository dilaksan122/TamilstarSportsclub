<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminL Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('Admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('Admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('Admin/dist/css/adminlte.min.css') }}">

  <style>
    /* Custom CSS */
    body {
      background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      font-family: 'Source Sans Pro', sans-serif;
    }

    .login-box {
      width: 100%;
      max-width: 360px;
      padding: 40px;
      border-radius: 15px;
      background: #ffffff;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      text-align: center;
      position: relative;
    }

    .login-logo img {
      width: 120px;
      margin-bottom: 20px;
      border-radius: 50%;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .login-box a {
      font-size: 28px;
      font-weight: bold;
      color: #333;
      text-decoration: none;
      display: block;
      margin-top: 10px;
      margin-bottom: 20px;
      transition: color 0.3s;
    }

    .login-box a:hover {
      color: #007bff;
    }

    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      margin-top: 20px;
    }

    .card-body {
      padding: 30px;
    }

    .login-box-msg {
      margin-bottom: 20px;
      font-size: 22px;
      font-weight: 600;
      color: #333;
    }

    .form-control {
      border-radius: 25px;
      border: 1px solid #ddd;
      box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
      transition: border-color 0.3s, box-shadow 0.3s;
      padding: 15px;
      font-size: 16px;
    }

    .form-control:focus {
      border-color: #007bff;
      box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
    }

    .input-group-text {
     
      border: none;
      border-radius: 0 25px 25px 0;
      color: #fff;
      font-size: 16px;
      padding: 10px 15px;
    }

    .btn-primary {
      background: #007bff;
      border: none;
      border-radius: 25px;
      padding: 12px 20px;
      font-size: 18px;
      font-weight: 600;
      transition: background 0.3s, box-shadow 0.3s;
    }

    .btn-primary:hover {
      background: #0056b3;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .alert {
      border-radius: 25px;
      padding: 15px;
      margin-bottom: 20px;
      font-size: 16px;
    }

    @media (max-width: 767px) {
      .login-box {
        width: 90%;
        padding: 20px;
      }
    }
  </style>
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <img src="{{ asset('admin/images/logoTamil.jpg') }}" alt="Logo">
      <a href="#">TamilStar Dortmund Cricket Club</a>
    </div>

    @if(session()->has('Message'))
      <div class="alert alert-success">
        {{ session()->get('Message') }}
      </div>
    @endif

    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Welcome Admin</p>

        <form action="{{ route('postlogin') }}" method="post">
          @csrf
          @if(session('error'))
            <div class="text-center text-danger">{{ session('error') }}</div>
          @endif
          <div class="mb-3 input-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          @error('email')
            <div class="text-danger">{{ $message }}</div>
          @enderror
          <div class="mb-3 input-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @error('password')
            <div class="text-danger">{{ $message }}</div>
          @enderror
          
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="{{ asset('Admin/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('Admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('Admin/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
