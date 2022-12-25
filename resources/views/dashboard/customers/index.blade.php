@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Customer</h1>

    </div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('failed'))
        <div class="alert alert-danger alert-dismissible fade show col-lg-8" role="alert">
            {{ session('failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- <div class="col-md-6">
        <form action="/dashboard/customers" method="GET">
            <div class="input-group mb-3">
                <input type="date" class="form-control" name="start_date" value="{{ request('start_date') }}">
                <input type="date" class="form-control" name="end_date" value="{{ request('end_date') }}">
                <button class="btn btn-primary" type="submit">GET</button>
            </div>
        </form>
    </div> --}}
    <div class="col-md-6">

        <form action="/dashboard/customers">
            <div class="input-group mb-3">
                <button class="btn btn-outline-primary" type="submit">Search</button>
                <input type="text" class="form-control" placeholder="Search..." name="search"
                    value="{{ request('search') }}">
            </div>
        </form>

    </div>

    <div class="table-responsive col-lg-8">
        <a href="/dashboard/customers/create" class="btn btn-primary mb-3">Tambah Customer Baru</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No. HP</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $customer->nik }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->phone_number }}</td>
                        <td><a href="/dashboard/customers/{{ $customer->id }}/edit" class="badge bg-info"> Edit

                            </a>
                            <form action="/dashboard/customers/{{ $customer->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0"
                                    onclick="return confirm('Yakin ingin menghapus Pelanggan ini? Semua transaksinya akan otomatis terhapus')">Hapus
                                </button>
                            </form>

                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        {{ $customers->links() }}
    </div>
@endsection
