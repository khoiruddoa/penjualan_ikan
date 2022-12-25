<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/style.css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="table-responsive col-lg-8">
            <br>

            <h2 class="text-center">NOTA TAGIHAN BARANG</h2>
            <table>
                @foreach ($bills as $bill)
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td>{{ $bill->created_at }}</td>
                </tr>
                <tr>
                    <td>Pemesan</td>
                    <td>:</td>
                    <td>{{ $bill->order->customer->name }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $bill->order->customer->address }}</td>
                </tr>
                @endforeach
            </table>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bills as $bill)
                        @foreach ($bill->order->sell as $selll)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $selll->category->name }}</td>
                                <td>{{ $selll->weight }} KG</td>
                                <td>@currency($selll->price)</td>
                                <td>@currency($selll->weight * $selll->price)</td>

                            </tr>
                        @endforeach
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>

                        <th> Total Tagihan</th>
                        <td>@currency($bill->order->sell->sum('total'))</td>
                    </tr>

                </tbody>
            </table>
        

        <table class="table">
            <thead>
                <tr>
                    
                    <th scope="col">Jumlah Hutang</th>
                    <th scope="col">Jumlah dibayar</th>
                    <th scope="col">Sisa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bills as $bill)
                <tr>
                    <td>@currency($bill->debt)</td>
                    <td>@currency($bill->pay->sum('amount'))</td>
                    <td>@currency($bill->debt - $bill->pay->sum('amount'))</td>
                   
                </tr>
                @endforeach
        
            </tbody>
        </table>
        <table class="table">
            <thead>
                <tr>
        
                    <th scope="col">Tanggal Pembayaran</th>
                    <th scope="col">Rincian Pembayaran</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($bills as $bill)
                @foreach($bill->pay as $pays)
                <tr>
                    <td>{{ $pays->created_at }}</td>
                    <td>@currency($pays->amount)</td>
                </tr>
                @endforeach
                @endforeach
        
            </tbody>
        </table>
        </div>

        print by {{ auth()->user()->name }}

        <script type="text/javascript">
            window.print();
        </script>
</body>
</div>

</html>
