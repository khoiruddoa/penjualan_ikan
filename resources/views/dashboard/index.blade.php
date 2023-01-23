@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Selamat Datang {{ auth()->user()->name }}</h1>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Stok ikan hari ini</h5>
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
                                    <td>{{ $category->weight }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                {{ $categories->links() }}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Piutang yang belum dibayar</h5>
                    <p class="card-text"></p>

                    @currency($bills->sum('debt') - $pays->sum('amount'))
                </div>
            </div>
        </div>
    </div>
@endsection
