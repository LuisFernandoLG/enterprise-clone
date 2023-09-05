<div class="popular-posts-container">
    <h2 class="popular-posts-container__title">Popular Posts</h2>
    <div class="posts">

        @foreach ($posts as $post)
            <div class="post">
                <div class="post__img">
                    <img src="{{ $post->url_image }}" alt="Post image">
                </div>
                <div class="post__info">
                    <h3 class="post__title">{{ $post->title }}</h3>
                    <a href="{{ route('posts.show', $post->slug) }}" class="post__subtitle">{{ $post->title }}</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
