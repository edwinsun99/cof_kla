<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Integrated Service Delivery 2025</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            color: #fff;
            padding: 20px;
        }

        .page-title {
            color: #000000ff;
            font-size: 18px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .container {
            display: flex;
            gap: 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* LEFT SIDE */
        .left-section {
            flex: 1;
            background-color: #3f065e;
            padding: 30px;
            border-radius: 8px;
        }

        .welcome-title {
            color: #ffffffff;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .banner {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 30px;
        }

        .banner-image {
            width: 200px;
            height: 140px;
            background-color: #fff;
            border-radius: 8px;
            padding: 10px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5px;
        }

        .device-icon {
            width: 100%;
            height: 100%;
            background-color: #ddd;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }

        .banner-text {
            flex: 1;
            font-size: 14px;
            line-height: 1.6;
        }

        .main-content {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 40px;
        }

        .feature-card {
            background-color: #b3b3ff;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }

        .feature-title {
            color: #000;
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 15px;
            background-color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
        }

        .feature-desc {
            color: #000;
            font-size: 13px;
            line-height: 1.4;
        }

        .footer {
            background-color: #000;
            color: #fff;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            font-size: 14px;
        }

        /* RIGHT SIDE - LOGIN */
        .right-section {
            width: 400px;
            background-color: #3f065e;
            padding: 40px;
            border-radius: 8px;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-title {
            color: #ffffffff;
            font-size: 32px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }

        .login-subtitle {
            text-align: center;
            font-size: 14px;
            color: #ddd;
            margin-bottom: 25px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-group {
            width: 100%;
            margin-bottom: 15px;
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            background-color: #f3f7ff;
            color: #000;
        }

        #togglePassword {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .login-btn {
            background-color: #920bdbff;
            border: 3px solid #000;
            padding: 12px 40px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
            color: #000000ff;
            width: 100%;
            transition: 0.3s;
        }

        .login-btn:hover {
            background-color: #faf5fbff;
        }

    </style>
</head>
<body>
    <div class="page-title">KLA Computer Service Center</div>
    
    <div class="container">
        <!-- LEFT SECTION -->
        <div class="left-section">
            <h1 class="welcome-title">Welcome to KLA Computer Service Center 2025!</h1>
            
            <div class="banner">
                <div class="banner-image">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT02 zEvWRcluqxiLhZkRHu419G9BZ6XpzSr4Q&s" alt="Banner" style="width: 200%; height: 100%;">
                </div>
                <div class="banner-text">
                        <h2 class="banner-text">Selamat datang di KLA Computer Service Center system </h2>
                        
                <p class="banner-text">Melalui portal ini, anda bisa mengelolah data case serta mengetahui status case perbaikan</p>


                    

                </div>
            </div>

            <div class="main-content">
                <div class="features">
                    
                 <a href="{{ route('track.form') }}" class="text-decoration-none">
    <div class="feature-card">
        <div class="feature-title">Track My Case</div>
        <div class="feature-icon">🔍</div>
        <div class="feature-desc">Untuk cek status perbaikan anda, silahkan klik DISINI</div>
    </div>
</a>

                    <div class="feature-card">
                        <div class="feature-title">Service Location</div>
                        <div class="feature-icon">📍</div>
                        <div class="feature-desc">Untuk mengetahui lokasi tempat service terdekat</div>
                    </div>

                    <div class="feature-card">
                        <div class="feature-title">Feedback</div>
                        <div class="feature-icon">👥</div>
                        <div class="feature-desc">Apapun itu penilaian Anda terhadap kami, sampaikan disini ya</div>
                    </div>
                </div>

                <div class="footer">
                    Powered by PT. Infokom Putra Kencana © 2025 | EB Group
                </div>
            </div>
        </div>

        <!-- RIGHT SECTION (LOGIN) -->
        <div class="right-section">
            <h2 class="login-title">Welcome Back!</h2>
            <p class="login-subtitle">Silahkan login menggunakan akun Anda</p>

            @if(session('error'))
                <div style="color:red; font-weight:bold; margin-bottom:10px;">
                    {{ session('error') }}
                </div>
            @endif
            @if(session('success'))
                <div style="color:lime; font-weight:bold; margin-bottom:10px;">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.process') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="username" class="form-input" placeholder="Username" required>
                </div>

              <div class="form-group">
  <input type="password" name="password" id="password" class="form-input" placeholder="Password" required>
  <span id="togglePassword" style="cursor: pointer;">🐼</span>
</div>

<script>
  const passwordInput = document.getElementById("password");
  const togglePassword = document.getElementById("togglePassword");

  togglePassword.addEventListener("click", function () {
    const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
    passwordInput.setAttribute("type", type);

    // Optional: ganti ikon biar keliatan interaktif
    this.textContent = type === "password" ? "🐼" : "🙈";
  });
</script>

                <button type="submit" class="login-btn">
                    <span>LOGIN ✌️</span>
                </button>
            </form>
        </div>
    </div>