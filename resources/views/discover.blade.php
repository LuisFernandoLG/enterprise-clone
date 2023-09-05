<x-layouts.app title="Discover" description="Discover">
    <div class="banner-container">
        <div class="banner-info">
            <a class="banner-info__link" href="{{ '#' }}">Quiero viajar</a>
            <h2 class="banner-info__title">Travel Tips from Real Locals</h2>
            <span class="banner-info__date">September 25, 2017</span>
        </div>
    </div>

    <x-popular_posts :posts="$posts" />


    <h2 class="home-blog-section__title">Blog</h2>
    <div class="popular-post">
        <h3 class="popular-post__title">
            {{ $postWithMoreLikes->title }}
        </h3>

        <img class="popular-post__img" src="{{ $postWithMoreLikes->url_image }}" alt=""
            class="popular-post__img">
        <div class="popular-post__preview">{{ $postWithMoreLikes->body }}</div>
        <a class="btn popular-post__btn" href="{{ route('posts.show', $postWithMoreLikes->slug) }}">Read More</a>
    </div>

    <div class="home-blog-section">
        <div class="home-blog">

            @foreach ($allPosts as $post)
                <div class="post">
                    <div class="post__img">
                        <img src="{{ $post->url_image }}" alt="">
                    </div>
                    <h3 class="post__subtitle">{{ $post->title }}</h3>
                    <h2 class="post__title">{{ $post->title }}</h2>
                    <span class="post__date">{{ $post->created_at }}</span>
                    <div class="post__preview">{{ $post->body }}</div>
                    <a class="btn post__btn" href="{{ route('posts.show', $post->slug) }}">Read More</a>
                </div>
            @endforeach
        </div>
    </div>
</x-layouts.app>
