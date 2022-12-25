@extends('dashboard.layouts.main')
@section('container')




<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Laporan Pembelian</h1>
</div>
<div class="table-responsive col-lg-8">
    <table class="table table-striped table-sm">
        <thead>

<th scope="col">#</th>
<th scope="col">Tanggal</th>
<th scope="col">Nama Barang</th>
<th scope="col">Suplier</th>
<th scope="col">Jumlah</th>
<th scope="col">Harga</th>
<th scope="col">Total</th>

</tr>
</thead>
<tbody>
    @foreach ($buys as $buy)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $buy->created_at }}</td>
        <td>{{ $buy->category->name }}</td>
        <td>{{ $buy->supplier->name }}</td>
        <td>{{ $buy->weight}}</td>
        <td>@currency($buy->price)</td>
        <td>@currency($buy->weight * $buy->price)</td>
    </tr>
    @endforeach

        </tbody>
    </table>
</div>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Laporan Penjualan</h1>
</div>
<div class="table-responsive col-lg-8">
    <table class="table table-striped table-sm">
        <thead>

            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Nama</th>
            <th scope="col">Total</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $order->created_at }}</td>
                <td>{{ $order->customer->name }}</td>
                <td>@currency($order->sell->sum('total'))</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
{{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Laporan Piutang</h1>
</div>
<div class="table-responsive col-lg-8">

    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                
                <th scope="col">Nama customer</th>
                <th scope="col">jumlah hutang yang belum dibayar</th>
           
            </tr>
        </thead>
        <tbody>
      
@foreach ($customers as $customer)

            <tr><td>{{ $loop->iteration }}</td>
                <td>{{ $customer->name }}</td>
                <td>@foreach($customer->order as $neworder)
                {{ $neworder->sell->sum('total') }}
                @endforeach</td>
            </tr>
         @endforeach
        </tbody>
    </table>
</div> --}}
@endsection