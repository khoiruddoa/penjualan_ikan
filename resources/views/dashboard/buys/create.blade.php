@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Pembelian Ikan</h1>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/dashboard/buys" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="date" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">category</label>
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

                <label for="supplier" class="form-label">Supplier</label>
                <select class="form-select" name="supplier_id">
                    @foreach ($suppliers as $supplier)
                        @if (old('supplier_id') == $supplier->id)
                            <option value="{{ $supplier->id }}" selected>{{ $supplier->name }}</option>
                        @else
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="weight" class="form-label">Jumlah (kg)</label>
                <input type="number" class="form-control" step="0.01" id="weight" name="weight"
                    value="{{ old('weight') }}" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga per kilo</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Keterangan</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                    value="{{ old('description') }}"></textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>




            <button type="submit" class="btn btn-primary">Input</button>
        </form>
    </div>
@endsection
