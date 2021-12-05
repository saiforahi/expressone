<footer>
    <div class="footer-main">
        <div class="theme-container container">
            <div class="row pad-120" >
                <div class="col-md-3 col-sm-6 footer-widget">
                    <h2 class="title-1 fw-900" >Office Address:</h2>
                   <p>
                    Located in Dhaka, Bangladesh
                   </p>
                   <p>Email: <a href="mail-to:support@express-onebd.com" style="color: #b2b2b2;font-weight:bold;">support@express-onebd.com</a></p>
                   <p>Telephone: <br/>
                    01923456789<br/>
01575633808
                </p>
                </div>
                <div class="col-md-3 col-sm-6 footer-widget">
                    <h2 class="title-1 fw-900">About us</h2>
                    <ul>
                        <li><a href="{{route('about')}}">About Company</a></li>
                        <li><a href="{{route('mission')}}">Mission</a></li>
                        <li><a href="{{route('vision')}}">Vision</a></li>
                        <li><a href="{{route('promise')}}">Our Promise</a></li>
                        <li><a href="{{route('history')}}">Company history</a></li>
                        <li><a href="{{route('team')}}">Our Management Team</a></li>

                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 footer-widget">
                    <h2 class="title-1 fw-900">Products & Services</h2>
                    <ul>
                        <li><a href="#">E-Commerce Delivery & Logistics</a></li>
                        <li><a href="#">Corporate Service</a></li>
                        <li><a href="#">Parcel Service</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 footer-widget">
                    <h2 class="title-1 fw-900">App Download</h2>
                    <ul class="payment-icons">
                        <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".20s">
                            <a href="{{route('login')}}" style="background-color: magenta; width: 160px; padding: 13px;border-radius: 15px;text-align: center;
color: white" class="fa fa-play">  Google Play </a>
                        </li>
                        <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".25s">
                            <a href="{{route('login')}}" style="background-color: magenta; width: 160px; padding: 13px;border-radius: 15px;text-align: center;
color: white" class="fa fa-apple">  Apple Store (soon) </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="theme-container container">
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <p style="color: #656565"> {{basic_information()->footer_text}} <a style="color: #656565"
                                                                                       href="{{basic_information()->website_link}}">{{basic_information()->company_name}}</a>
                    </p>
                </div>
                <div class="col-md-4 col-sm-4 text-right">
                    <ul class="social-icons list-inline">
                        <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".20s"><a
                                href="{{basic_information()->facebook_link}}" class="fa fa-facebook"></a>
                        </li>
                        <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".25s"><a
                                href="{{basic_information()->twiter_link}}" class="fa fa-twitter"></a>
                        </li>
                        <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".30s"><a
                                href="{{basic_information()->google_plus_link}}" class="fa fa-google-plus"></a>
                        </li>
                        <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".35s"><a
                                href="{{basic_information()->linkedin_link}}" class="fa fa-linkedin"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
