<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/style.css">
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="table-responsive col-lg-8">
            <br>

            <h2 class="text-center">NOTA PENJUALAN BARANG</h2>
            <table>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td> {{ $order->created_at }}</td>
                </tr>
                <tr>
                    <td>Pemesan</td>
                    <td>:</td>
                    <td> {{ $order->customer->name }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $order->customer->address }}</td>
                </tr>
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
                    @foreach ($sells as $sell)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sell->category->name }}</td>
                        <td>{{ $sell->weight }} KG</td>
                        <td>@currency($sell->price)</td>
                        <td>@currency($sell->weight * $sell->price)</td>

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

        <script type="text/javascript">
            window.print();
        </script>
</body>
</div>

</html>