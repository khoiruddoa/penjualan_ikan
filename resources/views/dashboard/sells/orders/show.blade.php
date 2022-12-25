@extends('dashboard.layouts.main')
@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <!-- <h1 class="h2">daftar pesanan {{ $order->customer->name }}</h1> -->
    </div>
    <div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sells as $sell)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sell->category->name }}</td>
                        <td>{{ $sell->weight }}</td>
                        <td>@currency($sell->price)</td>
                        <td>@currency($sell->total)</td>


                    </tr>
                @endforeach

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>

                    <th> Total Tagihan</th>
                    <td>@currency($sells->sum('total'))</td>
                </tr>

            </tbody>
        </table>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <a href="/dashboard/sells/orders/{{ $order->id }}/edit" target="blank" class="badge bg-info"><span
            data-feather="printer"></span>
    </a>
    <br>
    @if ($order->status < 1)
        <form action="/dashboard/bills" method="post" class="d-inline">
            @csrf
            <input type="hidden" name="order_id" value="{{ $order->id }}">
            <input type="hidden" name="id" value="{{ $order->id }}">

            <input type="hidden" name="debt" value="{{ $sells->sum('total') }}">
            <button class="badge bg-primary" onclick="return confirm('Anda Yakin Ingin membuat tagihan?')">Buat
                Tagihan</button>
        </form>

        <div class="col-lg-4 mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Stok ikan</h5>
                    <p class="card-text"></p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Nama barang</th>
                                <th scope="col">jumlah</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->buy->sum('weight') - $category->sell->sum('weight') }}</td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <h2>Tambah barang </h2>
        <div class="col-lg-8">
            <form method="post" action="/dashboard/sells" class="mb-5">
                @csrf
                <input type="hidden" name="order_id" value="{{ $order->id }}">
                <div class="mb-3">
                    <label for="category" class="form-label">Nama Barang :</label>
                    <select class="form-select" name="category_id">
                        @foreach ($categories as $category)
                            @if (old('category_id') == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="weight" class="form-label">Jumlah (kg)</label>
                    <input type="number" class="form-control" id="weight" name="weight" step="0.01"
                        value="{{ old('weight') }}" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Harga per kilo</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}"
                        required>
                </div>
                <button type="submit" class="btn btn-primary">Input</button>
            </form>
        </div>
    @endif
@endsection
