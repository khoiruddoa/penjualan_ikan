@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Masukkan data transaksi baru</h1>
</div>
<div class="col-lg-8">
    <form method="post" action="/dashboard/sells/orders" class="mb-5">
        @csrf

        <div class="mb-3">
            <label for="order" class="form-label">Nama customer</label>
            <select class="form-select" name="customer_id">
                @foreach ($customers as $customer)
                @if(old('customer_id')== $customer->id)
                <option value="{{ $customer->id }}" selected>{{ $customer->name }}</option>
                @else
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endif
                @endforeach
            </select>

        </div>
        <input type="hidden" value="0" name="status">

        <button type="submit" class="btn btn-primary">input</button>
    </form>
</div>



@endsection