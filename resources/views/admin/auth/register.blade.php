<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Admin Panel</title>
    <link href="{{asset('assets/admin/css/register.style.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="register-container">
        <div class="register-banner">
            <h1 class="mb-4">Welcome!</h1>
            <p>Create your account and start managing your website.</p>
        </div>
        
        <div class="register-form">
            <h2 class="text-center mb-4">Create Account</h2>
            
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form method="POST" action="{{ route('register.submit') }}">
                @csrf
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-user"></i>
                            </span>
                            <input type="text" class="form-control" name="first_name" 
                                   placeholder="First Name" value="{{ old('first_name') }}" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-user"></i>
                            </span>
                            <input type="text" class="form-control" name="last_name" 
                                   placeholder="Last Name" value="{{ old('last_name') }}" required>
                        </div>
                    </div>
                </div>
                
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="fas fa-user"></i>
                    </span>
                    <input type="text" class="form-control" name="userName" 
                           placeholder="Username" value="{{ old('userName') }}" required>
                </div>
                
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input type="email" class="form-control" name="email" 
                           placeholder="Email Address" value="{{ old('email') }}" required>
                </div>
                
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" class="form-control" name="password" 
                           placeholder="Password" required>
                </div>
                
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" class="form-control" name="password_confirmation" 
                           placeholder="Confirm Password" required>
                </div>
                
                <button type="submit" class="btn btn-register">Create Account</button>
                
                <div class="links-section">
                    <span class="d-block text-muted">Already have an account?</span>
                    <a href="{{ route('login') }}">Sign in here</a>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>