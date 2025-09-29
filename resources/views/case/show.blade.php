@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Header Section with enhanced styling -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm bg-gradient" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <div class="card-body py-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center text-white">
                            <div class="bg-white bg-opacity-20 rounded-circle p-3 me-3">
                                <i class="bi bi-file-earmark-text fs-2"></i>
                            </div>
                            <div>
                                <h1 class="mb-1 fw-bold">Detail Case</h1>
                                <p class="mb-0 opacity-75">View and manage case information</p>
                            </div>
                        </div>
                        
                       <!-- Action buttons with improved styling -->
                        <div class="d-flex gap-3">
                            <a href="#" class="btn btn-success btn-lg shadow-sm position-relative overflow-hidden" style="min-width: 180px;">
                                <span class="btn-shine"></span>
                                <i class="bi bi-file-earmark-excel-fill me-2"></i>
                                <span class="fw-semibold">Ekspor ke Excel</span>
                                <i class="bi bi-download ms-2"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-lg shadow-sm position-relative overflow-hidden" style="min-width: 170px;">
                                <span class="btn-shine"></span>
                                <i class="bi bi-file-earmark-pdf-fill me-2"></i>
                                <span class="fw-semibold">Unduh PDF</span>
                                <i class="bi bi-download ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <!-- Custom styled tabs -->
                <div class="card-header bg-white border-bottom-0 px-4 pt-4 pb-0">
                    <ul class="nav nav-pills nav-fill" id="caseTab" role="tablist" style="background: #f8f9fa; border-radius: 10px; padding: 5px;">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active fw-semibold" id="case-tab" data-bs-toggle="tab" 
                                data-bs-target="#case" type="button" role="tab" 
                                style="border-radius: 8px; transition: all 0.3s ease;">
                                <i class="bi bi-briefcase me-2"></i>
                                Case Information
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-semibold" id="customer-tab" data-bs-toggle="tab" 
                                data-bs-target="#customer" type="button" role="tab"
                                style="border-radius: 8px; transition: all 0.3s ease;">
                                <i class="bi bi-person me-2"></i>
                                Customer Details
                            </button>
                        </li>
                    </ul>
                </div>

                <!-- Tab Content with enhanced layout -->
                <div class="card-body p-4">
                    <div class="tab-content" id="caseTabContent">
                        <div class="tab-pane fade show active" id="case" role="tabpanel">
                            @include('partials.detailcase', ['case' => $case])
                        </div>
                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Custom styles for enhanced appearance */
.nav-pills .nav-link {
    color: #6c757d;
    background: transparent;
}

.nav-pills .nav-link.active {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    color: white !important;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

.nav-pills .nav-link:hover:not(.active) {
    background: rgba(102, 126, 234, 0.1);
    color: #667eea;
}

.btn-light:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;
}

.card {
    border-radius: 15px;
    overflow: hidden;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .d-flex.justify-content-between {
        flex-direction: column;
        gap: 1rem;
    }
    
    .d-flex.gap-2 {
        flex-direction: column;
        width: 100%;
    }
    
    .btn-lg {
        width: 100%;
    }
    
    .nav-pills {
        flex-direction: column;
    }
    
    .nav-pills .nav-link {
        margin-bottom: 5px;
    }
}
</style>
@endsection