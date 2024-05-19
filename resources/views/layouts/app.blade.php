<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">


    <!--
      - custom css link
    -->
    <link rel="stylesheet" href="{{url('css/hederFooter/hederFooter.css')}}">


    <!--
      - google font link
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">
</head>
<body class="font-sans antialiased">
<header class="header" data-header>

    <div class="top-bar">
        <div class="container">
            <p> develop laravel and livewire </p>
        </div>
    </div>

    <div class="nav-wrapper">
        <div class="container">

            <h1 class="h1">
                <a href="./index.html" class="logo">ali<span class="span">Naseri</span></a>
            </h1>

            <button class="nav-open-btn" aria-label="Open Menu" data-nav-open-btn>
                <ion-icon name="menu-outline"></ion-icon>
            </button>

            <nav class="navbar" data-navbar>

                <button class="nav-close-btn" aria-label="Close Menu" data-nav-close-btn>
                    <ion-icon name="close-outline"></ion-icon>
                </button>

                <ul class="navbar-list">

                    <li>
                        <a href="./index.html" class="navbar-link">Home</a>
                    </li>

                    <li>
                        <a href="./about.html" class="navbar-link">About</a>
                    </li>

                    <li>
                        <a href="./shop.html" class="navbar-link">Shop</a>
                    </li>

                    <li>
                        <a href="./blog.html" class="navbar-link">Blog</a>
                    </li>

                    <li>
                        <a href="./shop.html" class="navbar-link">Products</a>
                    </li>

                    <li>
                        <a href="./contact.html" class="navbar-link">Contact</a>
                    </li>

                </ul>

            </nav>

            <div class="header-action">

                <div class="search-wrapper" data-search-wrapper>

                    <button class="header-action-btn" aria-label="Toggle search" data-search-btn>
                        <ion-icon name="search-outline" class="search-icon"></ion-icon>
                        <ion-icon name="close-outline" class="close-icon"></ion-icon>
                    </button>

                    <div class="input-wrapper">
                        <input type="search" name="search" placeholder="Search here" class="search-input">

                        <button class="search-submit" aria-label="Submit search">
                            <ion-icon name="search-outline"></ion-icon>
                        </button>
                    </div>

                </div>

                <button class="header-action-btn" aria-label="Open whishlist" data-panel-btn="whishlist">
                    <ion-icon name="heart-outline"></ion-icon>

                    <data class="btn-badge" value="3">03</data>
                </button>

                <button class="header-action-btn" aria-label="Open shopping cart" data-panel-btn="cart">
                    <ion-icon name="basket-outline"></ion-icon>

                    <data class="btn-badge" value="2">02</data>
                </button>

            </div>

        </div>
    </div>

</header>


<!--
  - #ASIDE
-->

<aside class="aside">

    <div class="side-panel" data-side-panel="whishlist">

        <button class="panel-close-btn" aria-label="Close whishlist" data-panel-btn="whishlist">
            <ion-icon name="close-outline"></ion-icon>
        </button>

        <ul class="panel-list">

            <li class="panel-item">
                <a href="./product-details.html" class="panel-card">

                    <figure class="item-banner">
                        <img src="./assets/images/product-small-1.jpg" width="46" height="46" loading="lazy"
                             alt="Bright Side Vegetarian">
                    </figure>

                    <div>
                        <p class="item-title">Bright Side Vegetarian</p>

                        <span class="item-value">$20.15x1</span>
                    </div>

                    <button class="item-close-btn" aria-label="Remove item">
                        <ion-icon name="close-outline"></ion-icon>
                    </button>

                </a>
            </li>

            <li class="panel-item">
                <a href="./product-details.html" class="panel-card">

                    <figure class="item-banner">
                        <img src="./assets/images/product-small-2.jpg" width="46" height="46" loading="lazy"
                             alt="Eco Vegetable">
                    </figure>

                    <div>
                        <p class="item-title">Eco Vegetable</p>

                        <span class="item-value">$13.25x2</span>
                    </div>

                    <button class="item-close-btn" aria-label="Remove item">
                        <ion-icon name="close-outline"></ion-icon>
                    </button>

                </a>
            </li>

            <li class="panel-item">
                <a href="./product-details.html" class="panel-card">

                    <figure class="item-banner">
                        <img src="./assets/images/product-small-3.jpg" width="46" height="46" loading="lazy"
                             alt="House of Veggies">
                    </figure>

                    <div>
                        <p class="item-title">House of Veggies</p>

                        <span class="item-value">$20.15x1</span>
                    </div>

                    <button class="item-close-btn" aria-label="Remove item">
                        <ion-icon name="close-outline"></ion-icon>
                    </button>

                </a>
            </li>

        </ul>

        <div class="subtotal">
            <p class="subtotal-text">Subtotal:</p>

            <data class="subtotal-value" value="215.14">$215.14</data>
        </div>

        <a href="./whishlist.html" class="panel-btn">View Whishlist</a>

    </div>

    <div class="side-panel" data-side-panel="cart">

        <button class="panel-close-btn" aria-label="Close cart" data-panel-btn="cart">
            <ion-icon name="close-outline"></ion-icon>
        </button>

        <ul class="panel-list">

            <li class="panel-item">
                <a href="./product-details.html" class="panel-card">

                    <figure class="item-banner">
                        <img src="./assets/images/product-small-1.jpg" width="46" height="46" loading="lazy"
                             alt="Bright Side Vegetarian">
                    </figure>

                    <div>
                        <p class="item-title">Bright Side Vegetarian</p>

                        <span class="item-value">$20.15x1</span>
                    </div>

                    <button class="item-close-btn" aria-label="Remove item">
                        <ion-icon name="close-outline"></ion-icon>
                    </button>

                </a>
            </li>

            <li class="panel-item">
                <a href="./product-details.html" class="panel-card">

                    <figure class="item-banner">
                        <img src="./assets/images/product-small-2.jpg" width="46" height="46" loading="lazy"
                             alt="Eco Vegetable">
                    </figure>

                    <div>
                        <p class="item-title">Eco Vegetable</p>

                        <span class="item-value">$13.25x2</span>
                    </div>

                    <button class="item-close-btn" aria-label="Remove item">
                        <ion-icon name="close-outline"></ion-icon>
                    </button>

                </a>
            </li>

        </ul>

        <div class="subtotal">
            <p class="subtotal-text">Subtotal:</p>

            <data class="subtotal-value" value="215.14">$215.14</data>
        </div>

        <a href="./cart.html" class="panel-btn">View Cart</a>

    </div>

</aside>
<hr>

<main>

    {{ $slot }}
</main>


<footer class="footer">

    <div class="footer-top">
        <div class="container">

            <div class="footer-brand">

                <a href="./index.html" class="logo">Organ<span class="span">ica</span></a>

                <p class="footer-text">
                    It was popularised in the 1960s with the release of Letraset sheets containing Lorem passages and
                    more
                    recently with
                    desktop publishing software like including.
                </p>

                <ul class="social-list">

                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-facebook"></ion-icon>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-twitter"></ion-icon>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-skype"></ion-icon>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-linkedin"></ion-icon>
                        </a>
                    </li>

                </ul>

            </div>

            <ul class="footer-list">

                <li>
                    <p class="footer-list-title">Company</p>
                </li>

                <li>
                    <a href="./about.html" class="footer-link">About Us</a>
                </li>

                <li>
                    <a href="./shop.html" class="footer-link">Shop</a>
                </li>

                <li>
                    <a href="./blog.html" class="footer-link">Blog</a>
                </li>

                <li>
                    <a href="./shop.html" class="footer-link">Product</a>
                </li>

                <li>
                    <a href="./contact.html" class="footer-link">Contact Us</a>
                </li>

            </ul>

            <ul class="footer-list">

                <li>
                    <p class="footer-list-title">Contact</p>
                </li>

                <li class="footer-item">
                    <div class="contact-icon">
                        <ion-icon name="location-outline"></ion-icon>
                    </div>

                    <address class="contact-link">
                        7 Green Lake Street Crawfordsville, IN 47933
                    </address>
                </li>

                <li class="footer-item">
                    <div class="contact-icon">
                        <ion-icon name="call-outline"></ion-icon>
                    </div>

                    <a href="tel:+1800123456789" class="contact-link">+1 800 123 456 789</a>
                </li>

                <li class="footer-item">
                    <div class="contact-icon">
                        <ion-icon name="mail-outline"></ion-icon>
                    </div>

                    <a href="mailto:organica@help.com" class="contact-link">organica@help.com</a>
                </li>

            </ul>

            <div class="footer-list">

                <p class="footer-list-title">Newsletter</p>

                <p class="newsletter-text">
                    You will be notified when somthing new will be appear.
                </p>

                <form action="" class="footer-form">
                    <input type="email" name="email" placeholder="Email Address *" required class="footer-input">

                    <button type="submit" class="footer-form-btn" aria-label="Submit">
                        <ion-icon name="mail-outline"></ion-icon>
                    </button>
                </form>

            </div>

        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">

            <p class="copyright">
                &copy; 2022 <a href="#" class="copyright-link">codewithsadee</a>. All Rights Reserved.
            </p>

            <ul class="footer-bottom-list">

                <li>
                    <a href="#" class="footer-bottom-link">Term and Service</a>
                </li>

                <li>
                    <a href="#" class="footer-bottom-link">Privacy Policy</a>
                </li>

            </ul>

        </div>
    </div>

</footer>


<!--
  - #BACK TO TOP
-->

<a href="#top" class="back-to-top" aria-label="Back to Top" data-back-top-btn>
    <ion-icon name="arrow-up-outline"></ion-icon>
</a>


<!--
  - custom js link
-->
<script src="{{url('js/hederFooter/hederFooter.js')}}"></script>

<!--
  - ionicon link
-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</body>
</html>
