@extends('./layout/layout')
@section('page_title', 'Home')
@section('container')
<main>
    <section>
        <div class="single m-0">
            <div class="">
                <img src="{{ asset('front-end/assets/images/slider_1.webp') }}" class="w-100" alt="...">
            </div>
        </div>
    </section>
    <section class="our-collection">
        <div class="row product-section__head">
            <div class="col-lg-12 section-heading">
                <a href="{{ route('our-collections') }}">
                    <h2 class="section__title">Our Collections</h2>
                </a>
                <a href="{{ route('our-collections') }}" class="section__link">View All</a>
            </div>
        </div>
        <div class="collection-carousel">
            <div class="collection-block">
                <div>
                    <a href="#" class="text-dark">
                        <div>
                            <img src="{{ asset('front-end/assets/images/240925025_365088401784104_2431794212320380773_n_300x@2x.jpg') }}" alt="...">
                        </div>
                        <p>General Health</p>
                    </a>
                </div>
            </div>
            <div class="collection-block">
                <div>
                    <a href="#" class="text-dark">
                        <div>
                            <img src="{{ asset('front-end/assets/images/240925025_365088401784104_2431794212320380773_n_300x@2x.jpg') }}" alt="...">
                        </div>
                        <p>Diabetes</p>
                    </a>
                </div>
            </div>
            <div class="collection-block">
                <div>
                    <a href="#" class="text-dark">
                        <div>
                            <img src="{{ asset('front-end/assets/images/240925025_365088401784104_2431794212320380773_n_300x@2x.jpg') }}" alt="...">
                        </div>
                        <p>Liver Health</p>
                    </a>
                </div>
            </div>
            <div class="collection-block">
                <div>
                    <a href="#" class="text-dark">
                        <div>
                            <img src="{{ asset('front-end/assets/images/240925025_365088401784104_2431794212320380773_n_300x@2x.jpg') }}" alt="...">
                        </div>
                        <p>Kidney</p>
                    </a>
                </div>
            </div>
            <div class="collection-block">
                <div>
                    <a href="#" class="text-dark">
                        <div>
                            <img src="{{ asset('front-end/assets/images/240925025_365088401784104_2431794212320380773_n_300x@2x.jpg') }}" alt="...">
                        </div>
                        <p>Joint Health</p>
                    </a>
                </div>
            </div>
            <div class="collection-block">
                <div>
                    <a href="#" class="text-dark">
                        <div>
                            <img src="{{ asset('front-end/assets/images/240925025_365088401784104_2431794212320380773_n_300x@2x.jpg') }}" alt="...">
                        </div>
                        <p>Digestion</p>
                    </a>
                </div>
            </div>
            <div class="collection-block">
                <div>
                    <a href="#" class="text-dark">
                        <div>
                            <img src="{{ asset('front-end/assets/images/240925025_365088401784104_2431794212320380773_n_300x@2x.jpg') }}" alt="...">
                        </div>
                        <p>Personal Care</p>
                    </a>
                </div>
            </div>
            <div class="collection-block">
                <div>
                    <a href="#" class="text-dark">
                        <div>
                            <img src="{{ asset('front-end/assets/images/240925025_365088401784104_2431794212320380773_n_300x@2x.jpg') }}" alt="...">
                        </div>
                        <p>Immunity</p>
                    </a>
                </div>
            </div>
            <div class="collection-block">
                <div>
                    <a href="#" class="text-dark">
                        <div>
                            <img src="{{ asset('front-end/assets/images/240925025_365088401784104_2431794212320380773_n_300x@2x.jpg') }}" alt="...">
                        </div>
                        <p>Hair</p>
                    </a>
                </div>
            </div>
            <div class="collection-block">
                <div>
                    <a href="#" class="text-dark">
                        <div>
                            <img src="{{ asset('front-end/assets/images/240925025_365088401784104_2431794212320380773_n_300x@2x.jpg') }}" alt="...">
                        </div>
                        <p>Pain</p>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="single-item m-0">
            <div class="">
                <img src="{{ asset('front-end/assets/images/slider_1.webp') }}" class="img-fluid" alt="...">
            </div>
            <div class="">
                <img src="{{ asset('front-end/assets/images/shutterstock_1589823133v2_1728x@2x.jpg') }}" class="img-fluid" alt="...">
            </div>
            <div class="">
                <img src="{{ asset('front-end/assets/images/shutterstock_1192234630v4_1728x@2x.jpg') }}" class="img-fluid" alt="...">
            </div>
        </div>
    </section>
    <section class="product-section">
        <div class="row product-section__head">
            <div class="col-lg-12 section-heading">
                <a href="{{ route('products') }}">
                    <h2 class="section__title">Our Essentials</h2>
                </a>
                <a href="{{ route('products') }}" class="section__link">View All</a>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card">
                    <a href="{{ route('product',$product->slug) }}">
                        <img src="{{ asset('/storage/product_images/'.$product->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $product->title }}</h5>
                            <p class="card-text text-center product-price">₹{{ $product->price }} <del>$30.00</del></p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <section class="best-seller">
        <div class="row product-section__head">
            <div class="col-lg-12 section-heading">
                <a href="#">
                    <h2 class="section__title">Best Sellers</h2>
                </a>
                <a href="#" class="section__link">View All</a>
            </div>
        </div>
        <div class="seller-carousel">
            <div class="">
                <div class="card">
                    <a href="#">
                        <img src="{{ asset('front-end/assets/images/DUO_ILLUMINATEUR_BLANC_300x@2x.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Crayon Duo Illuminateur/Correcteur</h5>
                            <p class="card-text text-center product-price">$19.50 <del>$30.00</del></p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="card">
                <a href="#">
                    <img src="{{ asset('front-end/assets/images/DUO_ILLUMINATEUR_BLANC_300x@2x.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Crayon Duo Illuminateur/Correcteur</h5>
                        <p class="card-text text-center product-price">$19.50 <del>$30.00</del></p>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="#">
                    <img src="{{ asset('front-end/assets/images/DUO_ILLUMINATEUR_BLANC_300x@2x.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Crayon Duo Illuminateur/Correcteur</h5>
                        <p class="card-text text-center product-price">$19.50 <del>$30.00</del></p>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="#">
                    <img src="{{ asset('front-end/assets/images/DUO_ILLUMINATEUR_BLANC_300x@2x.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Crayon Duo Illuminateur/Correcteur</h5>
                        <p class="card-text text-center product-price">$19.50 <del>$30.00</del></p>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="#">
                    <img src="{{ asset('front-end/assets/images/DUO_ILLUMINATEUR_BLANC_300x@2x.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Crayon Duo Illuminateur/Correcteur</h5>
                        <p class="card-text text-center product-price">$19.50 <del>$30.00</del></p>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="has-full-width-section">
        <div class="image-overlay"></div>
        <div class="text-box">
            <h2>Sublime Your Look</h2>
            <p class="text-white">Lip-smoothing glosses in shimmering shades, from sheer to intense.</p>
            <button class="learn-more">
              <span class="circle" aria-hidden="true">
              <span class="icon arrow"></span>
              </span>
              <span class="button-text">Collections</span>
            </button>
        </div>
    </section>
    <section class="product-section featured-blog">
        <div class="row product-section__head">
            <div class="col-lg-12 section-heading">
                <a href="#">
                    <h2 class="section__title">Press Coverage</h2>
                </a>
                <a href="{{ route('blogs') }}" class="section__link">View All</a>
            </div>
        </div>
        <div class="row">
            @if(count($relatedBlogs) == 0)
            <div class="jumbotron">
                <h4><span class="text-primary">Oops,</span> No Posts Available!</h4>
            </div>
            @else
            @foreach($relatedBlogs as $relatedBlog)
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card">
                    <a href="{{ route('blog',$relatedBlog->slug) }}">
                        <div class="card-image">
                            <img src="{{ asset('/storage/blog_images/'.$relatedBlog->image) }}" class="w-100" alt="...">
                        </div>
                        <div class="card-body p-0">
                            <h5 class="card-title m-0">{{ Str::limit($relatedBlog->title,40) }}</h5>
                            <div class="card-text m-0 post-description">{!! $relatedBlog->description !!}</div>
                        </div>
                    </a>
                    <span><a href="{{ route('blog',$relatedBlog->slug) }}" class="card-link">Read More</a></span>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </section>
</main>
@endsection