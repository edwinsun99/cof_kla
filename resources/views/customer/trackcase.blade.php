<div style="min-height:80vh;display:flex;align-items:center;justify-content:center;background:#f7f2fb;padding:40px;">
  <div style="width:420px;background:#fff;border-radius:12px;padding:28px;box-shadow:0 10px 30px rgba(0,0,0,0.08);border-top:8px solid #6a0dad;">
    <h2 style="text-align:center;color:#6a0dad;margin-bottom:20px;font-weight:700;">TRACK YOUR CASE</h2>

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

      <div style="display:flex;align-items:center;gap:12px;margin-bottom:12px;">
        <div style="flex:0 0 180px;height:64px;background:#efe7f8;border-radius:8px;display:flex;justify-content:center;align-items:center;font-size:28px;font-weight:700;color:#111;">3 4 Y 7</div>
        <div style="color:#6a0dad;cursor:pointer;font-size:20px;">⟳</div>
      </div>

      <label style="font-weight:600;">Code :</label>
      <input name="captcha" type="text" placeholder="Enter Code"
             style="width:100%;padding:12px;border-radius:8px;border:1px solid #e0dff5;margin-bottom:16px;font-size:15px;">

      <button type="submit" style="width:100%;background:#6a0dad;color:white;padding:12px;border-radius:8px;border:none;font-size:16px;">
        Check
      </button>
    </form>
  </div>
</div>
