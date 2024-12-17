<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Admin Panel</title>
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
        
        .forgot-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 100%;
            max-width: 500px;
            margin: 20px;
            padding: 40px;
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
        
        .btn-submit {
            background: var(--gradient);
            border: none;
            border-radius: 8px;
            color: white;
            padding: 12px 35px;
            width: 100%;
            font-weight: bold;
            margin-top: 20px;
        }
        
        .btn-submit:hover {
            opacity: 0.9;
            color: white;
        }
        
        .back-to-login {
            text-align: center;
            margin-top: 20px;
        }
        
        .back-to-login a {
            color: var(--primary-color);
            text-decoration: none;
        }
        
        .back-to-login a:hover {
            text-decoration: underline;
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
    <div class="forgot-container">
        <h2 class="text-center mb-4">Forgot Password</h2>
        <p class="text-center text-muted mb-4">Enter your email address and we'll send you a link to reset your password.</p>
        
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
        
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class="fas fa-envelope"></i>
                </span>
                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                       name="email" placeholder="Email Address"
                       value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-submit">Send Reset Link</button>
            
            <div class="back-to-login">
                <a href="{{ route('admin.auth.login') }}">
                    <i class="fas fa-arrow-left"></i> Back to Login
                </a>
            </div>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
