@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Isi Bahan Baku Baru</h1>
</div>
<div class="col-lg-8">
    <form method="post" action="/dashboard/categories" class="mb-5">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" autofocus>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Input</button>
    </form>
</div>


@endsection