<div class="page-header">
    <!--=============== Navbar ===============-->
    <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-transparent" id="page-navigation">
        <div class="container">
            <!-- Navbar Brand -->
            <a href="/" class="navbar-brand">
                {{ $settings->name }}
            </a>

            <!-- Toggle Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarcollapse">
                <!-- Navbar Menu -->
                <ul class="navbar-nav ml-auto">
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    </li>
                    @endif

                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-shopping-basket"></i> <span class="badge badge-primary">{{Cart::getContent()->count()}}</span>
                        </a>
                        <div class="dropdown-menu shopping-cart">
                            <ul>
                                <li>
                                    <div class="drop-title">Your Cart</div>
                                </li>
                                <li>
                                    <div class="shopping-cart-list">
                                        @foreach(Cart::getContent() as $pdt)
                                        <div class="media">
                                            <img class="d-flex mr-3" src="{{asset($pdt->model->image)}}" width="60">
                                            <div class="media-body">
                                                <h5>{{$pdt->name}}</h5>
                                                <p class="price">
                                                    <span>Rp. {{$pdt->price}}</span>
                                                </p>
                                                <p class="text-muted">Qty: {{$pdt->quantity}}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </li>
                                <li>
                                    <div class="drop-title d-flex justify-content-between">
                                        <span>Total:</span>
                                        <span class="text-primary"><strong>Rp. {{Cart::getTotal()}}</strong></span>
                                    </div>
                                </li>
                                <li class="d-flex justify-content-between pl-3 pr-3 pt-3">
                                    <a href="/cart" class="btn btn-secondary">View Cart</a>
                                    <a href="{{route('cart.clear')}}" class="btn btn-danger">Clear Cart</a>
                                    <a href="{{route('cart.checkout')}}" class="btn btn-primary">Checkout</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</div>