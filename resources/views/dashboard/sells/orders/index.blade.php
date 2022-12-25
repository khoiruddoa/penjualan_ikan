@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Transaksi Penjualan</h1>

    </div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="col-md-6">
        <form action="/dashboard/sells/orders" method="GET">
            <div class="input-group mb-3">
                <input type="date" class="form-control" name="start_date" value="{{ request('start_date') }}">
                <input type="date" class="form-control" name="end_date" value="{{ request('end_date') }}">
                <button class="btn btn-primary" type="submit">GET</button>
            </div>
        </form>
    
    
        {{-- <form action="/dashboard/buys">
            <div class="input-group mb-3">
                <button class="btn btn-outline-primary" type="submit">Search</button>
                <input type="text" class="form-control" placeholder="Search..." name="search"
                    value="{{ request('search') }}">
            </div>
        </form> --}}
    
    </div>
    <div class="table-responsive col-lg-8">
        <a href="/dashboard/sells/orders/create" class="btn btn-primary mb-3">Tambahkan Transaksi Baru</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Detail</th>
                    <th scope="col">Status</th>



                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->customer->name }}</td>
                        <td><a href="/dashboard/sells/orders/{{ $order->id }}" class="badge bg-info">Lihat Detail
                            </a>
                            @if ($order->status == 0)
            
                            <form action="/dashboard/sells/{{ $order->customer->name }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0"
                                    onclick="return confirm('Hapus Transaksi ini?')">Hapus</button>
                            </form>
                            @endif
                            <a href="/dashboard/sells/orders/{{ $order->id }}/edit" target="blank"
                                class="badge bg-info"><span data-feather="printer"></span>
                            </a>
                        </td>
                        <td>
                            @if ($order->status == 0)
                                <a href="#" class="badge bg-danger">Belum ditagih
                                @else
                                    Sudah ditagih
                            @endif
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        {{ $orders->links() }}
    </div>
@endsection
