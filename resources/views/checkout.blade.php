@extends('./layout/layout')
@section('page_title','Checkout')
@section('container')
<main>
    <section class="checkout-section">
        <h2 class="section__heading fw-bold">Canopy</h2>
        <div id="panel" class="panel">
            <p>
                <i class="bi bi-bag fs-3"></i> <span id="span">Show</span> order summary <i class="bi bi-chevron-down"></i>
            </p>
            <p>₹ 40.00</p>
        </div>
        <div class="flex">
            <div class="flex-left">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="text-dark">Information</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shipping</li>
                        <li class="breadcrumb-item active" aria-current="page">Payment</li>
                    </ol>
                </nav>
                <div class="row mt-4 mb-2">
                    <div class="col-lg-12 checkout__contact">
                        <p class="fw-bold">Contact information</p>
                        <p class="text-muted">Already have an account? <a href="#" class="text-dark">Log
                                in</a></p>
                    </div>
                </div>
                <form action="">
                    <input type="text" class="form-control" placeholder="Email or Mobile Phone Number">
                </form>
                <div class="row mt-4 mb-2">
                    <div class="col-lg-12">
                        <p class="fw-bold">Payment Method</p>
                    </div>
                </div>
                <div class="payment-method">
                    <form action="" method="post">
                        <div class="radio__box">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" id="paytm">
                                <label class="form-check-label" for="paytm">
                                    PayTm
                                </label>
                            </div>
                        </div>
                        <div class="radio__box">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" id="gpay">
                                <label class="form-check-label" for="gpay">
                                    GPay
                                </label>
                            </div>
                        </div>
                        <div class="radio__box">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" id="cod">
                                <label class="form-check-label" for="cod">
                                    Cash On Delivery
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row mt-4 mb-2">
                    <div class="col-lg-12">
                        <p class="fw-bold">Shipping address</p>
                    </div>
                </div>
                <form action="" method="post">
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <input type="text" class="form-control" placeholder="First Name">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control mb-3" placeholder="Last Name">
                        </div>
                    </div>
                    <input type="text" class="form-control mb-3" placeholder="Address">
                    <input type="text" class="form-control mb-3" placeholder="Appartment, suite, etc. (Optional)">
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <input type="text" class="form-control" placeholder="City">
                        </div>
                        <div class="col-lg-4">
                            <select name="state" id="state" class="form-control">
                                <option value="state" hidden>State</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" class="form-control mb-3" placeholder="Pincode">
                        </div>
                    </div>
                    <input type="submit" class="btn checkout-btn" value="Continue to shopping">
                </form>
            </div>
            <div class="flex-right" id="flip">
                <div class="order-summary">
                    <div class="product-image">
                        <img src="{{ asset('front-end/assets/images/Pinceaepiler-1_300x@2x.jpg') }}" alt="...">
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">1</span>
                    </div>
                    <div class="product-title">
                        <p class="m-0 ps-2">Coconut Water Tan Mist for the Body</p>
                    </div>
                    <div class="product-price">
                        ₹ 40.00
                    </div>
                </div>
                <div class="order-pricing__outer">
                    <div class="order-pricing">
                        <p class="fw-bold">Subtotal</p>
                        <p>₹ 40.00</p>
                    </div>
                    <div class="order-pricing">
                        <p class="fw-bold">Shipping</p>
                        <p>Calculated at next step</p>
                    </div>
                </div>
                <div class="order-pricing">
                    <p class="fw-bold">Total</p>
                    <h2>₹ 40.00</h2>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection