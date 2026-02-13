{{-- Kolom kanan: Info Customer --}}
<div class="col-md-6">
    <div class="glass-card p-4 h-100 shadow-sm" style="border-radius: 15px; background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(10px);">
        <h5 class="section-title mb-4" style="color: #6f42c1; font-weight: 600;">
            <i class="fas fa-user-tie me-3"></i>Customer Details
        </h5>
        
        <div class="container-fluid p-0">
            <div class="d-flex flex-wrap align-items-end gap-4 mb-3">
                
                <div style="flex: 0 1 auto; min-width: 100px;">
                    <p class="text-muted small mb-1" style="letter-spacing: 0.5px; font-weight: 500;">COF-ID</p>
                    <p class="text-primary fw-bold mb-0">{{ $case->cof_id }}</p>
                </div>

                <div class="vr opacity-25 d-none d-md-block" style="height: 35px; align-self: center;"></div>

                <div style="flex: 0 1 auto; min-width: 120px;">
                    <p class="text-muted small mb-1" style="letter-spacing: 0.5px; font-weight: 500;">CONTACT (Company/Personal)</p>
                    <p class="text-dark mb-0" style="font-size: 0.95rem;">{{ $case->contact }}</p>
                </div>

                <div class="vr opacity-25 d-none d-md-block" style="height: 35px; align-self: center;"></div>

                <div style="flex: 1 1 200px;">
                    <p class="text-muted small mb-1" style="letter-spacing: 0.5px; font-weight: 500;">CUSTOMER NAME</p>
                    <p class="fw-bold text-dark mb-0 d-flex align-items-center" style="font-size: 1.05rem;">
                        <i class="fas fa-building me-2 text-muted" style="font-size: 0.9rem;"></i>
                        <span class="text-truncate">{{ $case->customer_name }}</span>
                    </p>
                </div>
            </div>

            <hr class="my-3 opacity-25">

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <p class="text-muted small mb-1" style="letter-spacing: 0.5px; font-weight: 500;">EMAIL ADDRESS</p>
                    <p class="mb-0">
                        <a href="mailto:{{ $case->email }}" class="text-decoration-none text-purple d-flex align-items-center" style="color: #6f42c1;">
                            <i class="far fa-envelope me-2"></i>
                            <span class="text-truncate" style="font-size: 0.9rem;">{{ $case->email }}</span>
                        </a>
                    </p>
                </div>
                <div class="col-md-6 border-start">
                    <p class="text-muted small mb-1" style="letter-spacing: 0.5px; font-weight: 500;">PHONE NUMBER</p>
                    <p class="text-success mb-0 d-flex align-items-center" style="font-size: 0.9rem;">
                        <i class="fab fa-whatsapp me-2"></i>{{ $case->phone_number }}
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <p class="text-muted small mb-2" style="letter-spacing: 0.5px; font-weight: 500;">ADDRESS</p>
                    <div class="p-3 rounded-3 d-flex align-items-start" style="background-color: #f8f9fa; border-left: 4px solid #dc3545;">
                        <i class="fas fa-map-marker-alt me-3 text-danger mt-1"></i>
                        <p class="mb-0 text-muted" style="font-size: 0.85rem; line-height: 1.5;">
                            {{ $case->address }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>