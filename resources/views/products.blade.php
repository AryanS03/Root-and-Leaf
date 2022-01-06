@extends('./layout/layout')
@section('page_title','Products')
@section('container')
<main>
    <section class="filter-section">
        <div class="row">
            <div class="col-lg-2">
                <div class="accordion sidebar" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                                Brand
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Valmont
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                Price
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <strong>This is the second item's accordion body.</strong>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                Availability
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <a href="#" class="text-dark">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Out of stock
                                        </label>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-between align-items-center">
                        <p>43 products</p>
                        <select>
                            <option value="">Price, high to low</option>
                            <option value="">Price, low to high</option>
                            <option value="">Alphabetically, A to Z</option>
                            <option value="">Alphabetically, Z to A</option>
                        </select>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-2 g-lg-3">
                    @foreach($products as $product)
                    <div class="col">
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
                <div class="row pt-3">
                    <div class="col-lg-12 d-flex justify-content-center">{{ $products->links() }}</div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection