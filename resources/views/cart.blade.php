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
        <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/bg-header.jpg');">
            <div class="container">
                <h1 class="pt-5">
                    Your Cart Items: {{Cart::getContent()->count()}}
                </h1>
                <p class="lead">
                    {{$settings->message}}
                </p>
            </div>
        </div>
    </div>

    <section id="cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="10%"></th>
                                    <th>Products</th>
                                    <th>Price</th>
                                    <th width="15%">Quantity</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Cart::getContent() as $pdt)
                                <tr>
                                    <td>
                                        <img src="{{asset($pdt->model->image)}}" width="60">
                                    </td>
                                    <td>
                                        {{$pdt->name}}<br>
                                        <small>Per Dozen</small>
                                    </td>
                                    <td>
                                        Rp'S: {{$pdt->price}}
                                    </td>
                                    <td><a href="{{route('cart.incr',['id'=>$pdt->id])}}" class="btn btn-success">+</a>
                                        <input title="qty" type="text"  value="{{$pdt->quantity}}">
                                        <a href="{{route('cart.decr',['id'=>$pdt->id])}}" class="btn btn-danger">-</a>
                                    </td>
                                    <td>
                                        Rp {{$pdt->getPriceSum()}}
                                    </td>
                                    <td>
                                        <a href="{{route('cart.delete',['id'=>$pdt->id])}}" class="text-danger"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col">
                    <a href="/" class="btn btn-default">Continue Shopping</a>
                </div>
                <div class="col text-right">
                    <div class="clearfix"></div>
                    <h6 class="mt-3">Total: Rp {{Cart::getTotal()}}</h6>
                    <a href="{{route('cart.checkout')}}" class="btn btn-lg btn-primary">Checkout <i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
</div>


@include('includes.footer')
    <script type="text/javascript" src="{{asset('assets/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>
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