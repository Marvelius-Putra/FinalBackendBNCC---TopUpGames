@extends('master')
@section('title', 'Update Barang')
@section('content')

    <form action="" method="post" class="w-25 m-auto" enctype="multipart/form-data">
        {{ method_field('put') }}
        @csrf
        <div class="form-group">
            Name
            <input value = "{{$barang->name}}"type="text" name="name" placeholder="Input barang name..." class="form-control">
        </div>
        <div class="form-group">
            Harga
            <input value = "{{$barang->harga}}" type="text" name="harga" placeholder="Input harga barang..." class="form-control">
        </div>
        <div class="form-group">
            Jumlah
            <input value = "{{$barang->jumlah}}" type="text" name="jumlah" placeholder="Input jumlah barang tersedia..." class="form-control">
        </div>
        <div class="form-group">
            Kategori
            <input value = "{{$barang->kategori_id}}" type="text" name="kategori" placeholder="Input kategori barang..." class="form-control">
        </div>
        <div class="form-group">
            <label><h4>Add image</h4></label>
            <input type="file" class="form-control" required name="image">
        </div>

        <div class="d-flex flex-column justify-content-center">
            <button type="submit" class="btn btn-outline-primary">Update</button>
            @if($errors->any())
            @foreach($errors->all() as $error)
            <i class="text-danger text-center mt-3">{{$error}}</i>
            @endforeach
            @endif
        </div>
    </form>
@endsection
