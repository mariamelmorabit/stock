@extends('layout.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">📋 List of Customers</h2>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('customers.addForm') }}" class="btn btn-success">
                <i class="fa fa-plus-circle"></i> Add Customer
            </a>
            <a href="/dashboard" class="btn btn-secondary">
                <i class="fa fa-home"></i> Dashboard
            </a>
            <form action="{{ route('customers.export') }}" method="GET" class="d-inline">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-file-excel"></i> Export
                </button>
            </form>
            <form action="{{ route('customers.import') }}" method="POST" enctype="multipart/form-data" class="d-inline">
                @csrf
                <input type="file" name="file" class="form-control d-inline-block w-auto" required>
                <button type="submit" class="btn btn-warning">
                    <i class="fa fa-upload"></i> Import
                </button>
            </form>
            <a href="{{ route('customers.print') }}" target="_blank" class="btn btn-info">
                <i class="fa fa-print"></i> Print
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <input type="text" id="search" class="form-control shadow-sm" placeholder="🔍 Search by name or email">
    </div>

    <div class="card shadow rounded-4">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td class="text-center">
                                <a href="{{ route('customers.updateForm', $customer->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i> Modifier
                                </a>
                                <p></p>
                                <a href="{{ route('customers.deleteForm', $customer->id) }}" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>supprimer
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $(document).ready(function () {
        const updateBaseUrl = "{{ url('customer/updateForm') }}/";
        const deleteBaseUrl = "{{ url('customer/deleteForm') }}/";
        const originalTableBody = $('#tbody').html();

        $('#search').on('keyup', function () {
            var val = $(this).val().trim();
            if (val.length > 0) {
                $.ajax({
                    url: "/customer/search/" + encodeURIComponent(val),
                    type: "GET",
                    success: function (data) {
                        $('#tbody').empty();
                        if (data.length === 0) {
                            $('#tbody').append('<tr><td colspan="5" class="text-center">No customers found</td></tr>');
                        } else {
                            $.each(data, function (index, customer) {
                                $('#tbody').append('<tr>' +
                                    '<td>' + customer.first_name + ' ' + customer.last_name + '</td>' +
                                    '<td>' + customer.address + '</td>' +
                                    '<td>' + customer.email + '</td>' +
                                    '<td>' + customer.phone + '</td>' +
                                    '<td class="text-center">' +
                                        '<a href="' + updateBaseUrl + customer.id + '" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a> ' +
                                        '<a href="' + deleteBaseUrl + customer.id + '" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>' +
                                    '</td>' +
                                    '</tr>');
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            } else {
                $('#tbody').html(originalTableBody);
            }
        });
    });
</script>
@endpush
