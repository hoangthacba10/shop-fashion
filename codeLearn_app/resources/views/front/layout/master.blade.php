<!DOCTYPE html>
<html lang="zxx">

<head>
    <base href="{{ asset('/') }}">
    <meta charset="UTF-8">
    <meta name="description" content="codelean Template">
    <meta name="keywords" content="codelean, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="icon" href="front/img/logo.png">

    <!-- Css Styles -->
    <link rel="stylesheet" href="front/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="front/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/style.css" type="text/css">
</head>

<body>
    <!-- Start coding here -->
    <!-- page Prelolder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- end Prelolder -->
    <!-- Header section begin -->
    <header class="header-section">
        <div class="header-top">
           <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class="fa fa-envelope"></i>
                    hoang@go.com
                </div>

                <div class="phone-service">
                    <i class="fa fa-phone"></i>
                    123456789
                </div>
            </div>

            <div class="ht-right">
                @if (Auth::check())
                    <a href="./account/logout" class="login-panel">
                        <i class="fa fa-user"></i>
                        {{ Auth::user()->name }} - Logout
                    </a>
                @else
                    <a href="./account/login" class="login-panel"><i class="fa fa-user"></i>Login</a>
                @endif
                <div class="lan-selector">
                    <select name="countries" id="countries" class="language_drop" style="width: 300px;">
                        <option value="yt" data-image="front/img/flag-1.jpg" data-imagecss="flag yt" data-title="English">
                            English
                        </option>
                        <option value="yu" data-image="front/img/flag-2.jpg" data-imagecss="flag yu" data-title="Bangladesh">
                            German
                        </option>
                    </select>
                </div>

                <div class="top-social">
                    <a href=""><i class="ti-facebook"></i></a>
                    <a href=""><i class="ti-twitter-alt"></i></a>
                    <a href=""><i class="ti-linkedin"></i></a>
                    <a href=""><i class="ti-pinterest"></i></a>
                </div>
            </div>
           </div>
        </div>

        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="index.html">
                                <img src="front/img/logo.png" height="25px" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <form action="shop">
                            <div class="advanced-search">
                                <button type="button" class="category-btn">All Categories</button>
                                <div class="input-group">
                                    <input name="search" value="{{ request('search') }}" type="text" placeholder="what do you need?">
                                    <button type="submit"><i class="ti-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-3 text-right">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="cart-icon">
                                <a href="./cart">
                                    <i class="icon_bag_alt"></i>
                                    <span class="cart-count">{{ Cart::count() }}</span>
                                </a>

                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                @foreach (Cart::content() as $cart)
                                                    <tr data-rowId="{{ $cart->rowId }}">
                                                        <td class="si-pic"><img style="height: 70px;" src="front/img/products/{{ $cart->options->images[0]->path }}" alt=""></td>
                                                        <td class="si-text">
                                                            <div class="product-selected">
                                                                <p>${{ $cart->price }} x {{ $cart->qty }}</p>
                                                                <h6>{{ $cart->name }}</h6>
                                                            </div>
                                                        </td>
                                                        <td class="si-close">
                                                            <i onclick="removeCart('{{ $cart->rowId }}')" class="ti-close"></i>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>${{ Cart::total() }}</h5>
                                    </div>

                                    <div class="select-button">
                                        <a href="./cart" class="primary-btn view-card">View card</a>
                                        <a href="./checkout" class="primary-btn checkout-btn">Check out</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price">${{ Cart::total() }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All department</span>
                        <ul class="depart-hover">
                            <li class="active"><a href="#">Women's clothing</a></li>
                            <li><a href="#">Men's clothing</a></li>
                            <li><a href="#">Underwear</a></li>
                            <li><a href="#">Kid's clothing</a></li>
                            <li><a href="#">Brand codeLearning</a></li>
                            <li><a href="#">Accessories/Shoes</a></li>
                            <li><a href="#">Luxury Brands</a></li>
                            <li><a href="#">Brand Outdoor Apparel</a></li>
                        </ul>
                    </div>
                </div>

                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="{{ (request()->segment(1) == '') ? 'active' : '' }}"><a href="./">Home</a></li>
                        <li class="{{ (request()->segment(1) == 'shop') ? 'active' : '' }}"><a href="./shop">Shop</a></li>
                        <li><a href="">Collection</a>
                            <ul class="dropdown">
                                <li><a href="">Men's</a></li>
                                <li><a href="">Women's</a></li>
                                <li><a href="">Kid's</a></li>
                            </ul>
                        </li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="">Pages</a>
                            <ul class="dropdown">
                                <li><a href="blog-details.html">Blog details</a></li>
                                <li><a href="./account/my-order">My order</a></li>
                                <li><a href="./cart">Shopping cart</a></li>
                                <li><a href="./checkout">Checkout</a></li>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="register.html">Register</a></li>
                                <li><a href="./account/login">Login</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>

                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header section end -->
{{-- body here --}}
@yield('body')

    <!-- Partner logo section begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>

                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>

                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>

                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>

                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
     </div>
<!-- Partner logo section end -->
<!-- Footer section begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="front/img/_footer-logo.png" alt="" height="25px">
                            </a>
                        </div>

                        <ul>
                            <li>1A Yet Kieu - Ha Noi</li>
                            <li>Phone: +123456789</li>
                            <li>Email: hoang@go.com</li>
                        </ul>

                        <div class="footer-social">
                            <a href="#"><i id="fa fa-facebook"></i></a>
                            <a href="#"><i id="fa fa-instagram"></i></a>
                            <a href="#"><i id="fa fa-twitter"></i></a>
                            <a href="#"><i id="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="">About us</a></li>
                            <li><a href="">Checkout</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="">My account</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">Shopping cart</a></li>
                            <li><a href="">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Join our newsletter now</h5>
                        <p>get email updates about our latest shop and special offers</p>
                        <form action="#" class="subscribe-form">
                        <input type="text" placeholder="enter your email">
                        <button type="button">Subscribe</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            Copyright
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            All rights reserved | this Template is made with
                            <i class="fa fa-heart-o" aria-hidden="true"></i> by
                            <a href="https://CodeLearn.vn" target="_blank">CodeLearn</a>
                        </div>

                        <div class="payment-pic">
                            <a href="front/img/payment-method.png"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<!-- Footer section end -->
<!-- Js Plugins -->
<script src="front/js/jquery-3.3.1.min.js"></script>
<script src="front/js/bootstrap.min.js"></script>
<script src="front/js/jquery-ui.min.js"></script>
<script src="front/js/jquery.countdown.min.js"></script>
<script src="front/js/jquery.nice-select.min.js"></script>
<script src="front/js/jquery.zoom.min.js"></script>
<script src="front/js/jquery.dd.min.js"></script>
<script src="front/js/jquery.slicknav.js"></script>
<script src="front/js/owl.carousel.min.js"></script>
<script src="front/js/owlcarousel2-filter.min.js"></script>
<script src="front/js/main.js"></script>
</body>

</html>
