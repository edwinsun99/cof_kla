<div class="row">
    {{-- Kolom kiri: info case --}}
    <div class="col-md-6">
        <h5>Case</h5>
        <table class="table table-bordered">
            <tr>
                <th>COF-ID</th>
                <td>{{ $case->id }}</td>
            </tr>
            <tr>
                <th>Fault Desc</th>
                <td>{{ $case->fault_description }}</td>
            </tr>
            <tr>
                <th>Unit Condition</th>
                <td>{{ $case->kondisi_unit }}</td>
            </tr>
            <tr>
                <th>Received Date</th>
                <td>{{ $case->received_date }}</td>
            </tr>
        </table>
    </div>

    {{-- Kolom kanan: info produk --}}
    <div class="col-md-6">
        <h5>Product</h5>
        <table class="table table-bordered">
            <tr>
                <th>Brand</th>
                <td>{{ $case->brand }}</td>
            </tr>
            <tr>
                <th>Product Number</th>
                <td>{{ $case->product_number }}</td>
            </tr>
            <tr>
                <th>Serial Number</th>
                <td>{{ $case->serial_number }}</td>
            </tr>
            <tr>
                <th>Product Type</th>
                <td>{{ $case->nama_type }}</td>
            </tr>
            <tr>
                <th>Accessories</th>
                <td>{{ $case->accessories }}</td>
            </tr>
        </table>
    </div>
</div>
