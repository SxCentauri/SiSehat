<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare Hospital - Daftar</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        /* ===== VARIABLES ===== */
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

        /* ===== RESET & BASE STYLES ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 50%, #f0f9ff 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            position: relative;
            overflow-x: hidden; 
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

        /* ===== NAVBAR ===== */
        .navbar{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: var(--white);
            box-shadow: var(--shadow-sm);
            padding: 15px 0;
            z-index: 1000;
            transition: var(--transition);
        }
        .navbar-container{
            max-width:1200px; margin:0 auto; padding:0 2rem; display:flex;
            justify-content:space-between; align-items:center;
        }
        .navbar-logo{
            display:flex; align-items:center; gap:1rem; text-decoration:none;
        }
        .navbar-logo-icon{
            width:45px; height:45px; background:var(--gradient); border-radius:12px;
            display:flex; align-items:center; justify-content:center; color:#fff;
            font-size:1.3rem; box-shadow:var(--shadow-blue);
            transition: var(--transition);
        }
        .navbar-logo:hover .navbar-logo-icon {
            transform: scale(1.05);
            box-shadow: var(--shadow-hover);
        }
        .navbar-logo-text{
            font-size:1.5rem; font-weight:800;
            background:linear-gradient(135deg, var(--text-color) 0%, var(--primary-color) 100%);
            -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
        }

        /* Navbar Toggle Button (Mobile) */
        .navbar-toggle {
            display: none;
            flex-direction: column;
            justify-content: space-between;
            width: 30px;
            height: 21px;
            cursor: pointer;
            z-index: 1001;
        }

        .navbar-toggle span {
            height: 3px;
            width: 100%;
            background-color: var(--primary-color);
            border-radius: 3px;
            transition: var(--transition);
            transform-origin: center;
        }

        .navbar-toggle.active span:nth-child(1) {
            transform: translateY(9px) rotate(45deg);
        }
        .navbar-toggle.active span:nth-child(2) {
            opacity: 0;
        }
        .navbar-toggle.active span:nth-child(3) {
            transform: translateY(-9px) rotate(-45deg);
        }

        .navbar-auth {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .navbar-btn {
            padding: .65rem 1.5rem;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 10px;
            text-decoration: none;
            transition: var(--transition);
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
            color: #fff;
            transform: translateY(-2px);
            box-shadow: var(--shadow-blue);
        }

        .navbar-btn-register {
            background: var(--gradient);
            color: #fff;
            box-shadow: var(--shadow-blue);
        }

        .navbar-btn-register:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-hover);
        }

        /* Mobile Menu (Full Width - Tanpa Blur) */
        .mobile-menu {
            position: fixed;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100vh;
            background: var(--white);
            z-index: 999;
            transition: left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 2rem;
            box-shadow: var(--shadow-lg);
        }

        .mobile-menu.active {
            left: 0;
        }

        .mobile-menu .navbar-btn {
            width: 80%;
            max-width: 280px;
            justify-content: center;
            padding: 1rem 2rem;
            font-size: 1.1rem;
        }

        .mobile-menu-close {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--gray-100);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .mobile-menu-close:hover {
            background: var(--gray-200);
            transform: rotate(90deg);
        }

        .mobile-menu-close i {
            font-size: 1.2rem;
            color: var(--text-color);
        }

        /* ===== BACKGROUND SHAPES ===== */
        .bg-shape {
            position: fixed;
            border-radius: 50%;
            background: linear-gradient(45deg, rgba(96, 165, 250, 0.05), rgba(147, 197, 253, 0.03));
            animation: float 20s ease-in-out infinite;
            z-index: -1;
            filter: blur(40px);
            opacity: 0.6;
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
        .bg-shape-3 {
            bottom: 15%;
            left: 20%;
            width: 150px;
            height: 150px;
            animation-delay: -10s;
        }

        /* ===== REGISTER CONTAINER ===== */
        .register-container {
            display: flex;
            width: 100%;
            max-width: 1200px;
            min-height: 700px;
            background: #fff;
            border-radius: var(--border-radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            animation: slideUp 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            margin-top: 7rem;
        }

        /* Left Side */
        .register-left {
            flex: 1;
            background: var(--gradient);
            color: #fff;
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
            inset: 0;
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
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: var(--transition);
        }

        .register-logo:hover .register-logo-icon {
            transform: scale(1.05);
            background: rgba(255,255,255,.2);
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
            padding: 0.75rem;
            border-radius: var(--border-radius);
        }

        .register-feature:nth-child(1) { animation-delay: 0.8s; }
        .register-feature:nth-child(2) { animation-delay: 1s; }
        .register-feature:nth-child(3) { animation-delay: 1.2s; }
        .register-feature:nth-child(4) { animation-delay: 1.4s; }

        .register-feature:hover {
            transform: translateX(5px);
            background: rgba(255, 255, 255, 0.1);
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
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: var(--transition);
        }

        .register-feature:hover i {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.1);
        }

        /* Right Side */
        .register-right {
            flex: 1.2;
            padding: 3.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #fff;
            overflow-y: auto;
            position: relative;
        }

        .register-right::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: var(--gradient);
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

        /* Form Styles */
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
            background: #fff;
            color: var(--text-color);
            font-weight: 400;
            position: relative;
            box-shadow: var(--shadow-sm);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1), var(--shadow-sm);
            transform: translateY(-2px);
        }

        .form-input:focus + .input-icon,
        .form-input:not(:placeholder-shown) + .input-icon {
            color: var(--primary-color);
        }

        /* Password Toggle */
        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-lighter);
            cursor: pointer;
            font-size: 1.125rem;
            transition: var(--transition);
            z-index: 2;
            padding: .25rem;
            border-radius: 6px;
            background: transparent;
            border: 0;
        }

        .password-toggle:hover {
            color: var(--primary-color);
            background: rgba(37, 99, 235, 0.05);
        }

        /* Form Options */
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
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
        }

        .terms-agreement:hover {
            color: var(--primary-color);
            background: rgba(37, 99, 235, 0.05);
        }

        .terms-agreement input {
            margin-top: 0.25rem;
            width: 18px;
            height: 18px;
            accent-color: var(--primary-color);
            cursor: pointer;
        }

        .terms-agreement a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }

        /* Register Button */
        .register-btn {
            width: 100%;
            padding: 1rem 1.5rem;
            background: var(--gradient);
            color: #fff;
            border: none;
            border-radius: 14px;
            font-size: 1.0625rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: var(--shadow-blue);
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
            inset: 0;
            left: -100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.7s ease;
        }

        .register-btn:hover::before {
            left: 100%;
        }

        .register-btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
        }

        .register-btn:active {
            transform: translateY(-1px);
        }

        .register-btn.loading {
            pointer-events: none;
        }

        .register-btn.loading::after {
            content: '';
            width: 18px;
            height: 18px;
            border: 2px solid transparent;
            border-top: 2px solid #fff;
            border-radius: 50%;
            margin-left: 8px;
            animation: spin 1s linear infinite;
        }

        /* Divider */
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
            background: #fff;
        }

        /* Social Register */
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
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.625rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .social-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow);
            border-color: var(--primary-color);
        }

        .social-btn.google {
            color: #db4437;
        }

        .social-btn.facebook {
            color: #4267B2;
        }

        /* Login Link */
        .login-link {
            text-align: center;
            margin-top: 2rem;
            color: var(--text-light);
            font-size: 1rem;
            animation: fadeInRight 0.8s ease-out 0.7s both;
        }

        .login-link a {
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
            margin-left: 0.25rem;
            transition: var(--transition);
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
        }

        .login-link a:hover {
            color: var(--secondary-color);
            background: rgba(37, 99, 235, 0.05);
        }

        /* Error Messages */
        .error-message {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--error-color);
            padding: 0.75rem 1rem;
            border-radius: var(--border-radius);
            margin-bottom: 1.5rem;
            border-left: 4px solid var(--error-color);
            animation: shake 0.5s ease-in-out;
        }

        .error-message ul {
            padding-left: 1.25rem;
            margin: 0.5rem 0 0 0;
        }

        /* ===== ANIMATIONS ===== */
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
                transform: translateY(0) rotate(0) scale(1);
            }
            33% {
                transform: translateY(-20px) rotate(2deg) scale(1.05);
            }
            66% {
                transform: translateY(-10px) rotate(-2deg) scale(0.95);
            }
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }

        /* ===== RESPONSIVE STYLES ===== */
        /* 1024px Breakpoint */
        @media (max-width: 1024px) {
            .register-container {
                max-width: 1000px;
                min-height: 650px;
            }

            .register-left,
            .register-right {
                padding: 3rem;
            }
        }

        /* 968px Breakpoint */
        @media (max-width: 968px) {
            .navbar-toggle {
                display: flex;
            }

            .navbar-auth {
                display: none;
            }

            .register-container {
                max-width: 900px;
            }

            .register-left h2 {
                font-size: 2rem;
            }

            .register-left p {
                font-size: 1rem;
            }

            .register-feature {
                font-size: 0.9375rem;
            }
        }

        /* 900px Breakpoint (untuk layout kolom) */
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
        }

        /* 768px Breakpoint */
        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
                gap: 1rem;
            }

            .register-container {
                margin-top: 6rem;
            }

            .register-left,
            .register-right {
                padding: 2rem;
            }

            .register-header h1 {
                font-size: 1.875rem;
            }

            .register-header p {
                font-size: 1.0625rem;
            }

            .social-register {
                flex-direction: column;
            }
        }

        /* 640px Breakpoint */
        @media (max-width: 640px) {
            .register-container {
                border-radius: var(--border-radius);
            }

            .register-left,
            .register-right {
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

            .form-options {
                flex-direction: column;
                align-items: stretch;
                gap: 1rem;
            }

            .register-logo-text {
                font-size: 1.75rem;
            }

            .register-logo-icon {
                width: 50px;
                height: 50px;
                font-size: 1.5rem;
            }
        }

        /* 480px Breakpoint */
        @media (max-width: 480px) {
            .navbar-logo-text {
                font-size: 1.3rem;
            }

            .navbar-logo-icon {
                width: 40px;
                height: 40px;
                font-size: 1.1rem;
            }

            .register-left,
            .register-right {
                padding: 1.5rem;
            }

            .register-container {
                margin-top: 5rem;
            }

            .form-input {
                padding: 0.875rem 3rem 0.875rem 2.75rem;
                font-size: 0.9375rem;
            }

            .password-toggle {
                right: 0.875rem;
                font-size: 1rem;
            }

            .input-icon {
                font-size: 1rem;
                left: 0.875rem;
            }

            .register-features {
                gap: 0.875rem;
            }

            .register-feature {
                font-size: 0.9375rem;
                padding: 0.625rem;
            }

            .register-feature i {
                width: 28px;
                height: 28px;
                font-size: 0.875rem;
            }

            .register-btn {
                padding: 0.875rem 1.25rem;
                font-size: 1rem;
            }

            .social-btn {
                padding: 0.75rem;
                font-size: 0.9375rem;
            }

            .login-link {
                font-size: 0.9375rem;
            }

            .bg-shape {
                display: none;
            }


        }
    </style>
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar">
        <div class="navbar-container">
            <a href="{{ route('home') }}" class="navbar-logo">
                <div class="navbar-logo-icon"><i class="fas fa-hospital"></i></div>
                <span class="navbar-logo-text">MediCare</span>
            </a>

            <div class="navbar-toggle" id="navbarToggle">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="navbar-auth">
                <a href="{{ route('login') }}" class="navbar-btn navbar-btn-login">
                    <i class="fas fa-sign-in-alt"></i><span>Masuk</span>
                </a>
                <a href="{{ route('register') }}" class="navbar-btn navbar-btn-register">
                    <i class="fas fa-user-plus"></i><span>Daftar</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu (Full Width - Tanpa Blur) -->
    <div class="mobile-menu" id="mobileMenu">
        <button class="mobile-menu-close" id="mobileMenuClose">
            <i class="fas fa-times"></i>
        </button>
        <a href="{{ route('login') }}" class="navbar-btn navbar-btn-login">
            <i class="fas fa-sign-in-alt"></i><span>Masuk</span>
        </a>
        <a href="{{ route('register') }}" class="navbar-btn navbar-btn-register">
            <i class="fas fa-user-plus"></i><span>Daftar</span>
        </a>
    </div>

    <div class="bg-shape bg-shape-1"></div>
    <div class="bg-shape bg-shape-2"></div>
    <div class="bg-shape bg-shape-3"></div>

    <div class="register-container">
        <!-- Left side content remains the same -->
        <div class="register-left">
            <div class="register-left-content">
                <div class="register-logo">
                    <div class="register-logo-icon"><i class="fas fa-hospital"></i></div>
                    <div class="register-logo-text">MediCare</div>
                </div>
                <h2>Bergabunglah Dengan Kami</h2>
                <p>Daftarkan diri Anda untuk mendapatkan akses ke layanan kesehatan digital terdepan dan mulai perjalanan kesehatan Anda dengan dukungan penuh dari para profesional.</p>

                <div class="register-features">
                    <div class="register-feature"><i class="fas fa-calendar-plus"></i><span>Booking janji temu online</span></div>
                    <div class="register-feature"><i class="fas fa-prescription"></i><span>Resep digital dan pengingat obat</span></div>
                    <div class="register-feature"><i class="fas fa-chart-line"></i><span>Pantau perkembangan kesehatan</span></div>
                    <div class="register-feature"><i class="fas fa-comments"></i><span>Konsultasi dokter 24/7</span></div>
                </div>
            </div>
        </div>

        <!-- Right side content remains the same -->
        <div class="register-right">
            <div class="register-header">
                <h1>Buat <span class="text-gradient">Akun</span></h1>
                <p>Isi informasi berikut untuk membuat akun baru</p>
            </div>

            {{-- Alert error/sukses dari backend (Breeze) --}}
            @if ($errors->any())
                <div class="error-message">
                    <strong>Terjadi kesalahan:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            {{-- FORM Laravel: POST ke route('register') --}}
            <form class="register-form" id="registerForm" method="POST" action="{{ route('register') }}">
                @csrf

                {{-- hidden "name" untuk backend, diisi gabungan Nama Depan + Belakang saat submit --}}
                <input type="hidden" name="name" id="fullName" value="{{ old('name') }}">

                <div class="form-row">
                    <div class="form-group">
                        <label for="firstName" class="form-label">Nama Depan</label>
                        <div class="input-with-icon">
                            <i class="input-icon fas fa-user"></i>
                            <input type="text" id="firstName" class="form-input" placeholder="Nama depan" autocomplete="given-name" value="{{ old('firstName') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lastName" class="form-label">Nama Belakang</label>
                        <div class="input-with-icon">
                            <i class="input-icon fas fa-user"></i>
                            <input type="text" id="lastName" class="form-input" placeholder="Nama belakang" autocomplete="family-name" value="{{ old('lastName') }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Alamat Email</label>
                    <div class="input-with-icon">
                        <i class="input-icon fas fa-envelope"></i>
                        <input type="email" id="email" name="email" class="form-input" placeholder="nama@contoh.com" required autocomplete="email" value="{{ old('email') }}">
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <div class="input-with-icon">
                        <i class="input-icon fas fa-lock"></i>
                        <input type="password" id="password" name="password" class="form-input" placeholder="Masukkan kata sandi" required autocomplete="new-password">
                        <button type="button" class="password-toggle" id="passwordToggle" aria-label="Toggle password visibility">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="confirmPassword" class="form-label">Konfirmasi Kata Sandi</label>
                    <div class="input-with-icon">
                        <i class="input-icon fas fa-lock"></i>
                        <input type="password" id="confirmPassword" name="password_confirmation" class="form-input" placeholder="Konfirmasi kata sandi" required autocomplete="new-password">
                        <button type="button" class="password-toggle" id="confirmPasswordToggle" aria-label="Toggle password visibility">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="phone" class="form-label">Nomor Telepon</label>
                    <div class="input-with-icon">
                        <i class="input-icon fas fa-phone"></i>
                        <input type="tel" id="phone" class="form-input" placeholder="+62 812-3456-7890" autocomplete="tel" value="{{ old('phone') }}">
                    </div>
                </div>
                <br>
                <div class="form-options">
                    <label class="terms-agreement">
                        <input type="checkbox" id="terms" required>
                        <span>Saya menyetujui <a href="#">Syarat & Ketentuan</a> dan <a href="#">Kebijakan Privasi</a></span>
                    </label>
                </div>

                <button type="submit" class="register-btn" id="registerBtn">
                    <i class="fas fa-user-plus"></i><span>Daftar Sekarang</span>
                </button>
            </form>

            <div class="register-divider"><span>Atau daftar dengan</span></div>

            <div class="social-register">
                <button class="social-btn google" type="button"><i class="fab fa-google"></i><span>Google</span></button>
                <button class="social-btn facebook" type="button"><i class="fab fa-facebook-f"></i><span>Facebook</span></button>
            </div>

            <div class="login-link">
                Sudah punya akun?
                <a href="{{ route('login') }}" id="loginLink">Masuk Sekarang</a>
            </div>
        </div>
    </div>

<script>
(function () {
  const form   = document.getElementById('registerForm');
  const first  = document.getElementById('firstName');
  const last   = document.getElementById('lastName');
  const full   = document.getElementById('fullName');
  const terms  = document.getElementById('terms');
  const btn    = document.getElementById('registerBtn');

  // Toggle eyes dengan animasi dan feedback visual yang lebih baik
  const togglePw = (inputId, toggleId) => {
    const input = document.getElementById(inputId);
    const tgl   = document.getElementById(toggleId);
    if (!input || !tgl) return;

    tgl.addEventListener('click', () => {
      const isPassword = input.type === 'password';
      input.type = isPassword ? 'text' : 'password';

      const icon = tgl.querySelector('i');
      if (isPassword) {
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
        tgl.style.color = 'var(--primary-color)';
      } else {
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
        tgl.style.color = 'var(--text-lighter)';
      }
    });

    // Reset warna saat input focus
    input.addEventListener('focus', () => {
      tgl.style.color = 'var(--primary-color)';
    });

    input.addEventListener('blur', () => {
      if (input.type === 'password') {
        tgl.style.color = 'var(--text-lighter)';
      }
    });
  };

  togglePw('password','passwordToggle');
  togglePw('confirmPassword','confirmPasswordToggle');

   // Mobile menu toggle (full width tanpa blur)
        const navbarToggle = document.getElementById('navbarToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileMenuClose = document.getElementById('mobileMenuClose');

        // Fungsi untuk menutup menu mobile
        function closeMobileMenu() {
            mobileMenu.classList.remove('active');
            navbarToggle.classList.remove('active');
            document.body.style.overflow = '';
        }

        // Fungsi untuk membuka menu mobile
        function openMobileMenu() {
            mobileMenu.classList.add('active');
            navbarToggle.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        if (navbarToggle && mobileMenu && mobileMenuClose) {
            // Buka menu
            navbarToggle.addEventListener('click', (e) => {
                e.stopPropagation();
                if (mobileMenu.classList.contains('active')) {
                    closeMobileMenu();
                } else {
                    openMobileMenu();
                }
            });

            // Tutup menu dengan tombol close
            mobileMenuClose.addEventListener('click', () => {
                closeMobileMenu();
            });

            // Tutup menu saat mengklik di luar
            document.addEventListener('click', (e) => {
                if (mobileMenu.classList.contains('active') &&
                    !mobileMenu.contains(e.target) &&
                    !navbarToggle.contains(e.target)) {
                    closeMobileMenu();
                }
            });

            // Tutup menu dengan tombol ESC
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && mobileMenu.classList.contains('active')) {
                    closeMobileMenu();
                }
            });
        }

  // ⛳ Submit ke Laravel (tanpa preventDefault)
  form.addEventListener('submit', (e) => {
    // validasi ringan untuk terms
    if (!terms.checked) {
      e.preventDefault();
      alert('Harap setujui Syarat & Ketentuan terlebih dahulu.');
      return;
    }
    // gabungkan nama depan + belakang ke field "name" (dipakai backend)
    const f = (first?.value || '').trim();
    const l = (last?.value  || '').trim();
    full.value = (f + ' ' + l).trim() || 'Pengguna';

    // UX kecil: tombol loading (tidak mencegah submit)
    btn.classList.add('loading');
    btn.disabled = true;
  });
})();
</script>
</body>
</html>
