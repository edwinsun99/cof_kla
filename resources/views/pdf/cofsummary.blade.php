<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Customer Order Form</title>
    <style>
        @page {
            margin: 10px 15px; /* kecilkan margin supaya muat 1 halaman */
        }
        body { 
            font-family: DejaVu Sans, sans-serif; 
            font-size: 9px; 
            line-height: 1.2; 
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-bottom: 4px; 
            page-break-inside: avoid;
        }
        th, td { 
            border: 1px solid #000; 
            padding: 3px; 
            text-align: left; 
            vertical-align: top; 
        }
        .section-title { 
            font-weight: bold; 
            font-size: 10px;
            margin: 4px 0 2px 0; 
            text-decoration: underline;
        }
        .logo { width: 80px; }
        .no-border td { border: none !important; }
        .small { font-size: 8px; line-height: 1.1; }
        .center { text-align: center; }
        .box {
            border: 1px solid #000;
            padding: 4px;
            margin-bottom: 4px;
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <table class="no-border">
        <tr>
            <td style="width: 60%; border:none;">
                <img src="{{ public_path('images/logo.png') }}" class="logo"><br>
                <p style="margin:0; font-size:8px;">
                    <b>Ruko Mataram Plaza Blok D8<br>
                    Jl MT.Haryono 427-429, Kota Semarang<br>
                    Jawa Tengah 50613<br>
                    Telp: 08993201657</b>
                </p>
            </td>
            <td style="text-align: right; width: 40%; border:none;">
                <h3 style="margin:0; font-size:12px;">CUSTOMER ORDER FORM</h3>
                <p style="margin:1px 0; font-size:9px;"><b>COF ID:</b> {{ $case->id }}</p>
                <p style="margin:1px 0; font-size:9px;"><b>Date:</b> {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
            </td>
        </tr>
    </table>

    <!-- CUSTOMER INFO -->
    <div class="box">
        <h4 class="section-title">Customer Information</h4>
        <table>
            <tr><td style="width:30%;">Contact</td><td>{{ $case->contact }}</td></tr>
            <tr><td>Customer Name</td><td>{{ $case->customer_name }}</td></tr>
            <tr><td>Email</td><td>{{ $case->email }}</td></tr>
            <tr><td>Phone</td><td>{{ $case->phone_number }}</td></tr>
            <tr><td>Address</td><td>{{ $case->address }}</td></tr>
        </table>
    </div>

    <!-- SERVICE UNIT -->
    <div class="box">
        <h4 class="section-title">Service Unit</h4>
        <table>
            <tr><td style="width:30%;">Brand</td><td>{{ $case->brand }}</td></tr>
            <tr><td>Product Number</td><td>{{ $case->product_number }}</td></tr>
            <tr><td>Serial Number</td><td>{{ $case->serial_number }}</td></tr>
            <tr><td>Nama Type</td><td>{{ $case->nama_type }}</td></tr>
            <tr><td>Fault Desc</td><td>{{ $case->fault_description }}</td></tr>
        </table>
    </div>

    <!-- ACCESSORIES & KONDISI -->
    <div class="box">
        <h4 class="section-title">Accessories</h4>
        <p>{{ $case->accessories }}</p>
        <h4 class="section-title">Kondisi Unit</h4>
        <p>{{ $case->kondisi_unit }}</p>
    </div>

    <!-- REPAIR SUMMARY -->
    <div class="box">
        <h4 class="section-title">Repair Summary</h4>
        <p>{{ $case->repair_summary }}</p>
    </div>

    <!-- JASA SERVICE & PENGECEKAN -->
    <div class="box">
        <table>
            <tr>
                <th colspan="2" class="center">Jasa Service</th>
                <th colspan="2" class="center">Jasa Pengecekan</th>
            </tr>
            <tr>
                <td><input type="checkbox"> Printer Low End</td><td>15.000 - 50.000</td>
                <td><input type="checkbox"> Printer Low End</td><td>25.000</td>
            </tr>
            <tr>
                <td><input type="checkbox"> Printer Middle</td><td>50.000 - 60.000</td>
                <td><input type="checkbox"> Printer Middle</td><td>25.000</td>
            </tr>
            <tr>
                <td><input type="checkbox"> Ink Tank Printer</td><td>50.000 - 90.000</td>
                <td><input type="checkbox"> Ink Tank Printer</td><td>30.000</td>
            </tr>
            <tr>
                <td><input type="checkbox"> Server/WorkStation</td><td>100.000 - 125.000</td>
                <td><input type="checkbox"> Server/WorkStation</td><td>60.000</td>
            </tr>
            <tr>
                <td><input type="checkbox"> PC/Notebook/AIO</td><td>50.000 - 65.000</td>
                <td><input type="checkbox"> PC/Notebook/AIO</td><td>30.000</td>
            </tr>
        </table>
    </div>

    <!-- FOOTER -->
    <p class="small">
        ** Service Center tidak bertanggungjawab atas kehilangan data, harap backup sebelum service.<br>
        ** Barang harus diambil max 90 hari kerja sejak selesai service.<br>
        ** DP minimal 50% & tidak dapat dikembalikan.<br>
    </p>

    <!-- SIGNATURE -->
    <table>
        <tr>
            <td style="height: 40px; text-align: center;">Penerimaan<br>Tanggal: __________</td>
            <td style="height: 40px; text-align: center;">Pengembalian<br>Tanggal: __________</td>
        </tr>
    </table>

    <p class="small center">
        Tanda tangan Anda = Persetujuan syarat perbaikan di atas.
    </p>
</body>
</html>
