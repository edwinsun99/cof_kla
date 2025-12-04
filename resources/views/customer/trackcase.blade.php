<style>
    :root {
        --captcha-bg: #f3f4f6;
        --captcha-text: #374151;
        --primary-color: #4f46e5; /* Sesuaikan dengan warna brand Anda */
        --border-color: #e5e7eb;
        --radius: 8px;
    }

    /* Container Utama */
    .captcha-container {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        max-width: 320px;
        background: #ffffff;
        padding: 20px;
        border-radius: 12px;
        border: 1px solid var(--border-color);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    }

    .captcha-label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: #6b7280;
        margin-bottom: 10px;
    }

    /* Wrapper Kode & Tombol */
    .captcha-box {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 15px;
    }

    /* Tampilan Kode Captcha */
    .captcha-display {
        flex-grow: 1;
        background-color: var(--captcha-bg);
        border: 1px solid var(--border-color);
        border-radius: var(--radius);
        padding: 12px;
        text-align: center;
        position: relative;
        overflow: hidden;
        user-select: none; /* Mencegah user copy-paste teks captcha */
    }

    .captcha-code {
        font-family: 'Courier New', Courier, monospace; /* Font monospace agar terlihat teknis */
        font-size: 24px;
        font-weight: 800;
        letter-spacing: 6px;
        color: var(--captcha-text);
        position: relative;
        z-index: 2;
        font-style: italic;
    }

    /* Efek Noise/Garis Background (Opsional untuk estetika) */
    .captcha-noise {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0.1;
        background-image: repeating-linear-gradient(
            45deg,
            #000 0,
            #000 1px,
            transparent 0,
            transparent 50%
        );
        z-index: 1;
        pointer-events: none;
    }

    /* Tombol Refresh Modern */
    .btn-refresh {
        background: #fff;
        border: 1px solid var(--border-color);
        border-radius: var(--radius);
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: #6b7280;
        transition: all 0.2s ease;
    }

    .btn-refresh:hover {
        background-color: var(--captcha-bg);
        color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .btn-refresh:active {
        transform: scale(0.95);
    }

    /* Animasi putar saat hover */
    .btn-refresh:hover svg {
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        100% { transform: rotate(360deg); }
    }

    /* Input Styling */
    .captcha-input {
        width: 100%;
        padding: 12px 15px;
        font-size: 15px;
        border: 1px solid var(--border-color);
        border-radius: var(--radius);
        outline: none;
        transition: border-color 0.2s, box-shadow 0.2s;
        box-sizing: border-box; /* Penting agar padding tidak merusak lebar */
    }

    .captcha-input:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1); /* Efek glow halus */
    }

    .captcha-input::placeholder {
        color: #9ca3af;
    }
</style>

<div style="min-height:80vh;display:flex;align-items:center;justify-content:center;background:#f7f2fb;padding:40px;">
  <div style="width:420px;background:#fff;border-radius:12px;padding:28px;box-shadow:0 10px 30px rgba(0,0,0,0.08);border-top:8px solid #6a0dad;">
    <h2 style="text-align:center;color:#6a0dad;margin-bottom:20px;font-weight:700;">TRACK MY CASE</h2>

    @if(session('error'))
      <div style="background:#ffe8e8;border:1px solid #ffbcbc;padding:10px;border-radius:6px;margin-bottom:12px;color:#900;">
        {{ session('error') }}
      </div>
    @endif

    @if($errors->any())
      <div style="background:#fff4e5;border:1px solid #ffd8a8;padding:10px;border-radius:6px;margin-bottom:12px;color:#6a3c00;">
        {{ $errors->first() }}
      </div>
    @endif

    <form action="{{ route('track.check') }}" method="POST">
      @csrf

      <label style="font-weight:600;">COF ID / SN :</label>
      <input name="case_input" value="{{ old('case_input') }}" type="text" placeholder="Enter COF ID or Serial Number"
             style="width:100%;padding:12px;border-radius:8px;border:1px solid #e0dff5;margin-bottom:12px;font-size:15px;">

      <label style="font-weight:600;">Phone no. / Email :</label>
      <input name="contact" value="{{ old('contact') }}" type="text" placeholder="Enter Phone Number or Email"
             style="width:100%;padding:12px;border-radius:8px;border:1px solid #e0dff5;margin-bottom:14px;font-size:15px;">

      <div class="captcha-container">
    <label for="captcha_input" class="captcha-label">Verifikasi Keamanan</label>
    
    <div class="captcha-box">
        <div class="captcha-display">
            <span class="captcha-code">{{ $captcha }}</span>
            <div class="captcha-noise"></div> </div>

        <button type="button" class="btn-refresh" onclick="location.reload();" title="Refresh Captcha">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21.5 2v6h-6"></path>
                <path d="M2.5 22v-6h6"></path>
                <path d="M2 11.5a10 10 0 0 1 18.8-4.3L21.5 8"></path>
                <path d="M22 12.5a10 10 0 0 1-18.8 4.3L2.5 16"></path>
            </svg>
        </button>
    </div>

    <div class="input-group">
        <input type="text" id="captcha_input" name="captcha_input" class="captcha-input" placeholder="Ketik kode di atas" autocomplete="off" required>
        <span class="input-focus-border"></span>
    </div>
</div>

      <button type="submit" style="width:100%;background:#6a0dad;color:white;padding:12px;border-radius:8px;border:none;font-size:16px;">
        Check
      </button>
    </form>
  </div>
</div>
