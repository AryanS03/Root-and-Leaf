@extends('./layout/layout')
@section('page_title','About Us')
@section('container')
<main>
    <section class="has-full-width-section contact-section about">
        <div class="text-box">
            <h2>About Us</h2>
        </div>
    </section>
    <div class="content">
        <div class="maxw600p">
            <h2 class="heading">A Respectful Brand</h2>
            <p>CHADO is a pioneer in natural & non-toxic make-up and care ingredients. We work on innovative
                formulas, textures and pigments to offer the best of natural beauty, with quality and efficacy. Our
                main ingredient is the PhytoCellTec Malus Domestica, a swiss bio-technological process made from the
                Uttwiler Spätlauber, an ancient Swiss apple. This active ingredient increases the vitality and the
                longevity of epidermal stem cells, slowing down their ageing process.</p>
        </div>
    </div>
    <section class="about-section">
        <div class="about-section__left">
            <img src="{{ asset('front-end/assets/images/Photo-Sylvia-Site-Shopify_720x@2x.jpg') }}" class="w-100" alt="">
        </div>
        <div class="about-section__right">
            <div class="content">
                <h2 class="heading">A FEW WORDS FROM THE CREATOR</h2>
                <p><b>“My first years in Geneva were impregnated and inspired by those I love, emotions, and smells.
                        My
                        father, a chef, made me travel in his pots. He was authentic and true. He taught me
                        important
                        lessons, always be curious, love life, your work, and take care of your family. I’ve always
                        enjoyed creating, drawing, being in nature and inventing new recipes with local products and
                        authentic ingredients.</b></p>
                <br>
                <p>My beauty routine reminds me of the aromas of my childhood. In 2015, I choose to guide my work
                    solely
                    towards creation … That’s how our brand was born. I wanted to take care of you, of us, and to
                    accompany you daily in your beauty routine, with an essential moto: we are our choices. I
                    believe
                    the simpler the better and the products I’ve created focus on the essential, easy gestures, warm
                    and
                    reassuring smells and natural ingredients for a true beauty.”</p>
                <br>
                <p>— Sylvia Rossel</p>
            </div>
        </div>
    </section>
</main>
@endsection