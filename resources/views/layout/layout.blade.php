<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Bootstrap icons -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <!-- slick CSS Link -->
      <link rel="stylesheet" href="{{ asset('/front-end/assets/slick/slick.css') }}">
      <link rel="stylesheet" href="{{ asset('/front-end/assets/slick/slick-theme.css') }}">
      <!-- Font awesome Icons -->
      <script src="https://kit.fontawesome.com/ba3f5a689c.js" crossorigin="anonymous"></script>
      <link rel="icon" href="{{ asset('/front-end/assets/images/rootandleaf.png') }}">
      <link rel="stylesheet" href="{{ asset('/front-end/assets/css/navbar.css') }}">
      <link rel="stylesheet" href="{{ asset('/front-end/assets/css/main.css') }}">
      <title>@yield('page_title') | Root & Leaf</title>
   </head>
   <body>
      <!-- Header start -->
      <header class="header">
         <div class="navigation-section v-center">
            <div class="upper--left">
               <form action="" method="post">
                  <div id="search-block">
                     <input id="search-input" type="text" placeholder="SEARCH THE STORE..." />
                     <input id="submit-btn" type="submit" value="Search" />
                  </div>
               </form>
               <div class="logo">
                  <a href="{{ route('/') }}"><img src="{{ asset('/front-end/assets/images/logo_1.png') }}" class="logo_1" alt=""></a>
               </div>
            </div>
            <div class="upper--center">
               <div class="logo">
                  <a href="{{ route('/') }}"><img src="{{ asset('/front-end/assets/images/rootandleaf.png') }}" class="logo-image" alt=""></a>
               </div>
            </div>
            <div class="upper--right">
               <div class="overlay"></div>
               <a href="#" class="text-dark fw-bold">Account</a>
               <i class="bi bi-bag" id="slide">
               <span class="badge rounded-pill bg-dark">1</span>
               </i>
               <div class="outer-box">
                  <div class="sidenav">
                     <div class="sidenav-head">
                        <div class="head-title">Your Cart</div>
                        <div class="close">&times;</div>
                     </div>
                     <div class="sidenav-body">
                        <p class="sidenav-title">Recently Added Item(s)</p>
                        <div class="product-details">
                           <div class="cart-image"><img src="{{ asset('/front-end/assets/images/Pinceaepiler-1_300x@2x.jpg') }}" class="img-fluid" alt=""></div>
                           <div class="details">
                              <p class="cart-product__title fw-bold">CHARCOAL BLACK GULAAB KHAAS KAJAL</p>
                              <div class="cart-details d-flex justify-content-between align-items-center pt-3">
                                 <span class="p-quantity">Qty: <span class="qty">1</span></span>
                                 <span class="p-price">₹775.00</span>
                              </div>
                           </div>
                           <a href="#" class="ms-0"><i title="Remove Item" class="bi bi-trash"></i></a>
                        </div>
                        <div class="product-details justify-content-between pt-0 pb-4">
                           <p class="subtotal">Cart Subtotal : </p>
                           <p class="cart-subtotal fw-bold">₹775.00</p>
                        </div>
                        <div class="d-grid gap-3">
                           <a href="{{ route('cart') }}" class="btn cart-btn m-0" type="button">Go to Bag</a>
                           <button class="btn cart-btn bg-dark text-white" type="button">Procced to Checkout</button>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- mobile menu trigger -->
               <div class="mobile-menu-trigger">
                  <span></span>
               </div>
            </div>
         </div>
         <div class="container-fluid p-0">
            <div class="navigation v-center">
               <!-- menu start here -->
               <div class="header-item item-center">
                  <div class="menu-overlay"></div>
                  <nav class="menu">
                     <div class="mobile-menu-head">
                        <div class="go-back"><i class="fa fa-angle-left"></i></div>
                        <div class="current-menu-title"></div>
                        <div class="mobile-menu-close">&times;</div>
                     </div>
                     <ul class="menu-main">
                        <li class="menu-item-has-children">
                           <a href="#" class="input-search"><input type="text" name="" placeholder="Search here..." class="form-control" id="" />
                           <i class="fas fa-search" id="search-icon"></i></a>
                        </li>
                        <li><a href="{{ url('/about-us') }}">Root & Leaf</a></li>
                        <li class="menu-item-has-children">
                           <a href="javascript:void(0)">Shop <i class="fas fa-angle-down"></i></a>
                           <div class="sub-menu container-fluid p-0">
                              <div class="container">
                                 <div class="row">
                                    <div class="col-lg-6">
                                       <div class="row">
                                          <div class="menu-title fw-bold margin">Shop by Concern</div>
                                          <div class="col-lg-4 col-6">
                                             <div class="list-item">
                                                <ul class="list-unstyled">
                                                   <li><a href="#">Cough</a></li>
                                                   <li><a href="#">Diabetes</a></li>
                                                   <li><a href="#">Digestion</a></li>
                                                   <li><a href="#">Fat Loss</a></li>
                                                   <li><a href="#">Fever</a></li>
                                                   <li><a href="#">General Health</a></li>
                                                </ul>
                                             </div>
                                          </div>
                                          <div class="col-lg-4 col-6">
                                             <div class="list-item">
                                                <ul class="list-unstyled">
                                                   <li><a href="#">Hair</a></li>
                                                   <li><a href="#">Immunity</a></li>
                                                   <li><a href="#">Joint Health</a></li>
                                                   <li><a href="#">Kidney</a></li>
                                                   <li><a href="#">Liver Health</a></li>
                                                   <li><a href="#">Pain</a></li>
                                                </ul>
                                             </div>
                                          </div>
                                          <div class="col-lg-4 col-6">
                                             <div class="list-item">
                                                <ul class="list-unstyled">
                                                   <li><a href="#">Personal Care</a></li>
                                                   <li><a href="#">Skin</a></li>
                                                   <li><a href="#">Sleep</a></li>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="row">
                                          <div class="col-lg-4 col-6">
                                             <div class="menu-title fw-bold">Kids</div>
                                             <div class="list-item">
                                                <ul class="list-unstyled">
                                                   <li><a href="#">Vitagulp</a></li>
                                                </ul>
                                             </div>
                                          </div>
                                          <div class="col-lg-4 col-6">
                                             <div class="menu-title fw-bold">Men</div>
                                             <div class="list-item">
                                                <ul class="list-unstyled">
                                                   <li><a href="#">Confiwin</a></li>
                                                </ul>
                                             </div>
                                          </div>
                                          <div class="col-lg-4 col-6">
                                             <div class="menu-title fw-bold">Women</div>
                                             <div class="list-item">
                                                <ul class="list-unstyled">
                                                   <li><a href="#">Nari Kwath</a></li>
                                                   <li><a href="#">Nirogam</a></li>
                                                   <li><a href="#">PCOS Balance</a></li>
                                                   <li><a href="#">Uterotone</a></li>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </li>
                        <li><a href="{{ route('blogs') }}">Blogs</a></li>
                        <li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
                        <li><a href="{{ url('/delivery-and-returns') }}">Delivery & Returns</a></li>
                     </ul>
                  </nav>
               </div>
               <!-- menu end here-->
            </div>
         </div>
      </header>
      <!-- header end -->
      @section('container')
      @show
      <!-- footer starts from here -->
      <footer class="footer">
         <div class="container-fluid p-0">
            <ul class="footer--list text-center">
               <li><a href="#">Back to the top <i class="fas fa-angle-up"></i></a></li>
            </ul>
            <div class="row mb-4">
               <div class="col-lg-4 col-md-8">
                  <form action="" method="post">
                     <div id="search-row">
                        <input id="search" type="email" placeholder="Email Address">
                        <input id="submit" type="submit" value="Subscribe">
                     </div>
                  </form>
               </div>
               <div class="col-lg-8 col-md-4">
                  <div class="social-icons">
                     <a href="#"><i class="bi bi-twitter"></i></a>
                     <a href="#"><i class="bi bi-facebook"></i></a>
                     <a href="#"><i class="bi bi-youtube"></i></a>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-2">
                  <div class="logo">
                     <a href="{{ url('/') }}"><img src="{{ asset('/front-end/assets/images/rootandleaf.png') }}" class="img-fluid" alt=""></a>
                  </div>
               </div>
               <div class="col-lg-4">
                  <p class="footer--text">CHADO works on enhancing and protecting your elegant and natural beauty.
                     Never artificial or too
                     flashy, our range of make-up and care products is all made in Europe, from natural active
                     ingredients, cruelty-free, environmental-friendly and vegan-friendly.
                  </p>
               </div>
               <div class="col-lg-2 col-6">
                  <ul class="footer--list">
                     <li><a href="{{ url('/about-us') }}">Who we are</a></li>
                     <li><a href="#">Press</a></li>
                     <li><a href="#">SPA Services</a></li>
                  </ul>
               </div>
               <div class="col-lg-2 col-6">
                  <ul class="footer--list">
                     <li><a href="#">Our Locations</a></li>
                     <li><a href="{{ url('/delivery-and-returns') }}">Delivery & Returns</a></li>
                     <li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
                  </ul>
               </div>
            </div>
         </div>
      </footer>
      <!-- footer ends here -->
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
      <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
      <script src="{{ asset('/front-end/assets/slick/slick.js') }}"></script>
      <script src="{{ asset('/front-end/assets/slick/slick.min.js') }}"></script>
      <script src="{{ asset('/front-end/assets/js/main.js') }}"></script>
      <script src="{{ asset('/front-end/assets/js/script.js') }}"></script>
      <script src="{{ asset('/front-end/assets/js/menu.js') }}"></script>
   </body>
</html>