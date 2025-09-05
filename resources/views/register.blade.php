<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare Hospital - Daftar</title>
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

        .register-container {
            display: flex;
            width: 100%;
            max-width: 1200px;
            min-height: 700px;
            background: var(--white);
            border-radius: var(--border-radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            animation: slideUp 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-top: 7rem;
        }

        .register-left {
            flex: 1;
            background: var(--gradient);
            color: white;
            padding: 3.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .register-left::before {
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

        .register-left-content {
            position: relative;
            z-index: 2;
        }

        .register-logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 3rem;
            animation: fadeInLeft 0.8s ease-out 0.2s both;
        }

        .register-logo-icon {
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

        .register-logo-icon:hover {
            transform: scale(1.05);
            background: rgba(255, 255, 255, 0.2);
        }

        .register-logo-text {
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: -0.025em;
        }

        .register-left h2 {
            font-size: clamp(2rem, 4vw, 2.75rem);
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.1;
            letter-spacing: -0.025em;
            animation: fadeInLeft 0.8s ease-out 0.4s both;
        }

        .register-left p {
            font-size: 1.125rem;
            line-height: 1.7;
            margin-bottom: 2.5rem;
            opacity: 0.9;
            font-weight: 400;
            animation: fadeInLeft 0.8s ease-out 0.6s both;
        }

        .register-features {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
            margin-top: 2rem;
        }

        .register-feature {
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 1rem;
            animation: fadeInLeft 0.6s ease-out both;
            transition: var(--transition);
        }

        .register-feature:nth-child(1) { animation-delay: 0.8s; }
        .register-feature:nth-child(2) { animation-delay: 1s; }
        .register-feature:nth-child(3) { animation-delay: 1.2s; }
        .register-feature:nth-child(4) { animation-delay: 1.4s; }

        .register-feature:hover {
            transform: translateX(5px);
        }

        .register-feature i {
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

        .register-feature:hover i {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.1);
        }

        .register-right {
            flex: 1.2;
            padding: 3.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: var(--white);
            overflow-y: auto;
        }

        .register-header {
            text-align: center;
            margin-bottom: 2.5rem;
            animation: fadeInRight 0.8s ease-out 0.3s both;
        }

        .register-header h1 {
            font-size: clamp(1.875rem, 4vw, 2.25rem);
            font-weight: 800;
            color: var(--text-color);
            margin-bottom: 0.5rem;
            letter-spacing: -0.025em;
        }

        .register-header p {
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

        .register-form {
            width: 100%;
            animation: fadeInRight 0.8s ease-out 0.5s both;
        }

        .form-row {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 1.875rem;
        }

        .form-group {
            flex: 1;
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

        .terms-agreement {
            display: flex;
            align-items: flex-start;
            gap: 0.625rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .terms-agreement input {
            margin-top: 0.25rem;
            width: 18px;
            height: 18px;
            accent-color: var(--primary-color);
            cursor: pointer;
        }

        .terms-agreement:hover {
            color: var(--primary-color);
        }

        .terms-agreement a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }

        .terms-agreement a:hover {
            text-decoration: underline;
        }

        .register-btn {
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

        .register-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .register-btn:hover::before {
            left: 100%;
        }

        .register-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 40px rgba(37, 99, 235, 0.3);
        }

        .register-btn:active {
            transform: translateY(0);
        }

        .register-divider {
            display: flex;
            align-items: center;
            margin: 2rem 0;
            color: var(--text-lighter);
        }

        .register-divider::before,
        .register-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(to right, transparent, var(--gray-200), transparent);
        }

        .register-divider span {
            padding: 0 1.25rem;
            font-size: 0.875rem;
            font-weight: 500;
            background: var(--white);
        }

        .social-register {
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
            z-index: -1;
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

        .login-link {
            text-align: center;
            margin-top: 2rem;
            color: var(--text-light);
            font-size: 1rem;
            animation: fadeInRight 0.8s ease-out 0.7s both;
        }

        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            margin-left: 0.25rem;
            transition: var(--transition);
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
        }

        .login-link a:hover {
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
            .register-container {
                max-width: 1000px;
                min-height: 650px;
            }
            
            .register-left, .register-right {
                padding: 3rem;
            }
        }

        @media (max-width: 900px) {
            body {
                padding: 0.75rem;
            }
            
            .register-container {
                flex-direction: column;
                max-width: 550px;
                min-height: auto;
            }
            
            .register-left {
                padding: 2.5rem;
                text-align: center;
                min-height: 350px;
            }
            
            .register-right {
                padding: 2.5rem;
            }
            
            .register-left h2 {
                font-size: 2rem;
            }
            
            .register-logo {
                justify-content: center;
                margin-bottom: 2rem;
            }
            
            .register-features {
                align-items: center;
                gap: 1rem;
            }
            
            .floating-element {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
                gap: 1rem;
            }
        }

        @media (max-width: 640px) {
            body {
                padding: 0.5rem;
            }
            
            .register-container {
                border-radius: var(--border-radius);
            }
            
            .register-left, .register-right {
                padding: 2rem;
            }
            
            .register-left h2 {
                font-size: 1.75rem;
                margin-bottom: 1rem;
            }
            
            .register-left p {
                font-size: 1rem;
                margin-bottom: 2rem;
            }
            
            .register-header h1 {
                font-size: 1.75rem;
            }
            
            .register-header {
                margin-bottom: 2rem;
            }
            
            .social-register {
                flex-direction: column;
            }
            
            .form-options {
                flex-direction: column;
                align-items: stretch;
                gap: 1rem;
            }
            
            .terms-agreement {
                align-items: flex-start;
            }
            
            .bg-shape {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .register-left, .register-right {
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
            
            .register-features {
                gap: 0.875rem;
            }
            
            .register-feature {
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
            
            .register-container {
                box-shadow: none;
                border: 1px solid #ccc;
            }
            
            .register-left {
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
    <!-- Navbar untuk halaman register -->
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
    
    <div class="register-container">
        <div class="register-left">
            <div class="floating-element floating-1">
                <i class="fas fa-heartbeat fa-2x"></i>
            </div>
            
            <div class="register-left-content">
                <div class="register-logo">
                    <div class="register-logo-icon">
                        <i class="fas fa-hospital"></i>
                    </div>
                    <div class="register-logo-text">MediCare</div>
                </div>
                
                <h2>Bergabunglah Dengan Kami</h2>
                <p>Daftarkan diri Anda untuk mendapatkan akses ke layanan kesehatan digital terdepan dan mulai perjalanan kesehatan Anda dengan dukungan penuh dari para profesional.</p>
                
                <div class="register-features">
                    <div class="register-feature">
                        <i class="fas fa-calendar-plus"></i>
                        <span>Booking janji temu online</span>
                    </div>
                    <div class="register-feature">
                        <i class="fas fa-prescription"></i>
                        <span>Resep digital dan pengingat obat</span>
                    </div>
                    <div class="register-feature">
                        <i class="fas fa-chart-line"></i>
                        <span>Pantau perkembangan kesehatan</span>
                    </div>
                    <div class="register-feature">
                        <i class="fas fa-comments"></i>
                        <span>Konsultasi dokter 24/7</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="register-right">
            <div class="register-header">
                <h1>Buat <span class="text-gradient">Akun</span></h1>
                <p>Isi informasi berikut untuk membuat akun baru</p>
            </div>
            
            <form class="register-form" id="registerForm">
                <div class="form-row">
                    <div class="form-group">
                        <label for="firstName" class="form-label">Nama Depan</label>
                        <div class="input-with-icon">
                            <i class="input-icon fas fa-user"></i>
                            <input 
                                type="text" 
                                id="firstName" 
                                class="form-input" 
                                placeholder="Nama depan" 
                                required
                                autocomplete="given-name"
                            >
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="lastName" class="form-label">Nama Belakang</label>
                        <div class="input-with-icon">
                            <i class="input-icon fas fa-user"></i>
                            <input 
                                type="text" 
                                id="lastName" 
                                class="form-input" 
                                placeholder="Nama belakang" 
                                required
                                autocomplete="family-name"
                            >
                        </div>
                    </div>
                </div>
                
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
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <div class="input-with-icon">
                            <i class="input-icon fas fa-lock"></i>
                            <input 
                                type="password" 
                                id="password" 
                                class="form-input" 
                                placeholder="Buat kata sandi" 
                                required
                                autocomplete="new-password"
                                minlength="8"
                            >
                            <span class="password-toggle" id="passwordToggle" aria-label="Toggle password visibility">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="confirmPassword" class="form-label">Konfirmasi Kata Sandi</label>
                        <div class="input-with-icon">
                            <i class="input-icon fas fa-lock"></i>
                            <input 
                                type="password" 
                                id="confirmPassword" 
                                class="form-input" 
                                placeholder="Konfirmasi kata sandi" 
                                required
                                autocomplete="new-password"
                                minlength="8"
                            >
                            <span class="password-toggle" id="confirmPasswordToggle" aria-label="Toggle password visibility">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="phone" class="form-label">Nomor Telepon</label>
                    <div class="input-with-icon">
                        <i class="input-icon fas fa-phone"></i>
                        <input 
                            type="tel" 
                            id="phone" 
                            class="form-input" 
                            placeholder="+62 812-3456-7890" 
                            required
                            autocomplete="tel"
                        >
                    </div>
                </div>
                
                <div class="form-options">
                    <label class="terms-agreement">
                        <input type="checkbox" id="terms" name="terms" required>
                        <span>Saya menyetujui <a href="#">Syarat & Ketentuan</a> dan <a href="#">Kebijakan Privasi</a></span>
                    </label>
                </div>
                
                <button type="submit" class="register-btn" id="registerBtn">
                    <i class="fas fa-user-plus"></i>
                    <span>Daftar Sekarang</span>
                </button>
            </form>
            
            <div class="register-divider">
                <span>Atau daftar dengan</span>
            </div>
            
            <div class="social-register">
                <button class="social-btn google" type="button">
                    <i class="fab fa-google"></i>
                    <span>Google</span>
                </button>
                <button class="social-btn facebook" type="button">
                    <i class="fab fa-facebook-f"></i>
                    <span>Facebook</span>
                </button>
            </div>
            
            <div class="login-link">
                Sudah punya akun?<a href="/login" id="loginLink">Masuk Sekarang</a>
            </div>
        </div>
    </div>

    <script>
    // Enhanced form interactions for registration
    class RegisterForm {
        constructor() {
            this.form = document.getElementById('registerForm');
            this.passwordToggle = document.getElementById('passwordToggle');
            this.confirmPasswordToggle = document.getElementById('confirmPasswordToggle');
            this.passwordInput = document.getElementById('password');
            this.confirmPasswordInput = document.getElementById('confirmPassword');
            this.registerBtn = document.getElementById('registerBtn');
            
            this.init();
        }
        
        init() {
            // Toggle password visibility
            this.passwordToggle.addEventListener('click', () => {
                this.togglePasswordVisibility(this.passwordInput, this.passwordToggle);
            });
            
            this.confirmPasswordToggle.addEventListener('click', () => {
                this.togglePasswordVisibility(this.confirmPasswordInput, this.confirmPasswordToggle);
            });
            
            // Form submission
            this.form.addEventListener('submit', (e) => {
                e.preventDefault();
                this.handleSubmit();
            });
            
            // Real-time validation
            this.setupValidation();
        }
        
        togglePasswordVisibility(input, toggle) {
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);
            
            // Update icon
            const icon = toggle.querySelector('i');
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        }
        
        setupValidation() {
            const inputs = this.form.querySelectorAll('input');
            
            inputs.forEach(input => {
                input.addEventListener('blur', () => {
                    this.validateField(input);
                });
                
                input.addEventListener('input', () => {
                    this.clearError(input);
                });
            });
            
            // Password confirmation validation
            this.confirmPasswordInput.addEventListener('input', () => {
                if (this.passwordInput.value && this.confirmPasswordInput.value) {
                    this.validatePasswordMatch();
                }
            });
        }
        
        validateField(field) {
            const value = field.value.trim();
            let isValid = true;
            let errorMessage = '';
            
            // Clear previous errors
            this.clearError(field);
            
            // Required field validation
            if (field.hasAttribute('required') && !value) {
                isValid = false;
                errorMessage = 'Field ini wajib diisi';
            }
            
            // Email validation
            if (field.type === 'email' && value) {
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(value)) {
                    isValid = false;
                    errorMessage = 'Format email tidak valid';
                }
            }
            
            // Password validation
            if (field.id === 'password' && value) {
                if (value.length < 8) {
                    isValid = false;
                    errorMessage = 'Kata sandi minimal 8 karakter';
                }
            }
            
            // Phone validation
            if (field.id === 'phone' && value) {
                const phonePattern = /^[\+]?[0-9\s\-\(\)]{10,}$/;
                if (!phonePattern.test(value)) {
                    isValid = false;
                    errorMessage = 'Format nomor telepon tidak valid';
                }
            }
            
            if (!isValid) {
                this.showError(field, errorMessage);
            }
            
            return isValid;
        }
        
        validatePasswordMatch() {
            const password = this.passwordInput.value;
            const confirmPassword = this.confirmPasswordInput.value;
            
            this.clearError(this.confirmPasswordInput);
            
            if (password !== confirmPassword) {
                this.showError(this.confirmPasswordInput, 'Kata sandi tidak cocok');
                return false;
            }
            
            return true;
        }
        
        showError(field, message) {
            // Remove any existing error
            this.clearError(field);
            
            // Create error element
            const error = document.createElement('p');
            error.className = 'error-message';
            error.style.color = 'var(--error-color)';
            error.style.fontSize = '0.875rem';
            error.style.marginTop = '0.5rem';
            error.style.fontWeight = '500';
            error.textContent = message;
            
            // Add error after the input container
            field.parentNode.parentNode.appendChild(error);
            
            // Add error class to input
            field.style.borderColor = 'var(--error-color)';
        }
        
        clearError(field) {
            // Remove error message
            const error = field.parentNode.parentNode.querySelector('.error-message');
            if (error) {
                error.remove();
            }
            
            // Reset border color
            field.style.borderColor = '';
        }
        
        async handleSubmit() {
            // Validate all fields
            const inputs = this.form.querySelectorAll('input');
            let isValid = true;
            
            inputs.forEach(input => {
                if (!this.validateField(input)) {
                    isValid = false;
                }
            });
            
            // Validate password match
            if (this.passwordInput.value && this.confirmPasswordInput.value) {
                if (!this.validatePasswordMatch()) {
                    isValid = false;
                }
            }
            
            // Validate terms checkbox
            const termsCheckbox = document.getElementById('terms');
            if (!termsCheckbox.checked) {
                isValid = false;
                this.showError(termsCheckbox, 'Anda harus menyetujui syarat dan ketentuan');
            }
            
            if (!isValid) {
                this.showNotification('Harap perbaiki kesalahan pada formulir', 'error');
                return;
            }
            
            // Show loading state
            this.setLoadingState(true);
            
            try {
                // Simulate API call
                await this.submitFormData();
                
                // Show success message
                this.showNotification('Pendaftaran berhasil! Silakan periksa email Anda untuk verifikasi.', 'success');
                
                // Reset form
                this.form.reset();
                
                // Redirect to login page after 2 seconds
                setTimeout(() => {
                    window.location.href = '/login';
                }, 2000);
                
            } catch (error) {
                this.showNotification('Terjadi kesalahan. Silakan coba lagi nanti.', 'error');
            } finally {
                this.setLoadingState(false);
            }
        }
        
        setLoadingState(isLoading) {
            if (isLoading) {
                this.registerBtn.classList.add('loading');
                this.registerBtn.disabled = true;
                this.registerBtn.querySelector('span').textContent = 'Mendaftarkan...';
            } else {
                this.registerBtn.classList.remove('loading');
                this.registerBtn.disabled = false;
                this.registerBtn.querySelector('span').textContent = 'Daftar Sekarang';
            }
        }
        
        async submitFormData() {
            // Simulate API request delay
            return new Promise((resolve, reject) => {
                setTimeout(() => {
                    // Simulate random success/failure (90% success rate for demo)
                    Math.random() > 0.1 ? resolve() : reject();
                }, 1500);
            });
        }
        
        showNotification(message, type) {
            // Create notification element
            const notification = document.createElement('div');
            notification.style.position = 'fixed';
            notification.style.top = '100px';
            notification.style.right = '20px';
            notification.style.padding = '1rem 1.5rem';
            notification.style.borderRadius = '12px';
            notification.style.color = 'white';
            notification.style.fontWeight = '600';
            notification.style.zIndex = '10000';
            notification.style.boxShadow = 'var(--shadow-lg)';
            notification.style.maxWidth = '350px';
            notification.style.transform = 'translateX(100%)';
            notification.style.transition = 'transform 0.3s ease';
            notification.textContent = message;
            
            // Set background color based on type
            if (type === 'success') {
                notification.style.background = 'var(--success-color)';
            } else {
                notification.style.background = 'var(--error-color)';
            }
            
            // Add to document
            document.body.appendChild(notification);
            
            // Animate in
            setTimeout(() => {
                notification.style.transform = 'translateX(0)';
            }, 10);
            
            // Remove after 5 seconds
            setTimeout(() => {
                notification.style.transform = 'translateX(100%)';
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 5000);
        }
    }
    
    // Initialize the form when DOM is loaded
    document.addEventListener('DOMContentLoaded', () => {
        new RegisterForm();
        
        // Add animation to elements on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        // Observe elements that should animate on scroll
        const animatedElements = document.querySelectorAll('.register-feature, .form-group');
        animatedElements.forEach(el => {
            el.style.animationPlayState = 'paused';
            observer.observe(el);
        });
    });
</script>
               