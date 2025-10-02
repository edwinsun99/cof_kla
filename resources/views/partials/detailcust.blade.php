<div class="row">
    {{-- Kolom kiri: info customer --}}
    <div class="col-md-6">
        <h5>Customer</h5>
        <table class="table table-bordered">
            <tr>
                <th>COF-ID</th>
                <td>{{ $case->id }}</td>
            </tr>
              <tr>
                <th>Contact</th>
                <td>{{ $case->contact }}</td>
            </tr>
            <tr>
                <th>Customer Name</th>
                <td>{{ $case->customer_name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $case->email }}</td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td>{{ $case->phone_number }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $case->address }}</td>
            </tr>
        </table>
    </div>

  