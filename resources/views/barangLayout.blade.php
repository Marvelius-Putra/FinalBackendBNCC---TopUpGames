<!DOCTYPE html>
<html>
<head>
    <title>cart layout</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

{{-- start Navbar --}}
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12 main-section">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">

                <div class="container">
                    <a class="navbar-brand" href="#">Navbar</a>
                    {{-- cart button --}}
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/kategori">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/about">About</a>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- cart dropdown --}}
                <div class="dropdown">
                    <button type="button" class="btn btn-info" data-toggle="dropdown">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                    </button>
                    {{-- dropdown method --}}
                    <div class="dropdown-menu">
                        <div class="row total-header-section">
                            <div class="col-lg-6 col-sm-6 col-6">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                            </div>

                            {{-- calculate total price --}}
                            @php $total = 0 @endphp
                            @foreach((array) session('cart') as $id => $details)
                                @php $total += $details['harga'] * $details['jumlah'] @endphp
                            @endforeach

                            <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                <p>Total: <span class="text-info">Rp {{ $total }}</span></p>
                            </div>
                        </div>

                        {{-- add cart session --}}
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                <div class="row cart-detail">
                                    <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                        <p>{{ $details['name'] }}</p>
                                        <span class="price text-info"> Rp{{ $details['harga'] }}</span> <span class="count"> jumlah:{{ $details['jumlah'] }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        {{-- view all button --}}
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                            </div>
                        </div>
                    </div>
                    {{-- end of dropdown --}}
                </div>
            </nav>
            {{-- end Navbar --}}
        </div>
    </div>
</div>

<br/>
{{-- alert success  --}}
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
    @endif
    @yield('content cart')
</div>
@yield('scripts')

</body>
</html>
