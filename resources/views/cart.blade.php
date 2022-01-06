@extends('./layout/layout')
@section('page_title','Cart')
@section('container')
<section class="product-section">
    <div class="row">
        <div class="row product-section__head">
            <div class="col-lg-12 section-heading">
                <h2 class="section__title">Basket</h2>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Sr.No.</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody class="text-center fw-bold">
                        <tr>
                            <td>1</td>
                            <td><img src="{{ asset('/front-end/assets/images/BAUME_MAGIQUE_BLANC_300x@2x.jpg') }}" class="img-fluid cart-img" alt=""></td>
                            <td>This is title</td>
                            <td>
                                <div class="quantity">
                                    <button type="button" class="btn minus-btn disabled">-</button>
                                    <input type="text" id="quantity" value="1">
                                    <button type="button" class="btn plus-btn">+</button>
                                </div>
                            </td>
                            <td>₹775.00</td>
                            <td><a href="#" class="text-danger"><i class="bi bi-trash"></i></a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><img src="{{ asset('/front-end/assets/images/BAUME_MAGIQUE_BLANC_300x@2x.jpg') }}" class="img-fluid cart-img" alt=""></td>
                            <td>This is title</td>
                            <td>
                                <div class="quantity">
                                    <button type="button" class="btn minus-btn disabled">-</button>
                                    <input type="text" id="quantity" value="1">
                                    <button type="button" class="btn plus-btn">+</button>
                                </div>
                            </td>
                            <td>₹775.00</td>
                            <td><a href="#" class="text-danger"><i class="bi bi-trash"></i></a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><img src="{{ asset('/front-end/assets/images/BAUME_MAGIQUE_BLANC_300x@2x.jpg') }}" class="img-fluid cart-img" alt=""></td>
                            <td>This is title</td>
                            <td>
                                <div class="quantity">
                                    <button type="button" class="btn minus-btn disabled">-</button>
                                    <input type="text" id="quantity" value="1">
                                    <button type="button" class="btn plus-btn">+</button>
                                </div>
                            </td>
                            <td>₹775.00</td>
                            <td><a href="#" class="text-danger"><i class="bi bi-trash"></i></a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><img src="{{ asset('/front-end/assets/images/BAUME_MAGIQUE_BLANC_300x@2x.jpg') }}" class="img-fluid cart-img" alt=""></td>
                            <td>This is title</td>
                            <td>
                                <div class="quantity">
                                    <button type="button" class="btn minus-btn disabled">-</button>
                                    <input type="text" id="quantity" value="1">
                                    <button type="button" class="btn plus-btn">+</button>
                                </div>
                            </td>
                            <td>₹775.00</td>
                            <td><a href="#" class="text-danger"><i class="bi bi-trash"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row product-section__head">
                <div class="col-lg-12 section-heading">
                    <h2 class="section__title">Order Summary</h2>
                </div>
            </div>
            <div class="product-details d-flex justify-content-between pt-0 pb-4">
                <p class="subtotal">6 x Items </p>
                <p class="cart-subtotal fw-bold">₹775.00</p>
            </div>
            <div class="product-details d-flex justify-content-between pt-0 pb-4">
                <p class="subtotal">Delivery</p>
                <p class="cart-subtotal fw-bold">₹0.00</p>
            </div>
            <div class="product-details d-flex justify-content-between pt-0 pb-4">
                <p class="subtotal">Total</p>
                <p class="cart-subtotal fw-bold">₹775.00</p>
            </div>
            <div class="d-grid gap-3">
                <a class="btn cart-btn bg-dark text-white m-0">Proceed to Checkout</a>
            </div>
        </div>
    </div>
</section>
@endsection