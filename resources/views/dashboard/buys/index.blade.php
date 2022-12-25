@extends('dashboard.layouts.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Pembelian</h1>

</div>
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
    {{ session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="col-md-6">
    <form action="/dashboard/buys" method="GET">
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
    <a href="/dashboard/buys/create" class="btn btn-primary mb-3">Tambahkan Pembelian Baru</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Suplier</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Harga</th>
                <th scope="col">Total</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buys as $buy)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $buy->category->name }}</td>
                <td>{{ $buy->supplier->name }}</td>
                <td>{{ $buy->created_at }}</td>
                <td>{{ $buy->weight}}</td>
                <td>@currency($buy->price)</td>
                <td>@currency($buy->weight * $buy->price)
                <td>{{ $buy->description}}</td>
                <td>
                    <form action="/dashboard/buys/{{ $buy->id }}" method="buy" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Menghapus Data Pembelian akan menyebabkan perubahan stok?')"><span data-feather="x-circle"></span></button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
<div class="d-flex justify-content-center">
    {{ $buys->links() }}
</div>
@endsection