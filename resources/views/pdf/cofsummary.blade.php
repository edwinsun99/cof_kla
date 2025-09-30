<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Customer Order Form</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 10px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        .section-title { font-weight: bold; margin-top: 10px; }
        .logo { width: 150px; }
    </style>
</head>
<body>
    <table>
        <tr>
            <td>
                <img src="{{ public_path('images/logo.png') }}" class="logo">
                <p>Alamat Toko<br>Telp: 08993201657</p>
            </td>
            <td style="text-align: right;">
                <h3>Customer Order Form (COF)</h3>
                <p>COF ID: {{ $case->id }}</p>
            </td>
        </tr>
    </table>

    <p><strong>Received Date:</strong> {{ $case->received_date }}</p>
    <p><strong>Started Date:</strong> __________</p>
    <p><strong>Finished Date:</strong> __________</p>

    <h4 class="section-title">Customer</h4>
    <table>
        <tr><td>Contact</td><td>{{ $case->contact }}</td></tr>
        <tr><td>Customer Name</td><td>{{ $case->customer_name }}</td></tr>
        <tr><td>Phone Number</td><td>{{ $case->phone }}</td></tr>
        <tr><td>Address</td><td>{{ $case->address }}</td></tr>
    </table>

    <h4 class="section-title">Service Unit</h4>
    <table>
        <tr><td>Product Number</td><td>{{ $case->product_number }}</td></tr>
        <tr><td>Serial Number</td><td>{{ $case->serial_number }}</td></tr>
        <tr><td>Nama Type</td><td>{{ $case->nama_type }}</td></tr>
        <tr><td>Fault Desc</td><td>{{ $case->fault_description }}</td></tr>
    </table>

    <h4 class="section-title">Accessories</h4>
    <p>{{ $case->accessories }}</p>

    <h4 class="section-title">Kondisi Unit</h4>
    <p>{{ $case->kondisi_unit }}</p>

    <h4 class="section-title">Repair Summary</h4>
    <p>........ isi catatan sesuai kebutuhan ........</p>

    <br><br>
    <table>
        <tr>
            <td>Penerimaan<br>Tanggal: __________</td>
            <td>Pengembalian<br>Tanggal: __________</td>
        </tr>
    </table>

    <p style="font-size: 10px;">
        Dengan tanda tangan Anda menyetujui syarat & ketentuan perbaikan.
    </p>
</body>
</html>