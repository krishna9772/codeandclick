@foreach ($blogs as $blog)
  <div class="col-xs-12 col-md-6 col-lg-4">
   <a href="{{ route('blog-details', ['slug' => $blog->slug]) }}">
      <div class="m__list-tile">
        <div class="m__list-tile--image">
          <img
            class="img-object-fit"
            src="{{ $blog->getFirstMediaUrl('blog_images') }}"
            alt="{{ $blog->localized('title') }}" />
        </div>
        <div class="m__list-tile--content">
          <h4 class="small">{{ $blog->localized('title') }}</h4>
          <p class="text-base text-white line-clamp-4">
            {{ \Illuminate\Support\Str::words(strip_tags($blog->localized('content')), 20, '...') }}
          </p>
          <div class="m__list-tile--content--author">
            <img
              class="m__list-tile--content--author--image"
              alt="author profile image"  
              src="{{ $blog->user->image }}" />
            <p>{{ $blog->user->name }}</p>
          </div>
        </div>
      </div>
    </a>
  </div>
@endforeach
