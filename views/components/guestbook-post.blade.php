@props([
    'post',
])

<article class="text-xl py-6">
    {!! nl2br(e($post->textBlock)) !!}

    <p class="text-sm mt-1">
        <time datetime="{{ atom($post->postDate) }}">
            {{ $post->postDate }}
        </time>

        <br />
        By
        {{ $post->author->fullName ?? $post->author->username }}
    </p>
</article>
