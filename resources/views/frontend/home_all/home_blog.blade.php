
@php
$allBlogs = App\Models\Blog::all();
@endphp
<section class="blog">
    <div class="container-fluid">
       
        <div class="row gx-0 justify-content-center">
            @foreach ($allBlogs as $allBlog)
            <div class="col-lg-3 col-md-6 col-sm-9 mx-1">
                <div class="blog__post__item">
                    <div class="blog__post__thumb">
                        <a href="{{ route('blog-details',$allBlog['id']) }}"><img src="{{ asset('upload/blog_image/')}}/{{ $allBlog['blog_image']}}" alt=""></a>
                        <div class="blog__post__tags">
                            <a href="blog.html">{{ $allBlog['category']['blog_category']}}</a>
                        </div>
                    </div>
                    <div class="blog__post__content">
                        <span class="date">{{ Carbon\Carbon::parse($allBlog['created_at'])->diffForHumans()   }}</span>
                        <h3 class="title"><a href="{{ route('blog-details',$allBlog['id']) }}">{{ $allBlog['blog_title']}}</a></h3>
                        <a href="{{ route('blog-details', $allBlog['id']) }}" class="read_more">Read More</a>
                    </div>
                </div>
            </div>

       
        @endforeach
    </div>
        <div class="blog__button text-center">
            <a href="blog.html" class="btn">more blog</a>
        </div>
    </div>
</section>