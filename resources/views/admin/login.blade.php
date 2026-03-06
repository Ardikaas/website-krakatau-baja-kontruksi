<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Red+Rose:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    @vite(['resources/css/app.css', 'resources/css/adminLogin.css'])
</head>
<body>
    <div class="admin-login-page">
        <div class="login-container">
            <div class="login-card">
                <div class="login-header">
                    <h1 class="login-title">Admin Login</h1>
                    <p class="login-subtitle">Please sign in to access admin panel</p>
                </div>

                <form action="{{ route('admin.login.post') }}" method="POST" class="login-form">
                    @csrf

                    @if(session('error'))
                        <div class="alert alert-error">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-error">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" id="email" name="email" class="form-input"
                               value="{{ old('email') }}" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label class="checkbox-label">
                            <input type="checkbox" name="remember" class="checkbox-input">
                            <span class="checkmark"></span>
                            Remember me (7 days)
                        </label>
                    </div>

                    <button type="submit" class="login-btn">
                        <span class="btn-text">Sign In</span>
                        <div class="btn-loader" style="display: none;">
                            <div class="spinner"></div>
                        </div>
                    </button>
                </form>

                <div class="login-footer">
                    <p class="footer-text">
                        <i class="icon-lock"></i>
                        Secure admin access only
                    </p>
                </div>
            </div>

            <div class="login-bg-pattern">
                <div class="pattern-shape shape-1"></div>
                <div class="pattern-shape shape-2"></div>
                <div class="pattern-shape shape-3"></div>
            </div>
        </div>
    </div>

    <script>
        // Simple form validation and loading state
        document.querySelector('.login-form').addEventListener('submit', function(e) {
            const btn = this.querySelector('.login-btn');
            const btnText = btn.querySelector('.btn-text');
            const loader = btn.querySelector('.btn-loader');

            setTimeout(() => {
                btn.disabled = true;
                btnText.style.display = 'none';
                loader.style.display = 'block';
            }, 10);
        });

        // Auto-focus email field
        document.getElementById('email').focus();
    </script>
</body>
</html>