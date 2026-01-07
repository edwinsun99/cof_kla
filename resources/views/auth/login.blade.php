<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Integrated Service Delivery 2025</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-ungu: #6f42c1;
            --primary-ungu-dark: #3f065e;
            --accent-kuning: #ffc107;
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
            --text-main: #2d3436;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 20px;
        }

        .container {
            display: flex;
            gap: 25px;
            max-width: 1300px;
            width: 100%;
            margin: auto;
            flex-wrap: wrap;
        }

        /* --- LEFT SECTION --- */
        .left-section {
            flex: 1;
            min-width: 600px;
            background: linear-gradient(160deg, #3f065e 0%, #6f42c1 100%);
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0 20px 40px rgba(63, 6, 94, 0.2);
            color: #fff;
            display: flex;
            flex-direction: column;
        }

        .welcome-title {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 30px;
            line-height: 1.2;
        }

        .banner {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 25px;
            display: flex;
            align-items: center;
            gap: 25px;
            margin-bottom: 40px;
        }

        .banner-image img {
            width: 180px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        .banner-text h2 {
            font-size: 1.1rem;
            margin-bottom: 8px;
            color: var(--accent-kuning);
        }

        .banner-text p {
            font-size: 0.95rem;
            opacity: 0.9;
            line-height: 1.5;
        }

        .main-content-card {
            background: rgba(255, 255, 255, 1);
            padding: 30px;
            border-radius: 25px;
            margin-top: auto;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-bottom: 30px;
        }

        .feature-card {
            background: #f8f9ff;
            padding: 20px;
            border-radius: 20px;
            text-align: center;
            transition: 0.3s;
            border: 1px solid #eee;
            text-decoration: none;
            display: block;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            border-color: var(--primary-ungu);
            box-shadow: 0 10px 20px rgba(111, 66, 193, 0.1);
        }

        .feature-title {
            color: var(--primary-ungu-dark);
            font-weight: 700;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .feature-icon {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .feature-desc {
            color: #666;
            font-size: 0.75rem;
            line-height: 1.4;
        }

        .footer {
            text-align: center;
            font-size: 0.8rem;
            color: #888;
            padding-top: 10px;
            border-top: 1px solid #eee;
        }

        /* --- RIGHT SECTION - LOGIN --- */
        .right-section {
            width: 420px;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .brand-logo {
            max-height: 80px;
            width: auto;
            /* Filter ini membantu logo terlihat lebih 'nyatu' dengan desain modern */
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.05));
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary-ungu-dark);
        }

        .login-subtitle {
            font-size: 0.9rem;
            color: #777;
            margin-top: 5px;
        }

        .form-group {
            width: 100%;
            margin-bottom: 20px;
            position: relative;
        }

        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 8px;
            color: #444;
        }

        .form-input {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #edf2f7;
            border-radius: 15px;
            font-size: 1rem;
            font-family: 'Inter', sans-serif;
            transition: 0.3s;
            background: #fff;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-ungu);
            box-shadow: 0 0 0 4px rgba(111, 66, 193, 0.1);
        }

        #togglePassword {
            position: absolute;
            right: 15px;
            top: 40px;
            font-size: 1.2rem;
            cursor: pointer;
            filter: grayscale(1);
        }

        .captcha-container {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 20px;
            border: 1px dashed #cbd5e0;
            margin-bottom: 25px;
        }

        .captcha-box {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
        }

        .captcha-display {
            flex: 1;
            background: #fff;
            padding: 10px;
            border-radius: 12px;
            text-align: center;
            font-family: 'Courier New', monospace;
            font-weight: 800;
            font-size: 1.4rem;
            letter-spacing: 5px;
            color: var(--primary-ungu-dark);
            border: 1px solid #e2e8f0;
            position: relative;
            overflow: hidden;
            user-select: none;
        }

        .btn-refresh {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-refresh:hover {
            background: var(--accent-kuning);
            border-color: var(--accent-kuning);
        }

        .login-btn {
            background-color: var(--primary-ungu);
            color: #fff;
            border: none;
            padding: 16px;
            border-radius: 15px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            width: 100%;
            transition: 0.3s;
            box-shadow: 0 10px 20px rgba(111, 66, 193, 0.2);
        }

        .login-btn:hover {
            background-color: var(--primary-ungu-dark);
            transform: translateY(-2px);
            box-shadow: 0 15px 25px rgba(111, 66, 193, 0.3);
        }

        .login-btn span { color: var(--accent-kuning); }

        @media (max-width: 992px) {
            .container { flex-direction: column; }
            .left-section, .right-section { width: 100%; min-width: 100%; }
            .features { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="left-section">
            <h1 class="welcome-title">Welcome to KLA Computer <br>Service Center!</h1>
            
            <div class="banner">
                <div class="banner-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT02zEvWRcluqxiLhZkRHu419G9BZ6XpzSr4Q&s" alt="Banner">
                </div>
                <div class="banner-text">
                    <h2>Portal Layanan Terintegrasi</h2>
                    <p>Melalui portal ini, Anda dapat mengelola data case serta memantau status perbaikan unit Anda secara real-time.</p>
                </div>
            </div>

            <div class="main-content-card">
                <div class="features">
                    <a href="{{ route('track.form') }}" class="feature-card">
                        <div class="feature-icon">🔍</div>
                        <div class="feature-title">Track My Case</div>
                        <div class="feature-desc">Cek status perbaikan Anda di sini</div>
                    </a>

                    <a href="{{ route('service.location') }}" class="feature-card">
                        <div class="feature-icon">📍</div>
                        <div class="feature-title">Service Location</div>
                        <div class="feature-desc">Lokasi tempat service terdekat</div>
                    </a>

                    <div class="feature-card">
                        <div class="feature-icon">👥</div>
                        <div class="feature-title">Feedback</div>
                        <div class="feature-desc">Beri penilaian untuk layanan kami</div>
                    </div>
                </div>

                <div class="footer">
                    Powered by <strong>PT. Harmoni Putra Solusindo</strong> © 2026 | EB Group
                </div>
            </div>
        </div>

        <div class="right-section">
            <div class="login-logo-container">
                <img src="{{ asset('images/logo.png') }}" alt="KLA Logo" class="brand-logo">
            </div>

            <div class="login-header">
                <h2 class="login-title">Welcome Back!</h2>
                <p class="login-subtitle">Silakan login dengan akun Anda</p>
            </div>

            @if(session('error'))
                <div style="background: #fff5f5; color: #e53e3e; padding: 12px; border-radius: 10px; margin-bottom: 20px; font-size: 0.85rem; border: 1px solid #fed7d7; text-align: center;">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.process') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-input" placeholder="Contoh: Albert-CE@kdr" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-input" placeholder="••••••••" required>
                    <span id="togglePassword">🐼</span>
                </div>

                <div class="captcha-container">
                    <label class="form-label">Verifikasi Keamanan</label>
                    <div class="captcha-box">
                        <div class="captcha-display">
                            {{ $captcha }}
                        </div>
                        <button type="button" class="btn-refresh" onclick="location.reload();">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21.5 2v6h-6"></path>
                                <path d="M2.5 22v-6h6"></path>
                                <path d="M2 11.5a10 10 0 0 1 18.8-4.3L21.5 8"></path>
                                <path d="M22 12.5a10 10 0 0 1-18.8 4.3L2.5 16"></path>
                            </svg>
                        </button>
                    </div>
                    <input type="text" name="captcha_input" class="form-input" placeholder="Masukkan kode di atas" autocomplete="off" required>
                </div>

                <button type="submit" class="login-btn">
                    LOGIN <span>✌️</span>
                </button>
            </form>
        </div>
    </div>

    <script>
        const passwordInput = document.getElementById("password");
        const togglePassword = document.getElementById("togglePassword");

        togglePassword.addEventListener("click", function () {
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
            passwordInput.setAttribute("type", type);
            this.textContent = type === "password" ? "🐼" : "🙈";
        });
    </script>
</body>
</html>