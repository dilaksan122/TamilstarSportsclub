
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
/* General Styling */
body {
    background: linear-gradient(135deg, #f5f5f5, #e0e0e0);
    font-family: 'Roboto', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
}

.container {
    width: 100%;
    max-width: 450px;
    padding: 20px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

/* Card Styling */
.card {
    border: none;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.card-header {
    background: linear-gradient(135deg, #007bff, #0056b3);
    color: #fff;
    font-size: 1.6rem;
    text-align: center;
    padding: 20px;
    border-bottom: 2px solid #0056b3;
}

.card-body {
    padding: 30px;
}

/* Form Styling */
.form-control {
    border-radius: 8px;
    border: 1px solid #ddd;
    padding: 12px;
    margin-bottom: 15px;
    transition: border-color 0.3s, box-shadow 0.3s;
    font-size: 1rem;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
    outline: none;
}

.btn-primary {
    background: linear-gradient(135deg, #007bff, #0056b3);
    border: none;
    border-radius: 8px;
    padding: 12px 20px;
    font-size: 1.1rem;
    color: #fff;
    cursor: pointer;
    transition: background 0.3s, transform 0.2s;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #0056b3, #004085);
    transform: translateY(-2px);
}

.btn-primary:active {
    background: linear-gradient(135deg, #004085, #003366);
    transform: translateY(1px);
}

.btn-link {
    color: #007bff;
    font-size: 0.9rem;
    text-decoration: none;
}

.btn-link:hover {
    text-decoration: underline;
}

/* Error Styling */
.invalid-feedback {
    color: #dc3545;
    font-size: 0.875rem;
}

/* Additional Styling */
.form-check {
    margin-bottom: 15px;
}

.form-check-label {
    font-size: 0.9rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        padding: 15px;
        margin: 5% auto;
    }
}

    </style>
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.postLogin') }}">
                        @csrf

                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-0 row">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>