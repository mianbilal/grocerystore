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
                    Checkout
                </h1>
                <p class="lead">
                    Save time and leave the groceries to us.
                </p>
            </div>
        </div>
    </div>

    <section id="checkout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-5">
                    <div class="holder">
                        <h5 class="mb-3">YOUR ORDER</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Products</th>
                                        <th class="text-right">Subtotal</th>
                                    </tr>
                                </thead>
                                @foreach(Cart::getContent() as $pdt)
                                <tbody>
                                    <tr>
                                        <td>
                                           <b> {{$pdt->name}} </b> x{{$pdt->quantity}}
                                        </td>
                                        <td class="text-right">
                                            Rp {{$pdt->getPriceSum()}}
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                                <tfooter>
                                    <tr>
                                        <td>
                                            <strong>Cart Subtotal</strong>
                                        </td>
                                        <td class="text-right">
                                            Rp {{Cart::getSubTotal()}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>ORDER TOTAL</strong>
                                        </td>
                                        <td class="text-right">
                                            <strong>Rp {{number_format(Cart::getTotal())}}</strong>
                                        </td>
                                    </tr>
                                </tfooter>
                            </table>
                        </div>

                        <h5 class="mb-3">PAYMENT METHODS</h5>
                        <div class="form-check-inline">
                            <label class="form-check-label">
								<form action="{{route('cart.checkout')}}" method="POST">
                                    {{csrf_field()}}
                                    <script
                                      src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                      data-key="pk_test_v8fXuNocNWbt2nhEvUGZlQUL"
                                      data-amount="{{Cart::getTotal()*100}}"
                                      data-name="{{$settings->name}}"
                                      data-description="{{$settings->message}}"
                                      data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                      data-locale="auto"
                                      data-zip-code="true">
                                    </script>
                              </form>
                            </label>
                        </div>
                    <div class="clearfix">
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