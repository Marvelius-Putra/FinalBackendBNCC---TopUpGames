@extends('master')
@section('title', 'Add New Barang')
@section('content')
    <form action="" method="post" class="w-25 m-auto" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            Name
            <input type="text" name="barang_name" placeholder="Input Barang name..." class="form-control">
        </div>
        <div class="form-group">
            Harga
            <input type="text" name="harga" placeholder="Input harga barang..." class="form-control">
        </div>
        <div class="form-group">
            Jumlah
            <input type="text" name="jumlah" placeholder="Input jumlah barang tersedia..." class="form-control">
        </div>
        <div class="form-group">
            kategori
            <input type="text" name="kategori" placeholder="Input kategori barang..." class="form-control">
        </div>
        <div class="form-group">
            <label><h4>Add image</h4></label>
            <input type="file" class="form-control" required name="image">
        </div>

        {{-- display error message --}}
        <div class="d-flex flex-column justify-content-center">
            <button type="submit" class="btn btn-outline-primary">Add Barang</button>
            @if($errors->any())
            @foreach($errors->all() as $error)
            <i class="text-danger text-center mt-3">{{$error}}</i>
            @endforeach
            @endif
        </div>
    </form>
@endsection
