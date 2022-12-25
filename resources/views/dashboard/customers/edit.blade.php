@extends('dashboard.layouts.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Customer</h1>
</div>
<div class="col-lg-8">
    <form method="post" action="/dashboard/customers/{{ $customer->id }}" class="mb-5">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="number" name="nik" class="form-control  @error('nik') is-invalid @enderror" id="nik" value="{{ old('nik', $customer->nik) }}" autofocus>
            @error('nik')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $customer->name) }}">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $customer->address ) }}">{{ old('address', $customer->address ) }}</textarea>
            @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Nomor Telepon</label>
            <input type="number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number', $customer->phone_number) }}">
            @error('phone_number')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Edit Data</button>
    </form>
</div>



@endsection