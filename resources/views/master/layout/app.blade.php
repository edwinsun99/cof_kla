<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<!-- Bootstrap Bundle JS (wajib untuk tab, modal, dropdown, dll) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Integrated Service Delivery 2025')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }r
        .header {
            background: #6a0dad; /* ungu */
            color: white;
            padding: 10px 20px;
            font-size: 20px;
            font-weight: bold;
        }
        .sidebar {
            width: 220px;
            background: #f4f4f4;
            height: 100vh;
            padding: 20px 10px;
            float: left;
            max-height: 100vh; /* Biar tingginya penuh sesuai layar */
            overflow-y: auto;  /* Aktifkan scroll vertikal */
            overflow-x: hidden; /* Hilangkan scroll horizontal */
        }

        /* Biar scroll-nya halus dan rapi */
.sidebar::-webkit-scrollbar {
  width: 8px;
}

.sidebar::-webkit-scrollbar-thumb {
  background-color: rgba(100, 100, 100, 0.3);
  border-radius: 4px;
}

.sidebar::-webkit-scrollbar-thumb:hover {
  background-color: rgba(100, 100, 100, 0.6);
}
        .sidebar .menu {
            margin-top: 20px;
        }
        .sidebar .menu a {
            display: block;
            padding: 10px;
            margin-bottom: 10px;
            text-decoration: none;
            color: white;
            background: #6a0dad;
            border-radius: 5px;
            text-align: left;
        }
        .sidebar .menu a:hover {
            background: #4b0082;
        }
        .content {
            margin-left: 240px;
            padding: 20px;
        }
        .input-group .form-control:focus {
            box-shadow: none;
            border-color: #dc3545; /* warna merah bootstrap danger */
        }

        .input-group .btn {
            font-weight: 600;
            letter-spacing: 1px;
        }

    </style>
</head>
<body>
    <div class="header">
        Customer Order Form 2025
    </div>
</div>
                <div class="sidebar">
    <form action="{{ route('case.search') }}" method="GET" class="d-flex">
        <div class="input-group shadow-sm rounded-pill">
            <input type="text" 
                   name="search" 
                   value="{{ request('search') }}" 
                   class="form-control border-0 rounded-start-pill ps-4" 
                   placeholder="🔍 Search by COF-ID, SN, or Phone...">
            <button type="submit" class="btn btn-danger rounded-end-pill px-4">
                GO
            </button>
        </div>
    </form>

       {{-- Menampilkan hasil pencarian --}}
    @if(request('search'))
        <div class="mt-3 text-center fw-bold">
            search for
            <span class="text-primary">{{ request('search') }}</span>
            @if(isset($services) && $services->count() > 0)
                : <span class="text-success">{{ $services->count() }}</span> result
            @else
                — <span class="text-danger">tidak ditemukan</span>
            @endif
        </div>
    @endif

      <div class="sidebar p-3" style="background-color: purple;">
    <a href="{{ route('home') }}" class="btn btn-light w-100 mb-2"> Home</a>
    <a href="javascript:void(0)" class="btn btn-light w-100 mb-2">Finish Repair</a>
    <a href="javascript:void(0)" class="btn btn-light w-100 mb-2">📚 Upload ERF</a>
    <a href="javascript:void(0)" class="btn btn-light w-100 mb-2">🧑‍🔧 Engineer</a>
    <a href="javascript:void(0)" class="btn btn-light w-100 mb-2">🧰 KLA Part Stock</a>
    <a href="javascript:void(0)" class="btn btn-light w-100 mb-2">🧩 Quotation Part Request (D)</a>
    <a href="javascript:void(0)" class="btn btn-light w-100 mb-2">🚥 Quotation Request</a>
    <a href="javascript:void(0)" class="btn btn-light w-100 mb-2">💎 Quotation Approved/Cancelled</a>
    <a href="{{ route('master.newcase') }}" class="btn btn-light w-100 mb-2">🪄 New Case</a>
    <a href="{{ route('services.index') }}" class="btn btn-light w-100 mb-2">📂 View Case</a>
    <a href="{{ route('roles.index') }}" class="btn btn-light w-100 mb-2">⚙️ Manage Role</a>
    <a href="#" onclick="confirmLogout(event)" class="btn btn-danger w-100">🔑 Logout</a>
</div>


<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<script>
function confirmLogout(event) {
    event.preventDefault();
    if (confirm('Are you sure want to logout?')) {
        document.getElementById('logout-form').submit();
    }
}
</script>
        </div>
    </div>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>