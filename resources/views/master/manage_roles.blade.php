@extends('master.layout.app')

@section('title', 'Manage Roles')

@section('content')
<style>
    /* 🌿 Soft Modern Style */
    body {
        background-color: #f5f7fb;
        font-family: "Poppins", sans-serif;
    }

    h4 {
        font-weight: 600;
    }

    .card {
        border: none;
        border-radius: 16px;
        background: #fff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        transition: 0.3s;
    }

    .card:hover {
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
    }

    .table th {
        color: #6c757d;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
    }

    .table td {
        color: #333;
        vertical-align: middle;
    }

    .badge {
        font-size: 0.8rem;
        padding: 0.5em 0.8em;
        border-radius: 10px;
        letter-spacing: 0.3px;
    }

    .btn-primary {
        background: linear-gradient(90deg, #4f9cff, #70b8ff);
        border: none;
        border-radius: 10px;
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #3b86e0, #5aa7f5);
    }

    .modal-content {
        border-radius: 16px;
        border: none;
    }

    .modal-header,
    .modal-footer {
        background-color: #f8f9fa;
    }

    .form-control,
    .form-select {
        border-radius: 10px;
        border: 1px solid #dfe3eb;
        padding: 10px 14px;
        font-size: 0.95rem;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #4f9cff;
        box-shadow: 0 0 0 0.2rem rgba(79, 156, 255, 0.25);
    }

    .empty-state img {
        opacity: 0.7;
        filter: grayscale(40%);
    }

    .empty-state h5 {
        font-weight: 500;
        color: #777;
    }
</style>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1 text-dark">Manage Roles</h4>
            <p class="text-muted mb-0">Kelola akun pengguna dan role dalam sistem</p>
        </div>
        <button class="btn btn-primary shadow-sm px-3" data-bs-toggle="modal" data-bs-target="#addRoleModal">
            <i class="bi bi-person-plus me-2"></i> Add New Role
        </button>
    </div>

    <div class="card">
        <div class="card-body">
            @if ($users->count() > 0)
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>no</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="fw-semibold">{{ $user->un }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span class="badge bg-{{ $user->role == 'MASTER' ? 'primary' : 'success' }}">
                                            {{ $user->role }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-outline-secondary me-1">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <form action="{{ route('roles.destroy', $user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus role ini?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5 empty-state">
                    <img src="https://cdn-icons-png.flaticon.com/512/4076/4076505.png" width="100" class="mb-3" alt="No data">
                    <h5>Belum ada role yang ditambahkan</h5>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal Tambah Role -->
<div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-semibold" id="addRoleModalLabel">Add New Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="un" class="form-control" placeholder="Masukkan username" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
                    </div>

                   <div class="mb-3 position-relative">
    <label class="form-label">Password</label>
    <div class="input-group">
        <input type="password" name="pw" id="passwordInput" class="form-control" placeholder="Masukkan password" required>
        <button type="button" class="btn btn-outline-secondary" id="togglePassword">
            <i class="bi bi-eye"></i>
        </button>
    </div>
</div>

<script>
    // Script untuk show/hide password
    document.addEventListener("DOMContentLoaded", function () {
        const togglePassword = document.querySelector("#togglePassword");
        const passwordInput = document.querySelector("#passwordInput");
        const icon = togglePassword.querySelector("i");

        togglePassword.addEventListener("click", function () {
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
            passwordInput.setAttribute("type", type);
            icon.classList.toggle("bi-eye");
            icon.classList.toggle("bi-eye-slash");
        });
    });
</script>


                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select name="role" class="form-select" required>
                            <option value="">-- Pilih Role --</option>
                            <option value="CS">Customer Service</option>
                            <option value="CE">Customer Engineer</option>
                            <option value="CM">Call Management</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
