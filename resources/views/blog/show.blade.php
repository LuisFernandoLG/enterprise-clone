<x-layouts.app>
    @if (session('status'))
        <div class="snackbar">
            {{ session('status') }}
        </div>
    @endif

    <div class="single-post">
        <h1 class="single-post__title">
            {{ $post->title }}
        </h1>
        <div class="single-post__image"><img src="{{ $post->url_image }}" alt="{{ $post->slug }}"></div>
        <p class="single-post__body">
            {{ $post->body }}
        </p>
    </div>

    <div class="comments-container">
        <h2 class="comments-container__title">Comments</h2>
        <div class="comments">
            @foreach ($post->getComments as $comment)
                <div class="comment">
                    <h3 class="comment__author">{{ $comment->name }}</h3>
                    <p class="comment__body">{{ $comment->commnet }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <form method="POST" action="{{ route('posts.comment.store', $post) }}" class="post-form">
        @csrf
        <h3 class="post-form__title">Leave a comment</h3>
        <div class="post-form__input">
            <label for="name">Name</label>
            <input value="{{ old('name', $comment->name) }}" type="text" name="name" id="name">
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="post-form__input">
            <label for="comment">Comment</label>
            <textarea name="comment" id="comment" cols="30" rows="10">{{ old('commnet', $comment->commnet) }}</textarea>
            @error('comment')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="post-form__input">
            <button type="submit">Send</button>
        </div>
    </form>
</x-layouts.app>
