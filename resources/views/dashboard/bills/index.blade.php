@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Tagihan</h1>

    </div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jumlah Hutang</th>
                    <th scope="col">Jumlah dibayar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bills as $bill)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $bill->created_at }}</td>
                  <td>{{ $bill->order->customer->name }}</td>
                  <td>@currency($bill->debt)</td>
                  <td>@currency($bill->pay->sum('amount'))</td>
                  @if ($bill->debt > $bill->pay->sum('amount'))
                      <td><!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $bill->id }}">
                        bayar
                      </button>
                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal-{{ $bill->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form method="post" action="/dashboard/pays" class="mb-5">
                                @csrf
                                <div class="modal-body">
                                  <label for="amount" class="form-label">Jumlah Bayar</label>
                                  <input type="number" name="amount" class="form-control" id="amount" value="{{ $bill->debt - $bill->pay->sum('amount') }}" max="{{ $bill->debt - $bill->pay->sum('amount') }}"autofocus>
                                  <input type="hidden" name="bill_id" value="{{ $bill->id }}">
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Save changes</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      </td>
                  @else
                      <td>lunas</td>
                  @endif
<td><a href="/dashboard/bills/{{ $bill->id }}/edit" target="blank" class="badge bg-info"><span
    data-feather="printer"></span>
</a></td>
              </tr>
                @endforeach

            </tbody>
        </table>
    </div>
   

    
@endsection
