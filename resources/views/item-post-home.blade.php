<div class="col-lg-12">
    <div class="blog-post">
        <div class="down-content">
            {{-- <span>Lifestyle</span> --}}
            <a href="{{ route('post.detail', $allPost->slug) }}">
                <h4>{{ $allPost->title }}</h4>
            </a>
            <div class="blog-thumb">
                <img src="{{ asset('images/' . $allPost->image) }}" alt="">
            </div>
            <ul class="post-info">
                <li><a href="#">Admin</a></li>
                <li><a href="#">{{ $allPost->posted_at }}</a></li>
                <li><a href="#">12 Comments</a></li>
            </ul>
            <p>{{ $allPost->excerpt }}<a rel="nofollow" href="https://templatemo.com/contact" target="_parent"></p>
        </div>
    </div>
</div>
