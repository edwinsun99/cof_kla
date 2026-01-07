<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    :root {
        --primary-purple: #6a0dad;
        --secondary-purple: #8e44ad;
        --accent-yellow: #ffcc00; /* Aksen Kuning */
        --glass-white: rgba(255, 255, 255, 0.85);
        --text-dark: #2d3436;
        --text-muted: #636e72;
    }

    .page-wrapper {
        font-family: 'Plus Jakarta Sans', sans-serif;
        padding: 60px 20px;
        background: radial-gradient(circle at top left, #f7f2fb, #ffffff);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: flex-start;
    }

    .main-card {
        max-width: 900px;
        width: 100%;
        background: var(--glass-white);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-radius: 24px;
        padding: 40px;
        box-shadow: 0 20px 40px rgba(106, 13, 173, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.5);
        position: relative;
    }

    /* Aksen garis ungu-kuning di atas */
    .main-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 50px;
        right: 50px;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-purple), var(--accent-yellow));
        border-radius: 0 0 10px 10px;
    }

    .page-title {
        text-align: center;
        color: var(--primary-purple);
        font-weight: 800;
        font-size: 1.75rem;
        margin-bottom: 8px;
        letter-spacing: -0.5px;
    }

    .page-subtitle {
        text-align: center;
        color: var(--text-muted);
        font-size: 0.9rem;
        margin-bottom: 40px;
    }

    /* Status Badge Modern */
    .status-container {
        display: flex;
        justify-content: center;
        margin-bottom: 40px;
    }

    .status-badge {
        background: linear-gradient(135deg, var(--primary-purple), var(--secondary-purple));
        color: #ffffff;
        padding: 12px 28px;
        border-radius: 100px;
        font-weight: 700;
        font-size: 1.1rem;
        box-shadow: 0 10px 20px rgba(106, 13, 173, 0.2);
        display: flex;
        align-items: center;
        gap: 10px;
        border: 2px solid var(--accent-yellow); /* Aksen kuning pada status */
    }

    /* Grid Layout */
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-bottom: 40px;
    }

    .info-section h4 {
        color: var(--primary-purple);
        font-weight: 700;
        font-size: 1rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .info-section h4::after {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }

    .data-row {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #f1f1f1;
    }

    .data-label {
        color: var(--text-muted);
        font-weight: 500;
        font-size: 0.9rem;
    }

    .data-value {
        color: var(--text-dark);
        font-weight: 600;
        font-size: 0.95rem;
        text-align: right;
    }

    /* Button Back Modern */
    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 24px;
        background: #f1f2f6;
        color: var(--text-muted);
        text-decoration: none;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .btn-back:hover {
        background: #dfe6e9;
        color: var(--primary-purple);
        transform: translateX(-5px);
    }

    @media (max-width: 600px) {
        .main-card { padding: 25px; }
        .data-row { flex-direction: column; }
        .data-value { text-align: left; margin-top: 4px; }
    }
</style>

<div class="page-wrapper">
    <div class="main-card">
        <h1 class="page-title">Service Tracking Dashboard</h1>
        <p class="page-subtitle">Detail informasi perbaikan unit Anda</p>

        <div class="status-container">
            <div class="status-badge">
                <span style="font-size: 0.8rem; opacity: 0.8; font-weight: 500;">CURRENT STATUS:</span>
                {{ strtoupper($service->status) }}
            </div>
        </div>

        <div class="info-grid">
            <div class="info-section">
                <h4>Case Details</h4>
                <div class="data-row">
                    <span class="data-label">COF / Case ID</span>
                    <span class="data-value" style="color: var(--primary-purple);">{{ $service->cof_id }}</span>
                </div>
                <div class="data-row">
                    <span class="data-label">Customer Name</span>
                    <span class="data-value">{{ $service->customer_name }}</span>
                </div>
                <div class="data-row">
                    <span class="data-label">Contact</span>
                    <span class="data-value">{{ $service->contact ?? $service->phone_number }}</span>
                </div>
                <div class="data-row">
                    <span class="data-label">Received Date</span>
                    <span class="data-value">{{ \Carbon\Carbon::parse($service->received_date)->format('d M Y') }}</span>
                </div>
            </div>

            <div class="info-section">
                <h4>Product Information</h4>
                <div class="data-row">
                    <span class="data-label">Brand</span>
                    <span class="data-value">{{ $service->brand }}</span>
                </div>
                <div class="data-row">
                    <span class="data-label">Nama Type</span>
                    <span class="data-value">{{ $service->nama_type }}</span>
                </div>
                <div class="data-row">
                    <span class="data-label">Serial Number</span>
                    <span class="data-value" style="font-family: monospace; letter-spacing: 1px;">{{ $service->serial_number }}</span>
                </div>
                <div class="data-row">
                    <span class="data-label">Product Number</span>
                    <span class="data-value">{{ $service->product_number }}</span>
                </div>
            </div>
        </div>

        <div style="text-align: center; border-top: 1px solid #eee; padding-top: 30px;">
            <a href="{{ route('track.form') }}" class="btn-back">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                Back to Tracking
            </a>
        </div>
    </div>
</div>