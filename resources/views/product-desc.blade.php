@extends('./layout/layout')
@section('page_title','Product Description')
@section('container')
<main>
    <section class="product-description">
        <div class="card-wrapper">
            <div class="card cards">
                <!-- card left -->
                <div class="product-imgs">
                    <div class="img-display">
                        <div class="img-showcase">
                            <img src="{{ asset('/storage/product_images/'.$product[0]->image) }}" alt="">
                            @foreach($productImages as $list)
                            <img src="{{ asset('/storage/product_images/'.$list->image) }}" alt="">
                            @endforeach
                        </div>
                    </div>
                    <div class="img-select">
                        <div class="img-item">
                            <a href="#" data-id="1">
                                <img src="{{ asset('/storage/product_images/'.$product[0]->image) }}" alt="">
                            </a>
                        </div>
                        @foreach($productImages as $list)
                        <div class="img-item">
                            <a href="#" data-id="{{ $loop->iteration + 1 }}">
                                <img src="{{ asset('/storage/product_images/'.$list->image) }}" alt="">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- card right -->
                <div class="product-content">
                    <h2 class="product-title">{{ $product[0]->title }}</h2>
                    <div class="product-price">
                        <p class="last-price">Old Price: <span>$257.00</span></p>
                        <p class="new-price">New Price: <span>₹{{ $product[0]->price }}</span></p>
                    </div>
                    <div class="product-detail">
                        <h2>Description: </h2>
                        {!! $product[0]->description !!}
                    </div>
                    <div class="outer-div">
                        <div class="inner-div">
                            <div class="left-div">
                                <div class="quantity">
                                    <button type="button" class="btn minus-btn disabled">-</button>
                                    <input type="text" id="quantity" value="1">
                                    <button type="button" class="btn plus-btn">+</button>
                                </div>
                            </div>
                            <a href="#" class="btn theme-btn__outline">Add to cart</a>
                        </div>
                        <a href="#" class="btn theme-btn w-100">Buy it now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-section">
        <div class="row product-section__head">
            <div class="col-lg-12 section-heading">
                <a href="#">
                    <h2 class="section__title">You may also like</h2>
                </a>
                <a href="{{ route('products') }}" class="section__link">View All</a>
            </div>
        </div>
        <div class="row">
            @foreach($relatedProducts as $relatedProduct)
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card">
                    <a href="{{ route('product',$relatedProduct->slug) }}">
                        <img src="{{ asset('/storage/product_images/'.$relatedProduct->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $relatedProduct->title }}</h5>
                            <p class="card-text text-center product-price">$19.50 <del>$30.00</del></p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</main>
@endsection