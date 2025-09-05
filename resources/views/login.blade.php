<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare Hospital - Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --accent-color: #60a5fa;
            --light-blue: #dbeafe;
            --extra-light-blue: #eff6ff;
            --text-color: #1f2937;
            --text-light: #6b7280;
            --text-lighter: #9ca3af;
            --white: #ffffff;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --success-color: #10b981;
            --error-color: #ef4444;
            --gradient: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            --gradient-light: linear-gradient(135deg, var(--light-blue), var(--extra-light-blue));
            --gradient-vibrant: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 10px 25px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-lg: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            --shadow-blue: 0 20px 50px rgba(37, 99, 235, 0.1);
            --shadow-hover: 0 30px 70px rgba(37, 99, 235, 0.15);
            --border-radius: 16px;
            --border-radius-lg: 20px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 50%, #f0f9ff 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            position: relative;
            overflow-x: hidden;
            font-feature-settings: 'cv11', 'ss01';
            font-optical-sizing: auto;
        }

        body::before {
            content: '';
            position: fixed;
            top: -50%;
            right: -20%;
            width: 80%;
            height: 200%;
            background: radial-gradient(ellipse, rgba(96, 165, 250, 0.08) 0%, transparent 70%);
            transform: rotate(-15deg);
            z-index: -2;
        }

        body::after {
            content: '';
            position: fixed;
            bottom: -30%;
            left: -10%;
            width: 60%;
            height: 120%;
            background: radial-gradient(ellipse, rgba(37, 99, 235, 0.06) 0%, transparent 70%);
            transform: rotate(10deg);
            z-index: -2;
        }

        /* Navbar Styles */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 5px 20px rgba(37, 99, 235, 0.1);
            padding: 1rem 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            text-decoration: none;
        }

        .navbar-logo-icon {
            width: 45px;
            height: 45px;
            background: var(--gradient);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.2);
        }

        .navbar-logo-text {
            font-size: 1.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--text-color) 0%, var(--primary-color) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .navbar-auth {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .navbar-btn {
            padding: 0.8rem 1.5rem;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-btn-login {
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            background: transparent;
        }

        .navbar-btn-login:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.2);
        }

        .navbar-btn-register {
            background: var(--gradient);
            color: white;
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.2);
        }

        .navbar-btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(37, 99, 235, 0.3);
        }

        /* Mobile Navbar */
        @media (max-width: 768px) {
            .navbar-container {
                padding: 0 1.5rem;
            }
            
            .navbar-logo-text {
                font-size: 1.3rem;
            }

            .navbar-logo-icon {
                width: 40px;
                height: 40px;
                font-size: 1.1rem;
            }
            
            .navbar-btn {
                padding: 0.7rem 1.2rem;
                font-size: 0.85rem;
            }
        }

        @media (max-width: 480px) {
            .navbar-logo-text {
                display: none;
            }
            
            .navbar-btn {
                padding: 0.6rem 1rem;
            }
            
            .navbar-btn span {
                display: none;
            }
            
            .navbar-btn i {
                margin: 0;
            }
        }

        /* Animated background shapes */
        .bg-shape {
            position: fixed;
            border-radius: 50%;
            background: linear-gradient(45deg, rgba(96, 165, 250, 0.05), rgba(147, 197, 253, 0.03));
            animation: float 20s ease-in-out infinite;
            z-index: -1;
        }

        .bg-shape-1 {
            top: 10%;
            left: 10%;
            width: 300px;
            height: 300px;
            animation-delay: 0s;
        }

        .bg-shape-2 {
            top: 60%;
            right: 15%;
            width: 200px;
            height: 200px;
            animation-delay: -5s;
        }

        .login-container {
            display: flex;
            width: 100%;
            max-width: 1100px;
            min-height: 650px;
            background: var(--white);
            border-radius: var(--border-radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            animation: slideUp 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-top: 7rem;
        }

        .login-left {
            flex: 1.1;
            background: var(--gradient);
            color: white;
            padding: 3.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .login-left::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 60%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
            z-index: 1;
        }

        .login-left-content {
            position: relative;
            z-index: 2;
        }

        .login-logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 3rem;
            animation: fadeInLeft 0.8s ease-out 0.2s both;
        }

        .login-logo-icon {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: white;
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: var(--transition);
        }

        .login-logo-icon:hover {
            transform: scale(1.05);
            background: rgba(255, 255, 255, 0.2);
        }

        .login-logo-text {
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: -0.025em;
        }

        .login-left h2 {
            font-size: clamp(2rem, 4vw, 2.75rem);
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.1;
            letter-spacing: -0.025em;
            animation: fadeInLeft 0.8s ease-out 0.4s both;
        }

        .login-left p {
            font-size: 1.125rem;
            line-height: 1.7;
            margin-bottom: 2.5rem;
            opacity: 0.9;
            font-weight: 400;
            animation: fadeInLeft 0.8s ease-out 0.6s both;
        }

        .login-features {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
            margin-top: 2rem;
        }

        .login-feature {
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 1rem;
            animation: fadeInLeft 0.6s ease-out both;
            transition: var(--transition);
        }

        .login-feature:nth-child(1) { animation-delay: 0.8s; }
        .login-feature:nth-child(2) { animation-delay: 1s; }
        .login-feature:nth-child(3) { animation-delay: 1.2s; }
        .login-feature:nth-child(4) { animation-delay: 1.4s; }

        .login-feature:hover {
            transform: translateX(5px);
        }

        .login-feature i {
            width: 32px;
            height: 32px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: var(--transition);
        }

        .login-feature:hover i {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.1);
        }

        .login-right {
            flex: 1;
            padding: 3.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: var(--white);
        }

        .login-header {
            text-align: center;
            margin-bottom: 3rem;
            animation: fadeInRight 0.8s ease-out 0.3s both;
        }

        .login-header h1 {
            font-size: clamp(1.875rem, 4vw, 2.25rem);
            font-weight: 800;
            color: var(--text-color);
            margin-bottom: 0.5rem;
            letter-spacing: -0.025em;
        }

        .login-header p {
            color: var(--text-light);
            font-size: 1.125rem;
            font-weight: 400;
        }

        .text-gradient {
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .login-form {
            width: 100%;
            animation: fadeInRight 0.8s ease-out 0.5s both;
        }

        .form-group {
            margin-bottom: 1.875rem;
            position: relative;
        }

        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.625rem;
            color: var(--text-color);
            font-size: 0.9375rem;
            letter-spacing: -0.0125em;
        }

        .input-with-icon {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-lighter);
            font-size: 1.125rem;
            transition: var(--transition);
            z-index: 2;
        }

        .form-input {
            width: 100%;
            padding: 1rem 3.25rem 1rem 3rem;
            border: 2px solid var(--gray-200);
            border-radius: 14px;
            font-size: 1rem;
            transition: var(--transition);
            background: var(--white);
            color: var(--text-color);
            font-weight: 400;
            position: relative;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
            transform: translateY(-1px);
        }

        .form-input:focus + .input-icon,
        .form-input:not(:placeholder-shown) + .input-icon {
            color: var(--primary-color);
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%) !important;
            color: var(--text-lighter);
            cursor: pointer;
            font-size: 1.125rem;
            transition: var(--transition);
            z-index: 2;
            padding: 0.25rem;
            border-radius: 6px;
        }

        .password-toggle:hover {
            color: var(--primary-color);
            background: rgba(37, 99, 235, 0.05);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            font-size: 0.9375rem;
            gap: 1rem;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 0.625rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .remember-me input {
            width: 18px;
            height: 18px;
            accent-color: var(--primary-color);
            cursor: pointer;
        }

        .remember-me:hover {
            color: var(--primary-color);
            background: rgba(37, 99, 235, 0.05);
        }

        .forgot-password {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
        }

        .forgot-password:hover {
            color: var(--secondary-color);
            background: rgba(37, 99, 235, 0.05);
        }

        .login-btn {
            width: 100%;
            padding: 1rem 1.5rem;
            background: var(--gradient);
            color: white;
            border: none;
            border-radius: 14px;
            font-size: 1.0625rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.625rem;
            position: relative;
            overflow: hidden;
        }

        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .login-btn:hover::before {
            left: 100%;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 40px rgba(37, 99, 235, 0.3);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .login-divider {
            display: flex;
            align-items: center;
            margin: 2rem 0;
            color: var(--text-lighter);
        }

        .login-divider::before,
        .login-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(to right, transparent, var(--gray-200), transparent);
        }

        .login-divider span {
            padding: 0 1.25rem;
            font-size: 0.875rem;
            font-weight: 500;
            background: var(--white);
        }

        .social-login {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .social-btn {
            flex: 1;
            padding: 0.875rem 1rem;
            border: 2px solid var(--gray-200);
            border-radius: 12px;
            background: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.625rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .social-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, transparent 0%, rgba(0, 0, 0, 0.02) 100%);
            opacity: 0;
            transition: var(--transition);
        }

        .social-btn:hover::before {
            opacity: 1;
        }

        .social-btn.google {
            color: #db4437;
        }

        .social-btn.facebook {
            color: #4267B2;
        }

        .social-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow);
            border-color: var(--gray-300);
        }

        .register-link {
            text-align: center;
            margin-top: 2rem;
            color: var(--text-light);
            font-size: 1rem;
            animation: fadeInRight 0.8s ease-out 0.7s both;
        }

        .register-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            margin-left: 0.25rem;
            transition: var(--transition);
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
        }

        .register-link a:hover {
            color: var(--secondary-color);
            background: rgba(37, 99, 235, 0.05);
        }

        /* Floating Elements */
        .floating-element {
            position: absolute;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            padding: 1rem;
            border-radius: var(--border-radius);
            animation: float 8s ease-in-out infinite;
            z-index: 3;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .floating-1 {
            top: 15%;
            right: 8%;
            animation-delay: 0s;
        }

        .floating-2 {
            bottom: 25%;
            left: 8%;
            animation-delay: 4s;
        }

        /* Animations */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes float {
            0%, 100% { 
                transform: translateY(0px) rotate(0deg); 
            }
            33% { 
                transform: translateY(-15px) rotate(1deg); 
            }
            66% { 
                transform: translateY(-5px) rotate(-1deg); 
            }
        }

        /* Loading state */
        .loading {
            position: relative;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin: -10px 0 0 -10px;
            border: 2px solid transparent;
            border-top: 2px solid currentColor;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .login-container {
                max-width: 900px;
                min-height: 600px;
            }
            
            .login-left, .login-right {
                padding: 3rem;
            }
        }

        @media (max-width: 900px) {
            body {
                padding: 0.75rem;
            }
            
            .login-container {
                flex-direction: column;
                max-width: 500px;
                min-height: auto;
            }
            
            .login-left {
                padding: 2.5rem;
                text-align: center;
                min-height: 400px;
            }
            
            .login-right {
                padding: 2.5rem;
            }
            
            .login-left h2 {
                font-size: 2rem;
            }
            
            .login-logo {
                justify-content: center;
                margin-bottom: 2rem;
            }
            
            .login-features {
                align-items: center;
                gap: 1rem;
            }
            
            .floating-element {
                display: none;
            }
        }

        @media (max-width: 640px) {
            body {
                padding: 0.5rem;
            }
            
            .login-container {
                border-radius: var(--border-radius);
            }
            
            .login-left, .login-right {
                padding: 2rem;
            }
            
            .login-left h2 {
                font-size: 1.75rem;
                margin-bottom: 1rem;
            }
            
            .login-left p {
                font-size: 1rem;
                margin-bottom: 2rem;
            }
            
            .login-header h1 {
                font-size: 1.75rem;
            }
            
            .login-header {
                margin-bottom: 2rem;
            }
            
            .social-login {
                flex-direction: column;
            }
            
            .form-options {
                flex-direction: column;
                align-items: stretch;
                gap: 1rem;
            }
            
            .remember-me {
                justify-content: center;
            }
            
            .forgot-password {
                text-align: center;
            }
            
            .bg-shape {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .login-left, .login-right {
                padding: 1.5rem;
            }
            
            .form-input {
                padding: 0.875rem 3rem 0.875rem 2.75rem;
            }
            
            .input-icon {
                left: 0.875rem;
            }
            
            .password-toggle {
                right: 0.875rem;
            }
            
            .login-features {
                gap: 0.875rem;
            }
            
            .login-feature {
                font-size: 0.9375rem;
            }
        }

        /* High contrast mode support */
        @media (prefers-contrast: high) {
            :root {
                --shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
                --shadow-lg: 0 8px 16px rgba(0, 0, 0, 0.4);
            }
            
            .form-input {
                border-width: 2px;
            }
            
            .social-btn {
                border-width: 2px;
            }
        }

        /* Reduced motion support */
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }

        /* Print styles */
        @media print {
            body {
                background: white;
            }
            
            .login-container {
                box-shadow: none;
                border: 1px solid #ccc;
            }
            
            .login-left {
                background: #f5f5f5 !important;
                color: #333 !important;
            }
            
            .floating-element,
            .bg-shape {
                display: none !important;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar untuk halaman login -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="/" class="navbar-logo">
                <div class="navbar-logo-icon">
                    <i class="fas fa-hospital"></i>
                </div>
                <span class="navbar-logo-text">MediCare</span>
            </a>

            <div class="navbar-auth">
                <a href="/login" class="navbar-btn navbar-btn-login">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Masuk</span>
                </a>
                <a href="/register" class="navbar-btn navbar-btn-register">
                    <i class="fas fa-user-plus"></i>
                    <span>Daftar</span>
                </a>
            </div>
        </div>
    </nav>
    
    <div class="bg-shape bg-shape-1"></div>
    <div class="bg-shape bg-shape-2"></div>
    
    <div class="login-container">
        <div class="login-left">
            <div class="floating-element floating-1">
                <i class="fas fa-shield-alt fa-2x"></i>
            </div>
            
            <div class="login-left-content">
                <div class="login-logo">
                    <div class="login-logo-icon">
                        <i class="fas fa-hospital"></i>
                    </div>
                    <div class="login-logo-text">MediCare</div>
                </div>
                
                <h2>Selamat Datang Kembali</h2>
                <p>Masuk ke akun Anda untuk mengakses layanan kesehatan digital terdepan dan melanjutkan perjalanan kesehatan Anda dengan mudah.</p>
                
                <div class="login-features">
                    <div class="login-feature">
                        <i class="fas fa-user-md"></i>
                        <span>Konsultasi dokter 24/7</span>
                    </div>
                    <div class="login-feature">
                        <i class="fas fa-calendar-check"></i>
                        <span>Kelola janji temu mudah</span>
                    </div>
                    <div class="login-feature">
                        <i class="fas fa-file-medical"></i>
                        <span>Rekam medis terintegrasi</span>
                    </div>
                    <div class="login-feature">
                        <i class="fas fa-bell"></i>
                        <span>Notifikasi kesehatan personal</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="login-right">
            <div class="login-header">
                <h1>Masuk ke <span class="text-gradient">Akun</span></h1>
                <p>Silakan masukkan detail login Anda untuk melanjutkan</p>
            </div>
            
            <form class="login-form" id="loginForm">
                <div class="form-group">
                    <label for="email" class="form-label">Alamat Email</label>
                    <div class="input-with-icon">
                        <i class="input-icon fas fa-envelope"></i>
                        <input 
                            type="email" 
                            id="email" 
                            class="form-input" 
                            placeholder="nama@contoh.com" 
                            required
                            autocomplete="email"
                        >
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <div class="input-with-icon">
                        <i class="input-icon fas fa-lock"></i>
                        <input 
                            type="password" 
                            id="password" 
                            class="form-input" 
                            placeholder="Masukkan kata sandi" 
                            required
                            autocomplete="current-password"
                        >
                        <span class="password-toggle" id="passwordToggle" aria-label="Toggle password visibility">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>
                
                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <span>Ingat saya</span>
                    </label>
                    <a href="#" class="forgot-password">Lupa kata sandi?</a>
                </div>
                
                <button type="submit" class="login-btn" id="loginBtn">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Masuk</span>
                </button>
            </form>
            
            <div class="login-divider">
                <span>Atau lanjutkan dengan</span>
            </div>
            
            <div class="social-login">
                <button class="social-btn google" type="button">
                    <i class="fab fa-google"></i>
                    <span>Google</span>
                </button>
                <button class="social-btn facebook" type="button">
                    <i class="fab fa-facebook-f"></i>
                    <span>Facebook</span>
                </button>
            </div>
            
            <div class="register-link">
                Belum punya akun?<a href="/register" id="registerLink">Daftar Sekarang</a>
            </div>
        </div>
    </div>

    <script>
    // Enhanced form interactions
    class LoginForm {
        constructor() {
            this.form = document.getElementById('loginForm');
            this.emailInput = document.getElementById('email');
            this.passwordInput = document.getElementById('password');
            this.passwordToggle = document.getElementById('passwordToggle');
            this.loginBtn = document.getElementById('loginBtn');
            this.rememberCheckbox = document.getElementById('remember');
            
            this.init();
        }
        
        init() {
            this.setupPasswordToggle();
            this.setupFormValidation();
            this.setupFormSubmission();
            this.setupInputAnimations();
            this.setupSocialLogin();
            this.checkRememberedUser();
        }
        
        setupPasswordToggle() {
            this.passwordToggle.addEventListener('click', () => {
                const isPassword = this.passwordInput.type === 'password';
                this.passwordInput.type = isPassword ? 'text' : 'password';
                
                const icon = this.passwordToggle.querySelector('i');
                icon.className = isPassword ? 'fas fa-eye-slash' : 'fas fa-eye';
                
                // Add smooth transition
                this.passwordToggle.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.passwordToggle.style.transform = 'scale(1)';
                }, 150);
            });
        }
        
        setupInputAnimations() {
            const inputs = [this.emailInput, this.passwordInput];
            
            inputs.forEach(input => {
                input.addEventListener('focus', () => {
                    input.parentElement.style.transform = 'translateY(-2px)';
                });
                
                input.addEventListener('blur', () => {
                    input.parentElement.style.transform = 'translateY(0)';
                });
                
                // Real-time validation feedback
                input.addEventListener('input', () => {
                    this.validateInput(input);
                });
            });
        }
        
        validateInput(input) {
            const isValid = input.checkValidity();
            const inputContainer = input.parentElement;
            
            if (input.value.length > 0) {
                if (isValid) {
                    input.style.borderColor = '#10b981';
                    input.style.boxShadow = '0 0 0 4px rgba(16, 185, 129, 0.1)';
                } else {
                    input.style.borderColor = '#ef4444';
                    input.style.boxShadow = '0 0 0 4px rgba(239, 68, 68, 0.1)';
                }
            } else {
                input.style.borderColor = '#e5e7eb';
                input.style.boxShadow = 'none';
            }
        }
        
        setupFormValidation() {
            this.form.addEventListener('submit', (e) => {
                e.preventDefault();
                
                // Validate all fields
                const isEmailValid = this.emailInput.checkValidity();
                const isPasswordValid = this.passwordInput.checkValidity();
                
                if (!isEmailValid) {
                    this.showError(this.emailInput, 'Please enter a valid email address');
                }
                
                if (!isPasswordValid) {
                    this.showError(this.passwordInput, 'Password is required');
                }
                
                if (isEmailValid && isPasswordValid) {
                    this.handleLogin();
                }
            });
        }
        
        showError(input, message) {
            // Remove any existing error message
            this.removeError(input);
            
            // Create error element
            const errorElement = document.createElement('p');
            errorElement.className = 'error-message';
            errorElement.style.color = '#ef4444';
            errorElement.style.fontSize = '0.875rem';
            errorElement.style.marginTop = '0.5rem';
            errorElement.innerHTML = `<i class="fas fa-exclamation-circle"></i> ${message}`;
            
            // Insert after input container
            input.parentElement.parentElement.appendChild(errorElement);
            
            // Highlight input
            input.style.borderColor = '#ef4444';
            input.style.boxShadow = '0 0 0 4px rgba(239, 68, 68, 0.1)';
            
            // Add shake animation
            input.parentElement.style.animation = 'shake 0.5s ease';
            setTimeout(() => {
                input.parentElement.style.animation = '';
            }, 500);
        }
        
        removeError(input) {
            const errorElement = input.parentElement.parentElement.querySelector('.error-message');
            if (errorElement) {
                errorElement.remove();
            }
        }
        
        handleLogin() {
            // Show loading state
            this.loginBtn.classList.add('loading');
            this.loginBtn.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                // For demo purposes - always succeed
                this.loginBtn.classList.remove('loading');
                this.loginBtn.disabled = false;
                
                // Save to localStorage if "Remember me" is checked
                if (this.rememberCheckbox.checked) {
                    localStorage.setItem('rememberedEmail', this.emailInput.value);
                } else {
                    localStorage.removeItem('rememberedEmail');
                }
                
                // Show success message
                this.showSuccess('Login successful! Redirecting...');
                
                // Redirect to dashboard (simulated)
                setTimeout(() => {
                    window.location.href = '/dashboard'; // Change to your actual dashboard URL
                }, 1500);
            }, 2000);
        }
        
        showSuccess(message) {
            // Create success element
            const successElement = document.createElement('div');
            successElement.className = 'success-message';
            successElement.style.position = 'fixed';
            successElement.style.top = '20px';
            successElement.style.right = '20px';
            successElement.style.padding = '1rem 1.5rem';
            successElement.style.background = '#10b981';
            successElement.style.color = 'white';
            successElement.style.borderRadius = '10px';
            successElement.style.boxShadow = '0 10px 25px rgba(16, 185, 129, 0.3)';
            successElement.style.zIndex = '10000';
            successElement.style.display = 'flex';
            successElement.style.alignItems = 'center';
            successElement.style.gap = '0.5rem';
            successElement.innerHTML = `<i class="fas fa-check-circle"></i> ${message}`;
            
            document.body.appendChild(successElement);
            
            // Remove after 3 seconds
            setTimeout(() => {
                successElement.style.opacity = '0';
                successElement.style.transition = 'opacity 0.5s ease';
                setTimeout(() => {
                    successElement.remove();
                }, 500);
            }, 3000);
        }
        
        setupFormSubmission() {
            this.form.addEventListener('submit', (e) => {
                e.preventDefault();
                this.handleLogin();
            });
        }
        
        setupSocialLogin() {
            const socialButtons = document.querySelectorAll('.social-btn');
            
            socialButtons.forEach(button => {
                button.addEventListener('click', () => {
                    button.classList.add('loading');
                    
                    // Simulate social login process
                    setTimeout(() => {
                        button.classList.remove('loading');
                        this.showSuccess('Social login initiated!');
                    }, 1500);
                });
            });
        }
        
        checkRememberedUser() {
            const rememberedEmail = localStorage.getItem('rememberedEmail');
            if (rememberedEmail) {
                this.emailInput.value = rememberedEmail;
                this.rememberCheckbox.checked = true;
            }
        }
    }

    // Initialize the login form when DOM is loaded
    document.addEventListener('DOMContentLoaded', () => {
        new LoginForm();
        
        // Add CSS for shake animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
                20%, 40%, 60%, 80% { transform: translateX(5px); }
            }
            
            .success-message {
                animation: slideInRight 0.5s ease;
            }
            
            @keyframes slideInRight {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
        `;
        document.head.appendChild(style);
        
        // Forgot password functionality
        document.querySelector('.forgot-password').addEventListener('click', (e) => {
            e.preventDefault();
            const email = prompt('Please enter your email address to reset your password:');
            if (email) {
                alert(`Password reset instructions have been sent to ${email}`);
            }
        });
    });
</script>