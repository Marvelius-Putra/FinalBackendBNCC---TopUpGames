
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>List Barang</title>
  </head>
  <body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    @extends('master')
    @section('title', 'List Items')
    @section('content')
        <div class="row m-2 d-flex justify-content-center">
            {{-- searching start --}}
            <div class="d-flex justify-content-center mt-3" >
                <form class="form-inline" action="/search" method="get">
                    <input name="keyword" class="form-control mr-sm-2" type="search" placeholder="Search..." aria-label="Search" />
                    <button class="btn btn-outline-dark">Search</button>
                </form>
            </div>
            {{-- searching end --}}

            {{-- barang card start --}}
            <div class="row m-2 d-flex justify-content-center">
            @foreach($barang as $b)
                {{ method_field('put') }}
                <div class="col col-sm-3" >
                    <div class="card bg-light mb-3 border border-warning">
                        <div class="card-body">
                            <div>
                                <div class="m-3">
                                    <h4 class="card-title text-center">{{$b->name}}</h4>
                                    <img src="{{ url('public/images/'.$b->image) }}" alt=""style="height: 256px; width: 256px; margin-left:10px">
                                    <p class="card-subtitle text-center" style="margin-top:10px">Rp {{$b->harga}}</p>
                                    <p class="card-subtitle text-center">Available: {{$b->jumlah}}</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                {{-- Security check --}}
                                @auth
                                    @if(Auth::user()->role == 'member')
                                        <a class="btn btn-primary mr-3" href="{{ route('add.to.cart', $b->id) }}">Add to Cart</a>
                                    @endif
                                    @if(Auth::user()->role == 'admin')
                                        <a class="btn btn-primary mr-3" href="#">Details</a>
                                        <a class="btn btn-success mr-3" href="/update/{{$b->id}}">Update</a>
                                        <form action="/delete/{{$b -> id}}" method="POST">{{method_field('delete')}}
                                            @csrf
                                            <button class="btn btn-danger mr-3"type="submit" >Delete</button>
                                        </form>
                                    @endif
                            @endauth
                            {{-- end security --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- barang card end --}}
        </div>
        <div class="m-5 d-flex justify-content-center">
            {{-- {{$barang->links()}} --}}
        </div>
    @endsection
    @extends('barangLayout')
    @section('content cart')
  </body>
</html>
