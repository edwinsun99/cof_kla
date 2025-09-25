<!DOCTYPE html>
<html lang="en">
<head>
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
    </style>
</head>
<body>
    <div class="header">
        Customer Order Form 2025
    </div>

    <div class="sidebar">
        <form action="" method="GET">
            <input type="text" placeholder="Search Case">
            <button type="submit">GO!</button>
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