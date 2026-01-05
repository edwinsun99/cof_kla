<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Integrated Service Delivery 2025')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
    :root {
        --primary-color: #6a0dad;
        --header-height: 70px;
        --sidebar-mini-width: 72px;
        --sidebar-expand-width: 240px;
        --transition-speed: 0.3s;
    }

    body {
        margin: 0;
        background-color: #f9f9f9;
        font-family: 'Roboto', Arial, sans-serif;
    }

    /* --- FIXED HEADER --- */
    .header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        height: var(--header-height);
        background: #ffffff;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 16px;
        z-index: 2000; /* Paling atas */
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    .header-left { display: flex; align-items: center; min-width: 200px; }
    .header-left img { height: 40px; margin-left: 10px; object-fit: contain; }

    .header-center { flex: 0 1 600px; margin: 0 20px; }
    .header-right { min-width: 50px; display: flex; justify-content: flex-end; }

    /* --- SIDEBAR ALA YOUTUBE --- */
    .sidebar {
        position: fixed;
        top: var(--header-height);
        left: 0;
        bottom: 0;
        width: var(--sidebar-mini-width);
        background: #ffffff;
        overflow-y: auto;
        overflow-x: hidden;
        transition: width var(--transition-speed) ease;
        z-index: 1500; /* Di bawah header, di atas content */
        border-right: 1px solid #e5e5e5;
    }

    .sidebar.expanded {
        width: var(--sidebar-expand-width);
    }

    /* Menu Item Styling */
    .menu-item {
        display: flex;
        align-items: center;
        height: 48px;
        padding: 0 24px;
        text-decoration: none;
        color: #030303;
        transition: background 0.2s;
        white-space: nowrap;
    }

    .menu-item:hover { background: #f2f2f2; }
    .menu-item i { font-size: 1.4rem; min-width: 24px; margin-right: 24px; }
    
    /* Sembunyikan Text saat Mini */
    .menu-item span { 
        font-size: 14px;
        opacity: 0;
        transition: opacity 0.1s;
    }
    .sidebar.expanded .menu-item span { opacity: 1; }

    /* --- CONTENT AREA --- */
    .content {
        padding: 24px;
        margin-top: var(--header-height);
        margin-left: var(--sidebar-mini-width);
        transition: margin-left var(--transition-speed) ease;
    }

    /* Saat Sidebar Melebar, Konten Tetap di Samping (opsional) atau Tertutup Overlay */
    /* Jika ingin konten tergeser: */
    /* .content.shifted { margin-left: var(--sidebar-expand-width); } */

    /* --- OVERLAY --- */
    .sidebar-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1400; /* Di bawah sidebar */
        display: none;
    }
    .sidebar-overlay.active { display: block; }

    /* Accordion Fix */
    .sidebar .accordion-button { padding: 12px 24px; background: none !important; box-shadow: none !important; }
    .sidebar:not(.expanded) .accordion-button::after { display: none; }
    .sidebar:not(.expanded) .accordion-button span { display: none; }
</style>

</head>

<body>
    <div id="overlay" class="sidebar-overlay" onclick="toggleSidebar()"></div>

    <header class="header">
        <div class="header-left">
            <i class="bi bi-list fs-2" style="cursor:pointer" onclick="toggleSidebar()"></i>
            <a href="{{ route('ce.home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo KLA">
            </a>
        </div>

        <div class="header-center">
            <form action="{{ route('case.search') }}" method="GET" class="d-flex">
                <input type="text" name="search" value="{{ request('search') }}" 
                       class="form-control search-input" placeholder="Search cases...">
                <button class="btn search-btn" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>

        <div class="header-right">
            <div class="dropdown">
                <a href="#" class="dropdown-toggle hide-caret" data-bs-toggle="dropdown">
                    <img src="{{ Auth::user()->profile_photo ? asset('storage/'.Auth::user()->profile_photo) : asset('images/default-avatar.png') }}" 
                         width="48" height="48" class="rounded-circle border border-2 border-primary" style="object-fit: cover;">
                </a>
                <ul class="dropdown-menu dropdown-menu-end p-3 mt-3" style="width: 280px;">
                    <li class="text-center pb-3 border-bottom mb-2">
                        <img src="{{ Auth::user()->profile_photo ? asset('storage/'.Auth::user()->profile_photo) : asset('images/default-avatar.png') }}" 
                             width="80" height="80" class="rounded-circle mb-2 border" style="object-fit: cover;">
                        <div class="fw-bold fs-5">{{ Auth::user()->username }}</div>
                        <small class="text-muted">Customer Engineer@Tegal</small>
                    </li>
                    <li><a class="dropdown-item py-2" href="{{ route('ce.profile.edit') }}"><i class="bi bi-person-gear me-2"></i> Edit Profil</a></li>
                    <li><a class="dropdown-item py-2 text-danger" href="#" onclick="confirmLogout(event)"><i class="bi bi-box-arrow-right me-2"></i> Sign Out</a></li>
                </ul>
            </div>
        </div>
    </header>

    <nav class="sidebar" id="mySidebar">
        <a href="{{ route('ce.home') }}" class="menu-item mt-3">
            <i class="bi bi-house-door"></i> <span>Home</span>
        </a>

        <div class="accordion accordion-flush" id="sidebarAccordion">
            <div class="accordion-item border-0 bg-transparent">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed bg-transparent shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#menuCases">
                        <i class="bi bi-folder me-3 fs-5"></i> <span>Cases Management</span>
                    </button>
                </h2>
                <div id="menuCases" class="accordion-collapse collapse" data-bs-parent="#sidebarAccordion">
                    <div class="accordion-body p-0">
                        <a href="{{ route('ce.services.index') }}" class="menu-item py-2 ps-5 text-sm"><span>View All Cases</span></a>
                        <a href="{{ route('cases.new') }}" class="menu-item py-2 ps-5 text-sm"><span>New Case</span></a>
                        <a href="{{ route('ce.finish.repair') }}" class="menu-item py-2 ps-5 text-sm"><span>Finish Repair</span></a>
                    </div>
                </div>
            </div>
        </div>

        <a href="{{ route('ce.engineer.index') }}" class="menu-item">
            <i class="bi bi-wrench-adjustable"></i> <span>Engineer List</span>
        </a>
        <a href="{{ route('ce.quotation.appcancl') }}" class="menu-item">
            <i class="bi bi-gem"></i> <span>Quotation Status</span>
        </a>
        <a href="{{ route('erf.select') }}" class="menu-item">
            <i class="bi bi-cloud-arrow-up"></i> <span>Upload ERF</span>
        </a>
    </nav>

    <main class="content" id="mainContent">
        @if(request('search'))
            <div class="alert alert-light border shadow-sm mb-4">
                🔍 Results for: <strong>{{ request('search') }}</strong>
            </div>
        @endif
        @yield('content')
    </main>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById("mySidebar");
            const overlay = document.getElementById("overlay");
            
            sidebar.classList.toggle("expanded");
            overlay.classList.toggle("active");
        }

        function confirmLogout(event) {
            event.preventDefault();
            if (confirm('Sign out from your account?')) {
                document.getElementById('logout-form').submit();
            }
        }
    </script>
</body>
</html>