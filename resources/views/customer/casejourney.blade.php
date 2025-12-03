<div style="padding:40px;background:#f7f2fb;min-height:80vh;">
  <div style="max-width:900px;margin:0 auto;background:#fff;border-radius:12px;padding:26px;box-shadow:0 12px 30px rgba(0,0,0,0.06);border-top:6px solid #6a0dad;">
    <h1 style="text-align:center;color:#6a0dad;margin-bottom:18px;">My Case Journey</h1>

    <div style="display:flex;gap:20px;flex-wrap:wrap;">
      <div style="flex:1;min-width:280px;">
        <h4 style="margin-bottom:8px;">Case Details</h4>
        <table style="width:100%;">
          <tr><td style="width:160px;font-weight:600;color:#444;">COF / Case ID</td><td>{{ $service->cof_id }}</td></tr>
<tr>
    <td style="font-weight:700; font-size:21px; color:#4B0082;">Status</td>
    <td style="font-weight:700; font-size:21px; color:#6A1B9A;">{{ $service->status }}</td>
</tr>
          <tr><td style="font-weight:600;color:#444;">Customer</td><td>{{ $service->customer_name }}</td></tr>
          <tr><td style="font-weight:600;color:#444;">Contact</td><td>{{ $service->contact ?? $service->phone_number }}</td></tr>
          <tr><td style="font-weight:600;color:#444;">Received Date</td><td>{{ $service->received_date }}</td></tr>
        </table>
      </div>

      <div style="flex:1;min-width:280px;">
        <h4 style="margin-bottom:8px;">Product Details</h4>
        <table style="width:100%;">
          <tr><td style="width:160px;font-weight:600;color:#444;">Brand</td><td>{{ $service->brand }}</td></tr>
          <tr><td style="font-weight:600;color:#444;">Product Number</td><td>{{ $service->product_number }}</td></tr>
          <tr><td style="font-weight:600;color:#444;">Serial Number</td><td>{{ $service->serial_number }}</td></tr>
          <tr><td style="font-weight:600;color:#444;">Nama Type</td><td>{{ $service->nama_type }}</td></tr>
        </table>
      </div>
    </div>

    <div style="margin-top:18px;">
      <a href="{{ route('track.form') }}" style="display:inline-block;padding:10px 14px;background:#eee;border-radius:8px;color:#444;text-decoration:none;">Back to Tracking</a>
    </div>
  </div>
</div>
