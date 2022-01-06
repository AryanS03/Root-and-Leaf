@extends('./layout/layout')
@section('page_title','Blogs')
@section('container')
<main>
    <section class="has-full-width-section contact-section">
        <div class="text-box">
            <h2>Our Blogs</h2>
        </div>
    </section>
    <section class="blog-section">
        <div class="row">
            @if(count($blog) == 0)
            <div class="jumbotron">
                <h2 class="display-4"><span class="text-danger">Oops,</span> Some Error Occurred!</h2>
                <p class="lead">The Blog may have been removed.</p>
            </div>
            @else
            <div class="header-block mb-4">
                <h2 class="blog-title heading">{{ $blog[0]->title }}</h2>
                <p class="text-center meta-details"><span>Posted On: {{ $blog[0]->created_at->format('d M, Y') }}</span> | <span>{{ $blog[0]->category['name'] }}</span></p>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12"><img src="{{ asset('/storage/blog_images/'.$blog[0]->image) }}" class="img-fluid" alt="">
                        <div class="post_desc">{!! $blog[0]->description !!}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h2 class="heading">Category</h2>
                <ul class="categories">
                    @foreach($categories as $category)
                    <li><a href="{{ route('posts',$category->slug) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
                @if(count($categories) == 0)
                <div class="jumbotron">
                    <h5>No Categories</h5>
                </div>
                @endif
            </div>
        </div>
    </section>
    @endif
    <section class="product-section featured-blog">
        <div class="row product-section__head">
            <div class="col-lg-12 section-heading">
                <a href="#">
                    <h2 class="section__title">Related Posts</h2>
                </a>
                <a href="#" class="section__link">View All</a>
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
                    <a href="{{ $relatedBlog->slug }}">
                        <div class="card-image">
                            <img src="{{ asset('/storage/blog_images/'.$relatedBlog->image) }}" class="w-100" alt="...">
                        </div>
                        <div class="card-body p-0">
                            <h5 class="card-title m-0">{{ Str::limit($relatedBlog->title,40) }}</h5>
                            <div class="card-text m-0 post-description">{!! $relatedBlog->description !!}</div>
                        </div>
                    </a>
                    <span><a href="{{ $relatedBlog->slug }}" class="card-link">Read More</a></span>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </section>
</main>
@endsection