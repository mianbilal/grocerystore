<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h5>About</h5>
                <p>{{$settings->about}}</p>
            </div>
            <div class="col-md-3">
                 <h5>Contact</h5>
                 <ul>
                     <li>
                        <a href="tel:{{$settings->number}}"><i class="fa fa-phone"></i> {{$settings->number}}</a>
                    </li>
                    <li>
                        <a href="{{$settings->email}}"><i class="fa fa-envelope"></i>{{$settings->email}}</a>
                     </li>
                 </ul>
            </div>
        </div>
    </div>
    <p class="copyright">&copy; {{$settings->name}}. All rights reserved.</p>
</footer>