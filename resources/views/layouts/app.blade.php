<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
        }
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

        <div class="menu">
            <a href="{{ route('home') }}">🏠 Home</a>
            <a href="{{ route('services.index') }}">📂 View Case</a>
            <a href="#">🔑 Logout</a>
        </div>
    </div>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>