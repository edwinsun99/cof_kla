<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track My Case - KLA Computer</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-ungu: #6f42c1;
            --primary-light: #8e67d5;
            --accent-kuning: #ffc107;
            --bg-gradient: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            --glass-bg: rgba(255, 255, 255, 0.85);
            --glass-border: rgba(255, 255, 255, 0.4);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            /* Background dengan sedikit sentuhan ungu halus */
            background: radial-gradient(circle at top right, #fdfbfb 0%, #ebedee 100%), 
                        linear-gradient(135deg, #f5f7fa 0%, #e1e8f0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* Container Card Glassmorphism */
        .track-card {
            max-width: 480px;
            width: 100%;
            background: var(--glass-bg);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: 30px;
            padding: 40px;
            border: 1px solid var(--glass-border);
            box-shadow: 0 25px 50px -12px rgba(111, 66, 193, 0.1);
            position: relative;
            overflow: hidden;
        }

        /* Dekorasi Aksen Ungu di Atas Card */
        .track-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--primary-ungu), var(--primary-light));
        }

        .header {
            text-align: center;
            margin-bottom: 35px;
        }

        .logo-box {
            margin-bottom: 20px;
        }

        .brand-logo {
            max-height: 45px;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.05));
        }

        .header h2 {
            font-size: 1.8rem;
            font-weight: 800;
            color: #2d3436;
            letter-spacing: -0.5px;
            text-transform: uppercase;
        }

        .header p {
            font-size: 0.9rem;
            color: #636e72;
            margin-top: 8px;
        }

        /* Alert Styling */
        .alert {
            padding: 14px;
            border-radius: 12px;
            font-size: 0.85rem;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 500;
        }
        .alert-error {
            background: #fff5f5;
            color: #c0392b;
            border: 1px solid #fed7d7;
        }

        /* Form Styling */
        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 700;
            color: #444;
            margin-bottom: 10px;
            margin-left: 4px;
        }

        .input-wrapper {
            margin-bottom: 20px;
        }

        .form-input {
            width: 100%;
            padding: 15px 20px;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            background: #fff;
            font-family: inherit;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            color: #2d3436;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-ungu);
            box-shadow: 0 0 0 4px rgba(111, 66, 193, 0.1);
            transform: translateY(-1px);
        }

        /* Captcha Styling */
        .captcha-container {
            background: #f8fafc;
            border: 1px dashed #cbd5e0;
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .captcha-box {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 15px;
        }

        .captcha-display {
            flex: 1;
            background: #fff;
            height: 55px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Courier New', monospace;
            font-weight: 800;
            font-size: 1.6rem;
            letter-spacing: 6px;
            color: var(--primary-ungu);
            border: 1px solid #edf2f7;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.02);
            position: relative;
            overflow: hidden;
            user-select: none;
        }

        /* Efek Noise pada Captcha */
        .captcha-display::after {
            content: '';
            position: absolute;
            inset: 0;
            background-image: repeating-linear-gradient(45deg, transparent, transparent 5px, rgba(111,66,193,0.03) 5px, rgba(111,66,193,0.03) 6px);
            pointer-events: none;
        }

        .btn-refresh {
            width: 55px;
            height: 55px;
            border-radius: 12px;
            border: 1px solid #edf2f7;
            background: #fff;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #a0aec0;
            transition: 0.2s;
        }

        .btn-refresh:hover {
            color: var(--primary-ungu);
            background: #f1f5f9;
            transform: rotate(30deg);
        }

        /* Action Button */
        .btn-check {
            width: 100%;
            padding: 16px;
            border-radius: 16px;
            border: none;
            background: linear-gradient(135deg, var(--primary-ungu) 0%, var(--primary-light) 100%);
            color: #fff;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(111, 66, 193, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-check:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(111, 66, 193, 0.35);
            filter: brightness(1.1);
        }

        .btn-check:active {
            transform: translateY(0);
        }

        .footer-info {
            text-align: center;
            margin-top: 30px;
            font-size: 0.75rem;
            color: #94a3b8;
            line-height: 1.5;
        }

        .footer-info strong {
            color: var(--primary-ungu);
        }
    </style>
</head>
<body>

    <div class="track-card">
        <div class="header">
            <div class="logo-box">
                <img src="{{ asset('images/logo.png') }}" alt="KLA Logo" class="brand-logo">
            </div>
            <h2>Track My Case</h2>
            <p>Periksa status perbaikan unit Anda secara real-time</p>
        </div>

        @if(session('error') || $errors->any())
            <div class="alert alert-error">
                {{ session('error') ?? $errors->first() }}
            </div>
        @endif

        <form action="{{ route('track.check') }}" method="POST">
            @csrf

            <div class="input-wrapper">
                <label class="form-label">COF ID / Serial Number</label>
                <input name="case_input" value="{{ old('case_input') }}" type="text" class="form-input" placeholder="Masukkan COF-ID atau SN" required>
            </div>

            <div class="input-wrapper">
                <label class="form-label">Phone No. / Email</label>
                <input name="contact" value="{{ old('contact') }}" type="text" class="form-input" placeholder="Contoh: 0812xxx atau email@anda.com" required>
            </div>

            <div class="captcha-container">
                <label class="form-label">Keamanan</label>
                <div class="captcha-box">
                    <div class="captcha-display">
                        {{ $captcha }}
                    </div>
                    <button type="button" class="btn-refresh" onclick="location.reload();" title="Ganti Kode">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21.5 2v6h-6M2.5 22v-6h6M2 11.5a10 10 0 0 1 18.8-4.3L21.5 8M22 12.5a10 10 0 0 1-18.8 4.3L2.5 16"></path>
                        </svg>
                    </button>
                </div>
                <input type="text" name="captcha_input" class="form-input" placeholder="Ketik kode di atas" autocomplete="off" required>
            </div>

            <button type="submit" class="btn-check">
                <span>CHECK STATUS</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </button>
        </form>

        <div class="footer-info">
                    Powered by <strong>PT. Harmoni Putra Solusindo</strong> © 2026 | EB Group

        </div>
    </div>

</body>
</html>