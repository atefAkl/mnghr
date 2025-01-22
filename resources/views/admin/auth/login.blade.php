<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1e3799;
            --secondary-color: #4a69bd;
            --gradient: linear-gradient(45deg, #1e3799, #4a69bd);
        }
        
        body {
            background: var(--gradient);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Cairo', sans-serif;
        }
        
        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 100%;
            max-width: 1000px;
            display: flex;
            margin: 20px;
        }
        
        .login-banner {
            background: var(--gradient);
            color: white;
            padding: 40px;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .login-form {
            padding: 40px;
            width: 50%;
        }
        
        .form-control {
            border-radius: 8px;
            padding: 10px 15px;
            border: 1px solid #ddd;
        }
        
        .input-group-text {
            background: transparent;
            border-right: 0;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(30, 55, 153, 0.25);
        }
        
        .btn-login {
            background: var(--gradient);
            border: none;
            border-radius: 8px;
            color: white;
            padding: 12px 35px;
            width: 100%;
            font-weight: bold;
            margin-top: 20px;
        }
        
        .btn-login:hover {
            opacity: 0.9;
            color: white;
        }
        
        .links-section {
            text-align: center;
            margin-top: 20px;
        }
        
        .links-section a {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 0.9rem;
        }
        
        .links-section a:hover {
            text-decoration: underline;
        }
        
        @media (max-width: 768px) {
            .login-banner {
                display: none;
            }
            .login-form {
                width: 100%;
            }
        }
        
        .alert {
            border-radius: 8px;
            margin-bottom: 20px;
        }
        
        .input-group > .form-control {
            border-right: 0;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="login-container">
        <div class="login-banner">
            <h1 class="mb-4">Welcome Back!</h1>
            <p>Sign in to access your admin dashboard and manage your website with ease.</p>
        </div>
        
        <div class="login-form">
            <h2 class="text-center mb-4">Sign In</h2>
            
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="fas fa-user"></i>
                    </span>
                    <input type="text" class="form-control @error('userName') is-invalid @enderror" 
                           name="userName" placeholder="Username"
                           value="{{ old('userName') }}" required>
                    @error('userName')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                           name="password" placeholder="Password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
                
                <button type="submit" class="btn btn-login">Sign In</button>
                
                <div class="links-section">
                    <a href="{{ route('password.request') }}" class="d-block mb-2">Forgot Password?</a>
                    <span class="d-block text-muted">Don't have an account?</span>
                    <a href="{{ route('admin.register') }}">Create new account</a>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
