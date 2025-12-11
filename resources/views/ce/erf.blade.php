@extends('ce.layout.app')

@section('title', 'Upload ERF')

@section('content')

@php
    use Illuminate\Support\Str;
@endphp

{{-- POPUP SUCCESS --}}
@if(session('success'))
    <div id="erf-popup"
         style="background:#28a745;
                color:white;
                padding:15px;
                border-radius:8px;
                margin-bottom:20px;
                width: fit-content;
                font-weight:bold;
                box-shadow:0 4px 10px rgba(0,0,0,0.15);
                animation: fadeIn .3s ease;">
        ✅ {{ session('success') }}
    </div>

    <script>
        setTimeout(() => {
            let p = document.getElementById('erf-popup');
            if (p) p.style.display = 'none';
        }, 3000);
    </script>
@endif


<h3>Upload ERF untuk COF-ID: {{ $case->cof_id }}</h3>

{{-- IF BELUM ADA FILE → tampilkan form --}}
@if(! isset($case->erf_file) || ! $case->erf_file)
    <form action="{{ route('erf.upload', $case->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>File ERF (PDF/DOC/DOCX)</label>
        <input type="file" name="erf_file" class="form-control mb-3" required>

        <button class="btn btn-success">Upload</button>
    </form>
@endif


{{-- PREVIEW ERF --}}
@if(isset($case->erf_file) && $case->erf_file)
    <div class="mt-4 p-3" style="border: 1px solid #ddd; border-radius:10px;">

        <h4>📄 ERF yang sudah diupload:</h4>

        {{-- PDF --}}
        @if(\Illuminate\Support\Str::endsWith($case->erf_file, '.pdf'))
            <embed
                src="{{ asset('storage/' . $case->erf_file) }}"
                type="application/pdf"
                width="100%"
                height="650px"
                style="border:1px solid #aaa; border-radius:8px;">
            {{-- embed is self-closing; no </embed> --}}
        @else
            {{-- DOC / DOCX --}}
            <p>📁 File ERF ({{ pathinfo($case->erf_file, PATHINFO_EXTENSION) }}) berhasil diupload.</p>
        @endif

        <a class="btn btn-primary mt-3" href="{{ route('erf.download', $case->id) }}">
            Download ERF
        </a>

    </div>
@endif

@endsection
