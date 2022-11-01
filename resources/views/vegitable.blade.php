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
    <script>
        @if(Session::has('success'))
            toastr.success("{{Session::get('success')}}")
        @elseif(Session::has('info'))
            toastr.info("{{Session::get('info')}}")
        @endif
    </script>
</head>
<body>
@include('includes.header')
<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url({{asset('/uploads/products/23.jpg')}});">
            <div class="container">
                <h1 class="pt-5">
                    {{$vegitable->name}}
                </h1>
                <p class="lead">
                    {{$settings->message}}
                </p>
            </div>
        </div>
    </div>
    <div class="product-detail">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="slider-zoom">
                        <a href="{{asset($vegitable->image)}}" class="cloud-zoom" rel="transparentImage: 'data:image/gif;base64,R0lGODlhAQABAID/AMDAwAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==', useWrapper: false, showTitle: false, zoomWidth:'500', zoomHeight:'500', adjustY:0, adjustX:10" id="cloudZoom">
                            <img alt="Detail Zoom thumbs image" src="{{asset($vegitable->image)}}" style="width: 100%;">
                        </a>
                    </div>

                </div>
                <div class="col-sm-6">
                    <p>
                        <strong>Overview</strong><br>
                        {{$vegitable->description}}
                    </p>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>
                                <strong>Price</strong> (/Dozen)<br>
                                <span class="price">Rp'S. {{$vegitable->price}}</span>
                                {{-- <span class="old-price">Rp 150.000</span> --}}
                            </p>
                        </div>
                        <div class="col-sm-6 text-right">
                            <p>
                                <span class="stock available">In Stock: {{$vegitable->quantity}}</span>
                            </p>
                        </div>
                    </div>
                    <form action="{{route('cart.add')}}" method="post">
                        {{csrf_field()}}
                        <p class="mb-1">
                            <strong>Quantity</strong>
                        </p>
                        <div class="row">
                            <div class="col-sm-5">
                                <input class="vertical-spin" type="text" data-bts-button-down-class="btn btn-success" data-bts-button-up-class="btn btn-primary" value="1" name="qty">
                            </div>
                            {{-- <div class="col-sm-6"><span class="pt-1 d-inline-block">Pack (250 gram)</span></div> --}}
                        </div>
                        <input type="hidden" name="f_id" value="{{$vegitable->id}}">
                        <button class="mt-3 btn btn-primary btn-lg">
                            <i class="fa fa-shopping-basket"></i> Add to Cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <section id="related-product">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title">Related Products</h2>
                    <div class="product-carousel owl-carousel">
                        @foreach($vegitables->products()->orderBy('created_at','desc')->take(4)->get() as $vegitable)
                        <div class="item">
                            <div class="card card-product">
                                <div class="card-ribbon">
                                    {{-- <div class="card-ribbon-container right">
                                        <span class="ribbon ribbon-primary">SPECIAL</span>
                                    </div> --}}
                                </div>
                                <div class="card-badge">
                                    {{-- <div class="card-badge-container left">
                                        <span class="badge badge-default">
                                            Until 2018
                                        </span>
                                        <span class="badge badge-primary">
                                            20% OFF
                                        </span>
                                    </div> --}}
                                    <img src="{{asset($vegitable->image)}}" width="60" height="120" alt="Card image 2" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="{{route('single.vegitable',['id'=>$vegitable->id])}}">{{$vegitable->name}}</a>
                                    </h4>
                                    <div class="card-price">
                                        <span class="regulat">Stock. {{$vegitable->quantity}}</span>
                                        <span class="reguler">Rp. {{$vegitable->price}}</span>
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