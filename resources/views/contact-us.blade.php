@extends('./layout/layout')
@section('page_title','Contact Us')
@section('container')
<main>
    <section class="has-full-width-section contact-section">
        <div class="text-box">
            <h2>Contact Us</h2>
        </div>
    </section>
    <div class="content">
        <div class="maxw600p">
            <h2 class="heading">A Respectful Brand</h2>
            <p>We are a pioneer in natural & non-toxic make-up and care ingredients. We work on innovative formulas,
                textures and pigments to offer the best of natural beauty, with quality and efficacy. Our active
                ingredients increase the vitality and the longevity of epidermal stem cells, slowing down their
                ageing process.</p>
        </div>
    </div>
    <div class="content contact">
        <div class="maxw600p">
            <h2 class="heading">Get in Touch</h2>
            <form action="" method="post">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Name</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email address</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="message" class="fw-bold form-label">Write your message...</label>
                            <textarea class="form-control" name="" id="message"></textarea>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Send" class="btn btn-outline-dark">
            </form>
        </div>
    </div>
    <section class="map-section">
        <div class="map-section__left"><img src="{{ asset('front-end/assets/images/Soinpyjama_720x@2x.jpg') }}" alt="" class="w-100"></div>
        <div class="map-section__right">
            <div class="map-details">
                <h2 class="inner-heading">Visit Our Store</h2>
                <p class="mb-0">123 Fake St.</p>
                <p>Toronto, Canada</p>
                <p>Mon - Fri, 10am - 9pm
                    <br>
                    Saturday, 11am - 9pm
                    <br>
                    Sunday, 11am - 5pm
                </p>
                <a href="#" class="btn theme-btn"><i class="bi bi-geo-alt-fill"></i> Directions</a>
            </div>
        </div>
    </section>
</main>
@endsection