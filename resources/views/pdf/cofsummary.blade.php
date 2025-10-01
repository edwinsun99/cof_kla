<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Customer Order Form</title>
    <style>
        @page {
            margin: 15px 20px; /* kecilkan margin supaya muat 1 halaman */
        }
        body { 
            font-family: DejaVu Sans, sans-serif; 
            font-size: 11px; 
            line-height: 1.3; 
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-bottom: 6px; 
            page-break-inside: avoid; /* biar tabel nggak kebelah */
        }
        th, td { 
            border: 1px solid #000; 
            padding: 4px; 
            text-align: left; 
            vertical-align: top; 
        }
        .section-title { 
            font-weight: bold; 
            margin: 6px 0 4px 0; 
            font-size: 12px;
        }
        .logo { 
            width: 120px; 
        }
        .no-border td { 
            border: none; 
        }
        .small { 
            font-size: 9px; 
            line-height: 1.2; 
        }
        .center { 
            text-align: center; 
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <table class="no-border">
        <tr>
            <td style="width: 60%; border:none;">
                <img src="{{ public_path('images/logo.png') }}" class="logo"><br>
                <p style="margin:0; font-size:10px;">
                    <b>Ruko Mataram Plaza Blok D8, Jl MT.Haryono 427-429 <br>
                    Kota Semarang <br>
                    Jawa Tengah 50613 <br>
                    Telp: 08993201657</b>
                </p>
            </td>
            <td style="text-align: right; width: 40%; border:none;">
                <h3 style="margin:0; font-size:14px;">Customer Order Form (COF)</h3>
                <p style="margin:2px 0; font-size:11px;"><b>COF ID:</b> {{ $case->id }}</p>
            </td>
        </tr>
    </table>

    <!-- DATES -->
    <p style="margin:2px 0;"><strong>Received Date:</strong> {{ $case->received_date }}</p>
    <p style="margin:2px 0;"><strong>Started Date:</strong> {{ $case->started_date }}</p>
    <p style="margin:2px 0 8px 0;"><strong>Finished Date:</strong> {{ $case->finished_date }}</p>

    <!-- CUSTOMER -->
    <h4 class="section-title">Customer</h4>
    <table>
        <tr><td>Contact</td><td>{{ $case->contact }}</td></tr>
        <tr><td>Customer Name</td><td>{{ $case->customer_name }}</td></tr>
        <tr><td>Phone Number</td><td>{{ $case->phone_number }}</td></tr>
        <tr><td>Address</td><td>{{ $case->address }}</td></tr>
    </table>

    <!-- SERVICE UNIT -->
    <h4 class="section-title">Service Unit</h4>
    <table>
        <tr><td>Brand</td><td>{{ $case->brand }}</td></tr>
        <tr><td>Product Number</td><td>{{ $case->product_number }}</td></tr>
        <tr><td>Serial Number</td><td>{{ $case->serial_number }}</td></tr>
        <tr><td>Nama Type</td><td>{{ $case->nama_type }}</td></tr>
        <tr><td>Fault Desc</td><td>{{ $case->fault_description }}</td></tr>
    </table>

    <!-- ACCESSORIES -->
    <h4 class="section-title">Accessories</h4>
    <p style="margin:2px 0 6px 0;">{{ $case->accessories }}</p>

    <!-- KONDISI -->
    <h4 class="section-title">Kondisi Unit</h4>
    <p style="margin:2px 0 6px 0;">{{ $case->kondisi_unit }}</p>

    <!-- REPAIR SUMMARY -->
    <h4 class="section-title">Repair Summary</h4>
    <p style="margin:2px 0 6px 0;">{{ $case->repair_summary }}</p>

    <!-- NOTES -->
    <p class="small" style="margin:4px 0 8px 0;">
        ** Pihak Service Center tidak bertanggungjawab atas keamanan dan kehilangan data, harap sebelum memasukkan
        service dapat membackup data terlebih dahulu <br>
        ** Prediksi barang diambil kembali sebelum 90 hari kerja sejak selesai service/cancel service. Setelah jangka
        waktu tersebut, pihak service mempunyai kewenangan penuh untuk di-scrap <br>
        ** Pembayaran DP di minimal 50% sebagai syarat order part <br>
        ** Pembayaran DP tidak dapat dikembalikan (barang yang sudah dipesan tidak dapat dicancel)
    </p>

    <!-- JASA SERVICE & PENGECEKAN -->
    <table>
        <tr>
            <th colspan="2" class="center">Jasa Service</th>
            <th colspan="2" class="center">Jasa Pengecekan</th>
        </tr>
        <tr>
            <td><input type="checkbox"> Printer Low End / Deskjet</td>
            <td>15.000 - 50.000</td>
            <td><input type="checkbox"> Printer Low End / Deskjet</td>
            <td>25.000</td>
        </tr>
        <tr>
            <td><input type="checkbox"> Printer Middle Laserjet / Officejet</td>
            <td>50.000 - 60.000</td>
            <td><input type="checkbox"> Printer Middle Laserjet / Officejet</td>
            <td>25.000</td>
        </tr>
        <tr>
            <td><input type="checkbox"> Ink Tank Printer</td>
            <td>50.000 - 90.000</td>
            <td><input type="checkbox"> Ink Tank Printer</td>
            <td>30.000</td>
        </tr>
        <tr>
            <td><input type="checkbox"> Server / Work Station</td>
            <td>100.000 - 125.000</td>
            <td><input type="checkbox"> Server / Work Station</td>
            <td>60.000</td>
        </tr>
        <tr>
            <td><input type="checkbox"> PC / Notebook / PC All In One</td>
            <td>50.000 - 65.000</td>
            <td><input type="checkbox"> PC / Notebook / PC All In One</td>
            <td>30.000</td>
        </tr>
    </table>

    <!-- SIGNATURE -->
    <table>
        <tr>
            <td style="height: 50px; text-align: center;">Penerimaan<br><br>Tanggal: __________</td>
            <td style="height: 50px; text-align: center;">Pengembalian<br><br>Tanggal: __________</td>
        </tr>
    </table>

    <p class="small center" style="margin-top:4px;">
        Tanda tangan Anda merupakan persetujuan terhadap syarat perbaikan di atas.
    </p>
</body>
</html>
