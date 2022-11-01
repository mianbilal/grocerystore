<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="assets/fonts/sb-bistro/sb-bistro.css" rel="stylesheet" type="text/css">
    <link href="assets/fonts/font-awesome/font-awesome.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" media="all" href="{{asset('assets/packages/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('assets/packages/o2system-ui/o2system-ui.css')}}">
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('assets/packages/owl-carousel/owl-carousel.css')}}">
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('assets/packages/cloudzoom/cloudzoom.css')}}">
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('assets/packages/thumbelina/thumbelina.css')}}">
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('assets/packages/bootstrap-touchspin/bootstrap-touchspin.css')}}">
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('assets/css/theme.css')}}">

</head>
<body>
@include('includes.header')
<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/bg-header.jpg');">
            <div class="container">
                <h1 class="pt-5">
                    {{$settings->name}}
                </h1>
                <p class="lead">
                    {{$settings->message}}
                </p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shop-categories owl-carousel mt-5">
                    @foreach($categories as $category)
                    <div class="item">
                        <a href="#">
                            <div class="media d-flex align-items-center justify-content-center">
                                <span class="d-flex mr-2"><i class="sb-bistro-carrot"></i></span>
                                <div class="media-body">
                                    <h5>{{$category->name}}</h5>
                                    {{-- <p>Freshly Harvested Veggies From Local Growers</p> --}}
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <section id="vegetables" class="gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title">{{$fruits->name}}</h2>
                    <div class="product-carousel owl-carousel">
                        @foreach($fruits->products()->orderBy('created_at','desc')->take(8)->get() as $fruit)
                        <div class="item">
                            <div class="card card-product">
                                <div class="card-ribbon">
                                    <div class="card-ribbon-container right">
                                        {{-- <span class="ribbon ribbon-primary">SPECIAL</span> --}}
                                    </div>
                                </div>
                                <div class="card-badge">
                                    <img src="{{asset($fruit->image)}}" alt="Card image 2" width="60" height="120" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="{{route('single.fruit',['id'=>$fruit->id])}}">{{$fruit->name}}</a>
                                    </h4>
                                    <div class="card-price">
                                        <span class="regular">Price Per Dozen</span>
                                        <span class="reguler">Rp'S. {{$fruit->price}}</span>
                                    </div>
                                    <a href="{{route('cart.add.to',['id'=>$fruit->id])}}" class="btn btn-block btn-primary">
                                        Add to Cart
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="meats">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title">{{$vegitables->name}}</h2>
                    <div class="product-carousel owl-carousel">
                        @foreach($vegitables->products()->orderBy('created_at','desc')->take(4)->get() as $vegitable)
                        <div class="item">
                            <div class="card card-product">
                                <div class="card-ribbon">
                                    <div class="card-ribbon-container right">
                                        {{-- <span class="ribbon ribbon-primary">SPECIAL</span> --}}
                                    </div>
                                </div>
                                <div class="card-badge">
                                    <img src="{{asset($vegitable->image)}}" height="120" width="60"  alt="Card image 2" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="{{route('single.vegitable',['id'=>$vegitable->id])}}">{{$vegitable->name}}</a>
                                    </h4>
                                    <div class="card-price">
                                        <span class="regular">Price Per Kg.</span>
                                        <span class="reguler">Rp'S. {{$vegitable->price}}</span>
                                    </div>
                                    <a href="{{route('cart.add.to',['id'=>$vegitable->id])}}" class="btn btn-block btn-primary">
                                        Add to Cart
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@include('includes.footer')
    <script type="text/javascript" src="{{asset('assets/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery-migrate.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/packages/bootstrap/libraries/popper.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/packages/bootstrap/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/packages/o2system-ui/o2system-ui.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/packages/owl-carousel/owl-carousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/packages/cloudzoom/cloudzoom.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/packages/thumbelina/thumbelina.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/packages/bootstrap-touchspin/bootstrap-touchspin.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/theme.js')}}"></script>
</body>
</html>
