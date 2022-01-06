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
            <div class="col-lg-8">
                <div class="row">
                    @if(count($posts) == 0)
                    <div class="jumbotron">
                        <h2 class="display-4"><span class="text-danger">Oops,</span> No Posts Available!</h2>
                    </div>
                    @else
                    @foreach($posts as $blog)
                    <div class="col-lg-12"><a href="{{ route('blog',$blog->slug) }}"><img src="{{ asset('/storage/blog_images/'.$blog->image) }}" class="img-fluid" alt=""></a>
                        <p class="meta-details"><span>Posted On: {{ $blog->created_at->format('d M, Y') }}</span> | <span>{{ $blog->category['name'] }}</span></p>
                        <a href="{{ route('blog',$blog->slug) }}">
                            <h2 class="post-title heading">{{ $blog->title }}</h2>
                        </a>
                        <div class="post-description">{!! $blog->description !!}</div>
                        <a href="{{ route('blog',$blog->slug) }}" class="card-link">Read More</a>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="row pt-3">
                    <div class="col-lg-12 d-flex justify-content-center">{{ $posts->links() }}</div>
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
</main>
@endsection