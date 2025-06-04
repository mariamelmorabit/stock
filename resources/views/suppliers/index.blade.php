@extends('layout.app')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-primary fw-bold">📦 List of Suppliers</h3>
        <div class="d-flex gap-2 flex-wrap">
            <a href="{{ route('suppliers.addForm') }}" class="btn btn-success">
                <i class="fa fa-plus-circle"></i> Add Supplier
            </a>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                <i class="fa fa-tachometer-alt"></i> Dashboard
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success text-center shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow rounded-3">
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
                <tbody>
                    @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{ $supplier->first_name }} {{ $supplier->last_name }}</td>
                            <td>{{ $supplier->address }}</td>
                            <td>{{ $supplier->email }}</td>
                            <td>{{ $supplier->phone }}</td>
                            <td class="text-center">
                                <a href="{{ route('suppliers.updateForm', $supplier->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                    <i class="fa fa-edit"></i> Modifier
                                </a><p></p>
                                <a href="{{ route('suppliers.deleteForm', $supplier->id) }}" class="btn btn-sm btn-danger" title="Delete">
                                    <i class="fa fa-trash"></i> Supprimer
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
